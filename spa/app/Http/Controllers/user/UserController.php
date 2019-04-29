<?php
namespace App\Http\Controllers\user;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Registration;
use App\EmployeeDetails;
use App\feedback;
use App\Package;
use App\Service;
use App\Empleave;
use App\Booking;
use App\Product;
use App\productCategeory;
use App\PaymentDetails;
use Illuminate\Support\Collection;

// use App\Http\Controllers\user\Registration;

class UserController extends Controller
{
    public function regStep(Request $request)
    {

        // $reg = new Registration();
        // $reg
        $imgPath = "";
        if ($request->hasFile('proimg') && $request->file('proimg')->isValid()) {
            $image = $request->file('proimg');
            $imgPath = $image->store('public/images/emp/' . Auth::id());

            $d = explode('/', $imgPath);
            array_shift($d);
            $imgPath = implode('/', $d);
        }
        $profile = new Registration($request->all());
        $profile->proimg = $imgPath;
        Auth::user()->Registration()->save($profile);
        return redirect('/home');
    }

    public function viewSeviceuser()
    {
        $data = Service::all();
        return view('userpages.userViewServices', ['data' => $data]);
        //return $packages;
    }


    /// product view
    public function viewProductss()
    {
        $data = Product::all()->where('status', '=', '1');
        $cat = productCategeory::all();
        return view('userpages.productview', ['data' => $data, 'cat' => $cat]);
    }

    public function viewsingleProducts($id)
    {
        $data = Product::where('id', $id)->get();
        $cat = productCategeory::all();
        return view('userpages.singleviewproduct', ['data' => $data, 'cat' => $cat]);
    }


    public function viewcatProduct($id)
    {
        $data = Product::where('categeory', $id)->where('status', '=', '1')->get();
        $cat = productCategeory::all();
        return view('userpages.productview', ['data' => $data, 'cat' => $cat]);
    }

    public function viewPackagesuser(Request $request)
    {
        //return $request;
        $packages = Package::where('servename', $request->pid)->where('status', '=', '1')->get();
        $data = Service::all();
        return view('userpages.uviewPackages', ['data' => $data, 'pack' => $packages]);
        //return $packages;
    }
    public function viewuserEmployees(Request $request)
    {
        $data = Service::all();
        //$empl=EmployeeDetails::all();
        // return $request->all();
        $empl = EmployeeDetails::where('Role', $request->sid)->get();
        //$empl= DB::table('employedetails', 'Role')->select('employedetails.*', 'Role.*' )->join('role', 'employedetails.Role', '=', 'role.id')->get();
        // return $empl;
        $pack = Package::where('id', $request->pid)->get();
        return view('userpages.uviewEmployees', ['data' => $data, 'empl' => $empl, 'pack' => $pack,]);
    }

    public function viewuserEmployeessp(Request $request)
    {
        $data = Service::all();
        //$empl=EmployeeDetails::all();
        // return $request->all();
        $empl = EmployeeDetails::all();
        //$empl= DB::table('employedetails', 'Role')->select('employedetails.*', 'Role.*' )->join('role', 'employedetails.Role', '=', 'role.id')->get();
        // return $empl;
        $pack = Package::all();
        return view('userpages.spacilists', ['data' => $data, 'empl' => $empl, 'pack' => $pack,]);
    }




    public function viewdate(Request $request)
    {
        session(['eid' => $request->eid]);
        session(['pid' => $request->pid]);
        $data = Service::all();
        $pack = Package::where('id', $request->id)->get();
        $empl = EmployeeDetails::where('Role', $request->id)->get();
        return view('userpages.datechoose', ['data' => $data, 'empl' => $empl, 'pack' => $pack]);
    }


    public function makefeedback(Request $request)
    {
        $data = Service::all();
        return view('userpages.givefeedback', ['data' => $data,]);
    }
    public function savefeedback(Request $request)
    {
        # code...
        $fbc = new feedback($request->all());
        $fbc->uid = Auth::id();
        $fbc->save();

        $data = Service::all();
        return view('userpages.givefeedback', ['data' => $data,]);
    }
    //appontment
    public function saveappoinment(Request $request)
    {
        // return Auth::id();
        # code...
        // return $request->all();
        $fbc = new Booking($request->all());
        $fbc->uid = Auth::id();
        $fbc->packid = session('pid');
        $amount = Package::where('id', session('pid'))->select('price', 'packname')->get();
        $fbc->amount = $amount[0]['price'];
        $fbc->servid = $amount[0]['packname'];
        $fbc->emplid = session('eid');
        $packkk = EmployeeDetails::where('id', session('eid'))->select('fname')->get();
        $fbc->duration = $packkk[0]['fname'];
        $usena = Registration::where('user_id', Auth::id())->select('fname')->get();
        $fbc->usname = $usena[0]['fname'];

        $fbc->status = '0';
        // return $fbc;
        $fbc->save();
        $bok = Booking::find($fbc->id);
        return view('userpages.servicepayment', ['apm' => $bok]);
        $data = Service::all();

        //return $fbc;
        $apm = DB::table('regist', 'booking')->select('regist.user_id', 'booking.*')->join('booking', 'regist.user_id', '=', 'booking.uid')->where([['user_id', Auth::id()], ['status', '1']])->get();

        //return $leaves;
        // return redirect('/user/appointment/view');
        //reciept
        //return view('userpages.viewappionments');
    }
    public function paymentDetails(Request $request) // add services
    {
        //return $request;
        $details = new PaymentDetails($request->except('cvv', 'date', 'id'));
        $details->save();


        $det = Booking::where('id', $request->id)->get();

        //return $det; 
        Booking::where('id', $request->id)->update(['status' => '1']);

        return view('userpages.serviceinvoice', ['det' => $det]);
    }
    public function verifyDate(Request $request)
    {
        $date =  $request->date;
        $empid = session('eid');
        $packid = session('pid');
        //check if employee available               //status
        $isOnLeave = Empleave::where('leavedate', $date)->where('status', 2)->count();
        $isPackFull = Booking::where([['bdate', $date], ['emplid', $empid], ['status', '1']])->orWhere([['bdate', $date], ['emplid', $empid], ['status', '3']])->count();

        $response = "0";
        if ($isOnLeave == 0 && $isPackFull <= 6) {

            $timeSlots = []; //available time slots

            $time = ['time' => "08:30 AM"];
            if (Booking::where([['time', $time], ['status', '1'], ['bdate', $date], ['emplid', $empid]])->orWhere([['time', $time], ['status', '3'], ['bdate', $date], ['emplid', $empid]])->count() == 0) {
                array_push($timeSlots, $time);
            }

            $time = ['time' => "10:0 AM"];
            if (Booking::where([['time', $time], ['status', '1'], ['bdate', $date], ['emplid', $empid]])->orWhere([['time', $time], ['status', '3'], ['bdate', $date], ['emplid', $empid]])->count() == 0) {
                array_push($timeSlots, $time);
            }

            $time = ['time' => "11:30 AM"];
            if (Booking::where([['time', $time], ['status', '1'], ['bdate', $date], ['emplid', $empid]])->orWhere([['time', $time], ['status', '3'], ['bdate', $date], ['emplid', $empid]])->count() == 0) {
                array_push($timeSlots, $time);
            }

            $time = ['time' => "01:30 PM"];
            if (Booking::where([['time', $time], ['status', '1'], ['bdate', $date], ['emplid', $empid]])->orWhere([['time', $time], ['status', '3'], ['bdate', $date], ['emplid', $empid]])->count() == 0) {
                array_push($timeSlots, $time);
            }

            $time = ['time' => "03:00 PM"];
            if (Booking::where([['time', $time], ['status', '1'], ['bdate', $date], ['emplid', $empid]])->orWhere([['time', $time], ['status', '3'], ['bdate', $date], ['emplid', $empid]])->count() == 0) {
                array_push($timeSlots, $time);
            }

            $time = ['time' => "04:30 PM"];
            if (Booking::where([['time', $time], ['status', '1'], ['bdate', $date], ['emplid', $empid]])->orWhere([['time', $time], ['status', '3'], ['bdate', $date], ['emplid', $empid]])->count() == 0) {
                array_push($timeSlots, $time);
            }

            $response = $timeSlots;
        }

        return $response;
    }
    public function viewuserappontments()
    {

        $data = Service::all();
        //return $fbc;
        $apm = DB::table('regist', 'booking')->select('regist.user_id', 'booking.*')->join('booking', 'regist.user_id', '=', 'booking.uid')->where([['user_id', Auth::id()], ['status', '1']])->orWhere([['user_id', Auth::id()], ['status', '3']])->get();
        //return $leaves;
        return view('userpages.viewappionments', ['apm' => $apm, 'data' => $data]);
    }

    public function cancelapointment(Request $request)
    {

        //return $request->all();
        $bok = Booking::find($request->id);
        $bok->status = 0;
        $bok->save();
        $data = Service::all();
        //return $fbc;
        $apm = DB::table('regist', 'booking')->select('regist.user_id', 'booking.*')->join('booking', 'regist.user_id', '=', 'booking.uid')->where([['user_id', Auth::id()], ['status', '1']])->orWhere([['user_id', Auth::id()], ['status', '3']])->get();

        //return $leaves;
        return view('userpages.viewappionments', ['apm' => $apm, 'data' => $data]);
    }



    ///..................................user profile.......................................................


    public function viewuserProfile()
    {
        $data = DB::table('regist', 'users')->select('regist.*', 'users.*')->where('id', Auth::id())->where('users.status', '=', '1')->join('users', 'regist.user_id', '=', 'users.id')->get();
        return view('userpages.userprofile', ['data' => $data]);
    }
    public function viewusereditProfile()
    {
        $data = DB::table('regist', 'users')->select('regist.*', 'users.*')->where('id', Auth::id())->where('users.status', '=', '1')->join('users', 'regist.user_id', '=', 'users.id')->get();
        return view('userpages.editprofile', ['data' => $data]);
    }



    public function proedit(Request $request)
    {
        Registration::where('user_id', $request->id)->update($request->except('_token', 'id'));

        $data = DB::table('regist', 'users')->select('regist.*', 'users.*')->where('id', Auth::id())->where('users.status', '=', '1')->join('users', 'regist.user_id', '=', 'users.id')->get();
        return view('userpages.userprofile', ['data' => $data]);
    }
    // viewuserProfile

    //............................product........................................................................
    function array_sort($array, $on, $order=SORT_ASC){

        $new_array = array();
        $sortable_array = array();
    
        if (count($array) > 0) {
            foreach ($array as $k => $v) {
                if (is_array($v)) {
                    foreach ($v as $k2 => $v2) {
                        if ($k2 == $on) {
                            $sortable_array[$k] = $v2;
                        }
                    }
                } else {
                    $sortable_array[$k] = $v;
                }
            }
    
            switch ($order) {
                case SORT_ASC:
                    asort($sortable_array);
                    break;
                case SORT_DESC:
                    arsort($sortable_array);
                    break;
            }
    
            foreach ($sortable_array as $k => $v) {
                $new_array[$k] = $array[$k];
            }
        }
    
        return $new_array;
    }


    public function PackSearch(Request $request)
    {
        // benafits
        // return Package::all();
        $packages = array();
        $query = explode(',', $request->scontant);
        foreach ($query as $term) {
                // return $term;
                $data = Package::where('benafits', 'LIKE', '%' . $term . '%')->get()->toArray();
                $rep = 0;
                foreach ($packages as $pack) {
                    $innerRep = 0;
                    foreach ($data as $d) {
                        if(!isset($packages[$rep]['count'])){
                            $packages[$rep]['count'] = 1; 
                        }
                        if ($pack['id'] == $d['id']) {                            
                            $packages[$rep]['count'] += 1;
                        }

                        $innerRep++;
                    }
                    $rep++;
                }
                $packages += $data;
            }

        return array_sort($packages,'count',SORT_REGULAR);
       // return view('userpages.searchPackages', ['pack' => $go]);

        // return $packages;
        //return $packages->unique('id')->values()->all();

    }
    // public function PackSearch(Request $request)
    // {
    //     // benafits
    //     $packages = [];
    //    $query = explode(',', $request->scontant);
    //     foreach($query as $term)
    //     {
    //         // return $term;
    //         $data = Package::where('benafits', 'LIKE', '%'.$term.'%')->get()->toArray()[0];

    //         // $count = 0;
    //         // foreach($packages as $pack){
    //         //     if($pack->id == $data->id){
    //         //         $packages[$count]['count'] += 1; 
    //         //     }

    //         //     $count++;
    //         // }
    //         array_push($packages, $data);
    //     }

    //     // return $packages;
    //     return $packages->unique('id')->values()->all();
    // }

}
