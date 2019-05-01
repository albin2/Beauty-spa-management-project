<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service;
use App\EmployeeDetails;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        if(Auth::user()->usertype == 1){
            $data=Service::all();
            $empl=EmployeeDetails::all();
            //$empl= DB::table('employedetails', 'Role')->select('employedetails.*', 'Role.*' )->join('role', 'employedetails.Role', '=', 'role.id')->get();
            // return $empl;
            return view('home',['data'=>$data,'empl'=>$empl]);
        }elseif(Auth::user()->usertype == 2){
            return redirect('/employeehome');
        }elseif(Auth::user()->usertype == 3){
            return redirect('/adminhome');
        }elseif(Auth::user()->usertype == 4){
            return redirect('/agenthome');
        }
        

    }
}
