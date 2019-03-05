<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\EmpRoles;
use App\User;
use App\EmployeeDetails;
use App\Service;
use App\Package;
use App\Registration;
use App\Empleave;
use App\feedback;

class AdminController extends Controller
{
    public function addEmpRole(Request $request)
    {
        # code...
        $role = new EmpRoles($request->all());
        $role->save();
        return view('adminpages.addEmpRole', ['data'=>EmpRoles::all()]);
    }
    public function viewEmployeeForm()
    {
        // return ;
        return view('adminpages.addEmployee', ['service1'=>Service::select('id', 'servname')->get()]);
    }
    public function saveEmployee(Request $request)
    {
        $request->all();
        $count = User::where('email', $request->email)->count();
        
        if($count>0){
            //already existing email
            return view('adminpages.addEmployee', ['service1'=>Service::select('id', 'servname')->get(), 'err'=>'Email Already Exists!']);
        }else{
            //new user registration
            $password=Hash::make('password');
            $request->request->add(['usertype'=>'2', 'password'=>$password]);
            $user = new User($request->all());
            $user->save();
    
            $eid = $user->id;
            $imgPath = "";
            if ($request->hasFile('image') && $request->file('image')->isValid()) {
                    $image = $request->file('image');
                    $imgPath = $image->store('public/images/emp');
                    //adjust image path
                    $d = explode('/', $imgPath);
                    array_shift($d);
                    $imgPath = implode($d, '/');  
                }
            // set emp details
            $request->request->add(['id'=>$eid]);
            $emp = new EmployeeDetails($request->all());
            $emp->id = $eid;
            $emp->image = $imgPath;
            $emp->save();
            return view('adminpages.addEmployee', ['service1'=>Service::select('id', 'servname')->get()]);
           
        }
        //insert to login
        
    }
    public function addServices(Request $request)
    {
        # code...
        $role = new Service($request->all());
        $role->save();
        return view('adminpages.addServices');
    }
    public function viewPackageForm()
    {
        return view('adminpages.addPackages', ['services1'=>Service::select('id', 'servname')->get()]);
    }
    public function savePackages(Request $request)
    {
        $imgPath = "";
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $image = $request->file('image');
            $imgPath = $image->store('images/emp/pack');
        }
        # code...
        $pack = new Package($request->all());
        $pack->save();

        return view('adminpages.addPackages',['services1'=>Service::select('id', 'servname')->get()]);
    }
    public function viewUsers()
    {
       $data=Registration::all();
        return view('adminpages.viewUsers',['data'=>$data]);
    }

    public function delUser(Request $request)
    {
        $data=Registration::where('user_id', $request->uid);
        $data->delete();
        
        $user=User::find($request->uid);
        $data->delete();

        $data=Registration::all();
        return view('adminpages.viewUsers',['data'=>$data, 'info'=>'User Removed']);
    }
    public function viewServices()
    {
        $data=Service::all();
        return view('adminpages.viewServices',['data'=>$data]);
    }

    public function delServices(Request $request)
    {
        //return $request->all();
         $data=Service::where('id', $request->uid);
        $data->delete();

        $data=Service::all();
        return view('adminpages.viewServices',['data'=>$data, 'info'=>'Service Removed']);
    }
    public function viewPackages()
    {
        $data=Package::all();
        return view('adminpages.viewPackages',['data'=>$data]);
    }
    public function delPackages(Request $request)
    {
        //return $request->all();
         $data=Package::where('id', $request->uid);
        $data->delete();

        $data=Package::all();
        return view('adminpages.viewPackages',['data'=>$data, 'info'=>'Package Removed']);
    }
    public function viewEmployees()
    {
        $data=EmployeeDetails::all();
        return view('adminpages.viewEmployees',['data'=>$data]);
    }
    public function delEmployees(Request $request)
    {

        $data=User::where('id', $request->uid);

        $data->delete();
        
        $user=EmployeeDetails::find($request->uid);
        $user->delete();

        $data=EmployeeDetails::all();
        //return $request->all();
        return view('adminpages.viewEmployees',['data'=>$data, 'info'=>'Employee Removed']);
    }

    public function viewLeaves()
    {
        
        //$leaves=Empleave::all();
        $leaves= DB::table('employedetails', 'empleave')->select('employedetails.*', 'empleave.*' )->join('empleave', 'employedetails.id', '=', 'empleave.empid')->get();
        
        //return $leaves;
        return view('adminpages.leaveEmployee',['leaves'=>$leaves]);
    }
    public function rejleave(Request $request)
    {
    // return $request->all();
    $eleave = Empleave::find($request->id);
    $eleave->status = 2;
    $eleave->save();
    $leaves= DB::table('employedetails', 'empleave')->select('employedetails.*', 'empleave.*' )->join('empleave', 'employedetails.id', '=', 'empleave.empid')->get();
    
    // return $leaves;
    //$message = "Leave Applied on date : ".$request->leavedate;
    return view('adminpages.leaveEmployee',['leaves'=>$leaves]);
    }

    public function aprleave(Request $request)
    {
    // return $request->all();
    $eleave = Empleave::find($request->id);
    $eleave->status = 1;
    $eleave->save();
    $leaves= DB::table('employedetails', 'empleave')->select('employedetails.*', 'empleave.*' )->join('empleave', 'employedetails.id', '=', 'empleave.empid')->get();
   
    // return $leaves;
    //$message = "Leave Applied on date : ".$request->leavedate;
    return view('adminpages.leaveEmployee',['leaves'=>$leaves]);
    }

    public function viewFeedbackform()
    {
        
        //$leaves=Empleave::all();
        $feeds= DB::table('regist', 'feedback')->select('regist.*', 'feedback.*' )->join('feedback', 'regist.user_id', '=', 'feedback.uid')->get();
        
        //return $leaves;
        return view('adminpages.viewfeedback',['feeds'=>$feeds]);
    }
    public function delfeedback(Request $request)
    {
        //return $request->all();
         $data=feedback::where('id', $request->id);
        $data->delete();
        $feeds= DB::table('regist', 'feedback')->select('regist.*', 'feedback.*' )->join('feedback', 'regist.user_id', '=', 'feedback.uid')->get();
        
        return view('adminpages.viewfeedback',['data'=>$data,'feeds'=>$feeds, 'info'=>'Service Removed']);
    }

    public function viewAppointment(Request $request)
    {
      
       $apm= DB::table('regist','booking')->select('regist.user_id', 'booking.*')->join('booking', 'regist.user_id', '=', 'booking.uid')->get();
    
        return view('adminpages.viewappontments',['apm'=>$apm,]);
    }
}
