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
            $imgPath = $image->store('images/' . Auth::id());
        }
        $profile = new Registration($request->all());
        $profile->proimg = $imgPath;
        Auth::user()->Registration()->save($profile);
        return redirect('/home');

    }

    public function viewSeviceuser($id)
    {
        $data=Service::all();
        return view('userpages.userViewServices',['data'=>$data]);
        //return $packages;
    }   
    

    public function viewPackagesuser($id)
    {
        $packages=Package::where('servename', $id)->get();
        $data=Service::all();
        return view('userpages.uviewPackages',['data'=>$data,'pack'=>$packages]);
        //return $packages;
    }
    public function viewuserEmployees(Request $request)
    {
    $data=Service::all();
    //$empl=EmployeeDetails::all();
    // return $request->all();
    $empl=EmployeeDetails::where('Role', $request->sid)->get();
    //$empl= DB::table('employedetails', 'Role')->select('employedetails.*', 'Role.*' )->join('role', 'employedetails.Role', '=', 'role.id')->get();
    // return $empl;
    $pack=Package::where('id',$request->pid)->get();
    return view('userpages.uviewEmployees',['data'=>$data,'empl'=>$empl,'pack'=>$pack,]);
    }

    public function viewuserEmployeessp(Request $request)
    {
        $data=Service::all();
        //$empl=EmployeeDetails::all();
        // return $request->all();
        $empl=EmployeeDetails::all();
        //$empl= DB::table('employedetails', 'Role')->select('employedetails.*', 'Role.*' )->join('role', 'employedetails.Role', '=', 'role.id')->get();
        // return $empl;
        $pack=Package::all();
        return view('userpages.spacilists',['data'=>$data,'empl'=>$empl,'pack'=>$pack,]);
    }


        

    public function viewdate(Request $request)
    {
        session(['eid'=> $request->eid]);
        session(['pid'=> $request->pid]);
        $data=Service::all();
        $pack=Package::where('id',$request->id)->get();
        $empl=EmployeeDetails::where('Role', $request->id)->get();
        return view('userpages.datechoose',['data'=>$data,'empl'=>$empl,'pack'=>$pack]);
    }

    
    public function makefeedback(Request $request)
    {
    $data=Service::all();
    return view('userpages.givefeedback',['data'=>$data,]);
    }
    public function savefeedback(Request $request)
    {
        # code...
        $fbc = new feedback($request->all());
        $fbc->uid = Auth::id();
        $fbc->save();
        
        $data=Service::all();
        return view('userpages.givefeedback',['data'=>$data,]);
    }
    //appontment
    public function saveappoinment(Request $request)
    {
        # code...
        $fbc = new Booking($request->all());
        $fbc->uid = Auth::id();
        $fbc->packid = session('pid');
        $amount = Package::where('id', session('pid'))->select('price','packname')->get();
        $fbc->amount = $amount[0]['price'];
        $fbc->servid = $amount[0]['packname'];
        $fbc->emplid = session('eid');
        $packkk = EmployeeDetails::where('id', session('eid'))->select('fname')->get();
        $fbc->duration = $packkk[0]['fname'];
        $usena = Registration::where('user_id', auth::id())->select('fname')->get();
        $fbc->usname = $usena[0]['fname'];
       
        $fbc->status = '1';
        $fbc->save();
        
        
        $data=Service::all();
       
        //return $fbc;
        $apm= DB::table('regist','booking')->select('regist.user_id', 'booking.*')->join('booking', 'regist.user_id', '=', 'booking.uid')->where([['user_id', Auth::id()],['status','1']])->get();

        //return $leaves;
        return view('userpages.viewappionments',['apm'=>$apm,'data'=>$data]);
        //reciept
        //return view('userpages.viewappionments');
    }

    public function verifyDate(Request $request)
    {
        $date =  $request->date;
        $empid = session('eid');
        $packid = session('pid');
        //check if employee available
        $isOnLeave = Empleave::where('leavedate', $date)->count();
        $isPackFull = Booking::where([['bdate', $date],['emplid', $empid],['status', '1']])->count();

        $response = "0";
        if($isOnLeave == 0 && $isPackFull < 4){

            $time = "9:00 AM";
            if(Booking::where([['time', $time],['status', '1'],['bdate', $date],['emplid', $empid]])->count()>0){
                $time = "10:00 AM";
                if(Booking::where([['time', $time],['status', '1'],['bdate', $date],['emplid', $empid]])->count()>0){
                    $time = "2:00 PM";
                    if(Booking::where([['time', $time],['status', '1'],['bdate', $date],['emplid', $empid]])->count()>0){
                        $time = "3:00 PM";
                    }
                }
            }
            
            $response = $time;
        }
        
        return $response;
    }
    public function viewuserappontments(Request $request)
    {
        
        $data=Service::all();
        //return $fbc;
       $apm= DB::table('regist','booking')->select('regist.user_id', 'booking.*')->join('booking', 'regist.user_id', '=', 'booking.uid')->where([['user_id', Auth::id()],['status','1']])->get();
        //return $leaves;
        return view('userpages.viewappionments',['apm'=>$apm,'data'=>$data]);
    }

    public function cancelapointment(Request $request)
    {
    //return $request->all();
    $bok = Booking::find($request->id);
    $bok->status = 0;
    $bok->save();
    $data=Service::all();
    //return $fbc;
   $apm= DB::table('regist','booking')->select('regist.user_id', 'booking.*')->join('booking', 'regist.user_id', '=', 'booking.uid')->where([['user_id', Auth::id()],['status','1']])->get();
    
    //return $leaves;
    return view('userpages.viewappionments',['apm'=>$apm,'data'=>$data]);
    
    }
}
