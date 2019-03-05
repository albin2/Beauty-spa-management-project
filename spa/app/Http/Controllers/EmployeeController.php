<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Registration;
use App\Package;
use App\Service;
use App\Empleave;
use App\feedback;
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
        $packages=Package::all();
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
   
}