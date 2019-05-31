<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Registration;
use App\Package;
use App\Service;
use App\Empleave;
use App\User;
use App\feedback;
use App\EmployeeDetails;
use Illuminate\Support\Facades\Validator;


// use App\Http\Controllers\user\Registration;

class EmployeeController extends Controller
{
    public function index1()
    {
        $data=Service::all();
        return view('employeehome',['data'=>$data]);
    }
    
    public function viewPackages($id)
    {
        $packages=Package::where('servename', $id)->get();
        $data=Service::all();
        return view('employeepages.eviewPackages',['data'=>$data,'pack'=>$packages]);
        //return $packages;
    }
  
    public function leave(Request $request)
    {
        // return $request->all();
        $eleave = new Empleave($request->all());
        $eleave->status = 0;
        $eleave->empid = Auth::id();
        $eleave->save();
        $data=Service::all();

        $leaves = Empleave::where('empid', Auth::id())->get();
        // return $leaves;
        $message = "Leave Applied on date : ".$request->leavedate;
        return view('employeepages.leave',['data'=>$data, 'message'=>$message, 'leaves'=>$leaves]);
    }
    public function empleave()
    {
        
        $leaves = Empleave::where('empid', Auth::id())->get();
        $data=Service::all();
        return view('employeepages.leave',['data'=>$data, 'leaves'=>$leaves]);
    }
    public function cancelLeave(Request $request)
    {
        //return $request->all();
         $leave=Empleave::where('id', $request->id);
        $leave->delete();
        $data=Service::all();
        return view('employeepages.leave',['data'=>$data,'leaves'=>$leave]);
    }



    public function empviewFeedbackform ()
    {
        
        //$leaves=Empleave::all();
        $feeds= DB::table('regist', 'feedback')->select('regist.*', 'feedback.*' )->join('feedback', 'regist.user_id', '=', 'feedback.uid')->get();
        $data=Service::all();
        //return $leaves;
        return view('employeepages.viewfeedbacks',['data'=>$data,'feeds'=>$feeds]);
    }

    public function viewAppointment(Request $request)
    {
        $data=Service::all();
        //return $leaves;
        $apm= DB::table('regist','booking')->select('regist.user_id', 'booking.*')->join('booking', 'regist.user_id', '=', 'booking.uid')->where([['emplid', Auth::id()],['status','1']])->get();
        return view('employeepages.viewappointments',['apm'=>$apm,'data'=>$data]);
    }


    public function viewemployeeProfile()
    {
        $data=Service::all();
        $datas = DB::table('employedetails', 'users')->select('employedetails.*', 'users.*')->where('users.id', Auth::id())->where('users.status', '=', '1')->join('users', 'employedetails.id', '=', 'users.id')->get();
        return view('employeepages.employeeEditProfile', ['datas' => $datas,'data'=>$data]);
    }
    public function employeeEditProfile(Request $request)
    {
        //return $request;
         $da=$request->except('_token','image');
    $imgPath = "";
    if ($request->hasFile('image') && $request->file('image')->isValid()) {
        $image = $request->file('image');
        $imgPath = $image->store('public/images/emp/employee');
        $d = explode('/', $imgPath);
        array_shift($d);
        $imgPath = implode('/', $d);
        $da['image'] = $imgPath;
    }
      
        EmployeeDetails::where('id', $request->id)->update($da);;
        $data=Service::all();
        $datas = DB::table('employedetails', 'users')->select('employedetails.*', 'users.*')->where('users.id', Auth::id())->where('users.status', '=', '1')->join('users', 'employedetails.id', '=', 'users.id')->get();
        return view('employeepages.employeeEditProfile', ['datas' => $datas,'data'=>$data]);
    }
    //change password.....................
//view form
public function viewChangePassword()
{
    $data=Service::all();
    $datas = DB::table('employedetails', 'users')->select('employedetails.*', 'users.*')->where('users.id', Auth::id())->where('users.status', '=', '1')->join('users', 'employedetails.id', '=', 'users.id')->get();
    return view('employeepages.changePassword', ['datas' => $datas,'data'=>$data]);
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

  if(Auth::Check())
  {
    $request_data = $request->All();
    $validator = $this->admin_credential_rules($request_data);
    if($validator->fails())
    {
      $data=Service::all();
      $datas = DB::table('employedetails', 'users')->select('employedetails.*', 'users.*')->where('users.id', Auth::id())->where('users.status', '=', '1')->join('users', 'employedetails.id', '=', 'users.id')->get();
      $validator='Please enter all fields';
      return view('employeepages.changePassword', ['datas' => $datas,'data'=>$data,'info' => $validator]);
    }
    else
    {  
      $current_password = Auth::User()->password;           
      if(Hash::check($request_data['current-password'], $current_password))
      {           
        $user_id = Auth::User()->id;                       
        $obj_user = User::find($user_id);
        $obj_user->password = Hash::make($request_data['password']);;
        $obj_user->save(); 
        $data=Service::all();
        $datas = DB::table('employedetails', 'users')->select('employedetails.*', 'users.*')->where('users.id', Auth::id())->where('users.status', '=', '1')->join('users', 'employedetails.id', '=', 'users.id')->get();
        $validator='Password Changed';
        return view('employeepages.changePassword', ['datas' => $datas,'data'=>$data,'info' => $validator]);
        
      }
      else
      {           
       $data=Service::all();
      $datas = DB::table('employedetails', 'users')->select('employedetails.*', 'users.*')->where('users.id', Auth::id())->where('users.status', '=', '1')->join('users', 'employedetails.id', '=', 'users.id')->get();
      $validator='Please enter correct current password';
      return view('employeepages.changePassword', ['datas' => $datas,'data'=>$data,'info' => $validator]); 
      }
    }        
  }
  else
  {
    return redirect()->to('/');
  }    
}
}