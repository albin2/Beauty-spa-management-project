<?php
namespace App\Http\Controllers\user;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMailablePackage;
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
use App\Cartitems;
use App\Cart;
use App\Product;
use App\productCategeory;
use App\PaymentDetails;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\User;
use Carbon\Carbon;

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
        $review= DB::table('feedback')
        ->join('regist', 'regist.user_id', '=', 'feedback.userid')
        ->join('products', 'products.id', '=', 'feedback.productid')->where('productid', '=', $id)
        ->get();
        $feedb = DB::table('feedback')
        ->where('productid', '=', $id)->where('userid', '=', Auth::id())
        ->get();
        $c=0;
        $c = $feedb->count();
        $msg="";
        $strs="";
        if ($c)
        {
            $msg=$feedb[0]->productfeed;
            $strs=$feedb[0]->stars;
        }


        //total rating
        $totalcount = feedback::where('productid',$id)->count();

       $totalstars = feedback::where('productid',$id)->avg('stars');
        $avgstrs= round($totalstars);
        
        return view('userpages.singleviewproduct', ['data' => $data, 'cat' => $cat,'review'=>$review,'count'=>$c,'msg'=>$msg,'strs'=>$strs,'avgstars'=>$avgstrs,'totalcount'=>$totalcount]);
    }
    public function deletereview($feedid,$productid)
{
    //return $request->all();
    $data = feedback::where('feedid', $feedid);
    $data->delete();
    $data = Product::where('id', $productid)->get();
    $cat = productCategeory::all();
    $review= DB::table('feedback')
    ->join('regist', 'regist.user_id', '=', 'feedback.userid')
    ->join('products', 'products.id', '=', 'feedback.productid')->where('productid', '=', $productid)
    ->get();
    $feedb = DB::table('feedback')
    ->where('productid', '=', $productid)->where('userid', '=', Auth::id())
    ->get();
    $c=0;
        $c = $feedb->count();
        $msg="";
        $strs="";
        if ($c)
        {
            $msg=$feedb[0]->productfeed;
            $strs=$feedb[0]->stars;
        }
 $totalcount = feedback::where('productid',$productid)->count();

$totalstars = feedback::where('productid',$productid)->avg('stars');
        $avgstrs= round($totalstars);
        
        return view('userpages.singleviewproduct', ['data' => $data, 'cat' => $cat,'review'=>$review,'count'=>$c,'msg'=>$msg,'strs'=>$strs,'avgstars'=>$avgstrs]);
  
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

    public function uviewPackagesuser(Request $request)
    {
        //return $request;
        $packages = Package::all();
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

    //redirect link
    public function rviewuserEmployees(Request $request)
    {

        return view('/home');
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
    //redirct date choose page
    public function rviewdate(Request $request)
    {

        return view('/home');
    }


    public function makefeedback(Request $request)
    {
        $data = Service::all();
        return view('userpages.givefeedback', ['data' => $data,]);
    }
     public function saveproductfeedback(Request $request)
    {
       //return $request;
        # code...
        // $fbc = new feedback($request->all());
        // $fbc->userid = Auth::id();
        // $fbc->feeddate = Carbon::now()->toDateString();
        // $fbc->save();
        $id=$request->productid;
       
       feedback::UpdateOrcreate(['userid'=>Auth::id(), 'productid'=>$id], ['feeddate'=>Carbon::now()->toDateString(), 'productfeed'=>$request->productfeed,'stars'=>$request->stars]);
        return redirect('user/view/singleproduct/'.$id);
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
        //return $request->all();
        $details = new PaymentDetails($request->except('cvv', 'date', 'id'));
        $details->save();
     $det = DB::table('booking')
        ->join('users','users.id','=','booking.uid')->where('booking.id', $request->id)
        ->get();
        $mailto=$det[0]->email;
        $bdates=$det[0]->bdate;
        $times=$det[0]->time;
        $packname=$det[0]->servid;
        $usname=$det[0]->usname;
        $employee=$det[0]->usname;
        $this->packmail($mailto,$bdates,$times,$packname,$usname,$employee);
      // return $det = Booking::where('id', $request->id)->get();

        //return $det; 
        Booking::where('id', $request->id)->update(['status' => '1']);

        return view('userpages.serviceinvoice', ['det' => $det]);
    }

//mailpack

public function packmail($mailto,$bdates,$times,$packname,$usname,$employee)
      {
          if (Mail::to($mailto)->send(new SendMailablePackage($bdates,$times,$packname,$usname,$employee))) {
                  return true;
              }
              return false;
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

            $time = ['time' => "10:00 AM"];
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
        $dt = Carbon::now();
        $dt->toDateString();
        $data = Service::all();
        //return $fbc;
        $apm = DB::table('regist', 'booking')->select('regist.user_id', 'booking.*')
        ->join('booking', 'regist.user_id', '=', 'booking.uid')
        ->where([['user_id', Auth::id()], ['status','1']])
        ->orWhere([['user_id', Auth::id()], ['status','3']])
        ->orwhere([['user_id', Auth::id()], ['status','8']])
       ->get(); 
        //return $leaves;
        return view('userpages.viewappionments', ['apm' => $apm, 'data' => $data ,'cudate'=>$dt]);
    }

    public function viewuserAppointmentDetails(Request $request)
    {
        $dt = Carbon::now();
        $dt->toDateString();
        $data = Service::all();
       
       $apm = Booking::where('id', $request->id)->get();
       return view('userpages.viewappointmentdetail', ['apm' => $apm, 'data' => $data ,'cudate'=>$dt]);
    }

    public function cancelapointment(Request $request)
    {
      //  return $request;
        $dt = Carbon::now();
        $dt->toDateString();
       //return $request->all();
        $bok = Booking::find($request->id);
        $bok->status = 0;
        $bok->save();
        $dt->toDateString();
        $data = Service::all();
        //return $fbc;
        $apm = DB::table('regist', 'booking')->select('regist.user_id', 'booking.*')
        ->join('booking', 'regist.user_id', '=', 'booking.uid')
        ->where([['user_id', Auth::id()], ['status','1']])
        ->orWhere([['user_id', Auth::id()], ['status','3']])
        ->orwhere([['user_id', Auth::id()], ['status','8']])
        ->get();
        //return $leaves;
        return view('userpages.viewappionments', ['apm' => $apm, 'data' => $data ,'cudate'=>$dt]);
    }
     
    
    // re shedule  appointment

      
     

    public function reviewdate(Request $request)
    {
        session(['eid' => $request->eid]);
        session(['pid' => $request->pid]);
        $data = Service::all();
        $bkid=$request->rid;
        $pack = Package::where('id', $request->id)->get();
        $empl = EmployeeDetails::where('Role', $request->id)->get();
        return view('userpages.reshedule', ['data' => $data, 'empl' => $empl, 'pack' => $pack,'bkid'=>$bkid]);
    }


     public function reSheduleDate(Request $request)
    {
         //return $request;
        $date =  $request->date;
        $empid = $request->eid;
        
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

            $time = ['time' => "10:00 AM"];
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


    public function resaveappoinment(Request $request)
    {
        //return $request;
        // return Auth::id();
        # code...
        //return $request->all();
       $newbdate=$request->bdate;
       $newtime=$request->time;
      Booking::where('id',$request->bkid)->update(['time'=>$newtime,'bdate'=>$newbdate,'status'=>1]);
      
      $dt = Carbon::now();
      $dt->toDateString();
      $data = Service::all();
      //return $fbc;
      $apm = DB::table('regist', 'booking')->select('regist.user_id', 'booking.*')
      ->join('booking', 'regist.user_id', '=', 'booking.uid')
      ->where([['user_id', Auth::id()], ['status','1']])
      ->orWhere([['user_id', Auth::id()], ['status','3']])
      ->orwhere([['user_id', Auth::id()], ['status','8']])
      ->orWhere([['user_id', Auth::id()], ['status','0']])->get();
      //return $leaves;
      return view('userpages.viewappionments', ['apm' => $apm, 'data' => $data ,'cudate'=>$dt]);
        //return $leaves;
        // return redirect('/user/appointment/view');
        //reciept
        //return view('userpages.viewappionments');
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

    //sort

    function array_sort($array, $on, $order = SORT_ASC)
    {

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

            $innerRep = 0;
            foreach ($data as $d) {
                if (sizeof($packages) == 0) {
                    $re = 0;
                    $d['count'] = 1;
                    $d = (array) $d;
                    array_push($packages, $d);
                    // print_r($packages);
                } else {
                    $rep = 0;
                    // print_r($d);
                    $flag = 0;
                    foreach ($packages as $pack) {
                        // print_r($pack);
                        if ($pack['id'] == $d['id']) {
                            $packages[$rep]['count'] += 1;
                            $flag = true;
                        }
                        $rep++;
                    }

                    if(!$flag){

                        $d['count'] = 1;
                        $d = (array) $d;
                        array_push($packages, $d);
                    }
                }

                $innerRep++;
            }
            // print_r($packages);
        }

        // var_dump((array)$packages[0]);
        // return;
        //return $packages;
        // return;
        //  return $go =  array_sort($packages, 'count', SORT_REGULAR);

        $returnItem = null;
        $largestCount = 0;

        foreach($packages as $p){
            if($p['count'] > $largestCount){
                $largestCount = $p['count'];
                $returnItem = $p;
            }
        }

            // return $returnItem;
        return view('userpages.searchPackages', ['pack' => $returnItem]);

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


    //change password...........................................................................
    public function viewUserChangePassword()
    {

        $datas = DB::table('regist', 'users')->select('regist.*', 'users.*')->where('id', Auth::id())->where('users.status', '=', '1')->join('users', 'regist.user_id', '=', 'users.id')->get();
        return view('userpages.changeUserPassword', ['datas' => $datas]);
    }



    public function admin_credential_rules(array $data)
    {
        $messages = [
            'current-password.required' => 'Please enter current password',
            'password.required' => 'Please enter password',
        ];

        $validator = Validator::make($data, [
            'current-password' => 'required',
            'password' => 'required|same:password',
            'password_confirmation' => 'required|same:password',
        ], $messages);

        return $validator;
    }
    public function postCredentials(Request $request)
    {

        if (Auth::Check()) {
            $request_data = $request->All();
            $validator = $this->admin_credential_rules($request_data);
            if ($validator->fails()) {

                $datas = DB::table('regist', 'users')->select('regist.*', 'users.*')->where('id', Auth::id())->where('users.status', '=', '1')->join('users', 'regist.user_id', '=', 'users.id')->get();
                $validator = 'Please enter all fields';
                return view('userpages.changeUserPassword', ['datas' => $datas, 'info' => $validator]);
            } else {
                $current_password = Auth::User()->password;
                if (Hash::check($request_data['current-password'], $current_password)) {
                    $user_id = Auth::User()->id;
                    $obj_user = User::find($user_id);
                    $obj_user->password = Hash::make($request_data['password']);;
                    $obj_user->save();
                    $datas = DB::table('regist', 'users')->select('regist.*', 'users.*')->where('id', Auth::id())->where('users.status', '=', '1')->join('users', 'regist.user_id', '=', 'users.id')->get();
                    $validator = 'Password Changed';
                    return view('userpages.changeUserPassword', ['datas' => $datas, 'info' => $validator]);
                } else {

                    $datas = DB::table('regist', 'users')->select('regist.*', 'users.*')->where('id', Auth::id())->where('users.status', '=', '1')->join('users', 'regist.user_id', '=', 'users.id')->get();
                    $validator = 'Please enter correct current password';
                    return view('userpages.changeUserPassword', ['datas' => $datas, 'info' => $validator]);
                }
            }
        } else {
            return redirect()->to('/');
        }
    }
    /// view product Bookings
    public function viewuserProductsBooking(Request $request)
    {

        $data = DB::table('cart')
            ->join('regist', 'regist.user_id', '=', 'cart.userid')
            ->join('address', 'address.uid', '=', 'cart.userid')
            ->where('cart.satus', '=', '2')->orWhere('cart.satus', '=', '0')->orWhere('cart.satus', '=', '3')->orWhere('cart.satus', '=', '4')
            ->get();
        return view('userpages.viewuserproductbooking', ['data' => $data,]);
    }
    public function viewuserProductsBookingDetails(Request $request)
    {
        $sta = $request->status;
        $amnt = $request->tmnt;
        $data = DB::table('cart')
            ->join('cartitems', 'cartitems.cartid', '=', 'cart.cartid')
            ->join('products', 'cartitems.ptoductid', '=', 'products.id')
            ->where('cartitems.cartid', $request->id)
            ->get();

        return view('userpages.viewuserBookedproduct', ['data' => $data, 'sta' => $sta, 'total' => $amnt,]);
    }
    //cancel  product booking 
    public function  shippedProductcancel(Request $request)
    {
        //return $request;
        $cartItems = Cartitems::where('cartid', $request->id)->get();
        foreach ($cartItems as $item) {
            //deduct stock
            $currStock = Product::where('id', $item->ptoductid)->get()[0]->stock;
            $updatedStock = $currStock + $item->count;
            Product::where('id', $item->ptoductid)->update(['stock' => $updatedStock]);
        }
        Cart::where('cartid', $request->id)->update(['satus' => 0]);;

        $data = DB::table('cart')
            ->join('regist', 'regist.user_id', '=', 'cart.userid')
            ->join('address', 'address.uid', '=', 'cart.userid')
            ->where('cart.satus', '=', '2')->orWhere('cart.satus', '=', '0')->orWhere('cart.satus', '=', '3')->orWhere('cart.satus', '=', '4')
            ->get();

        return view('userpages.viewuserproductbooking', ['data' => $data,]);
    }
}
