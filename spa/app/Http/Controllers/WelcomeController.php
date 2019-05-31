<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Service;
use App\Package;
use App\feedback;
use App\Product;
use App\productCategeory;
use App\EmployeeDetails;
class WelcomeController extends Controller
{
    public function viewSeviceguest()
    {
        $data = Service::all();
        return view('welcome.gustViewServices', ['data' => $data]);
        //return $packages;
    }
    public function viewPackagesguest(Request $request)
    {
        //return $request;
        $packages = Package::where('servename', $request->pid)->where('status', '=', '1')->get();
        $data = Service::all();
        return view('welcome.guestviewPackages', ['data' => $data, 'pack' => $packages]);
        //return $packages;
    }
     // guest view employees
    
     public function viewguestEmployeess(Request $request)
    {
        $data = Service::all();
        //$empl=EmployeeDetails::all();
        // return $request->all();
        $empl = EmployeeDetails::all();
        //$empl= DB::table('employedetails', 'Role')->select('employedetails.*', 'Role.*' )->join('role', 'employedetails.Role', '=', 'role.id')->get();
        // return $empl;
        $pack = Package::all();
        return view('welcome.guestviewEmployee', ['data' => $data, 'empl' => $empl, 'pack' => $pack,]);
    }

    //view product

    public function viewProductss()
    {
        $data = Product::all()->where('status', '=', '1');
        $cat = productCategeory::all();
        return view('welcome.guestviewproduct', ['data' => $data, 'cat' => $cat]);
    }
    public function viewcatProduct($id)
    {
        $data = Product::where('categeory', $id)->where('status', '=', '1')->get();
        $cat = productCategeory::all();
        return view('welcome.guestviewproduct', ['data' => $data, 'cat' => $cat]);
    }

    //single view product
    public function viewsingleProducts($id)
    {
        $data = Product::where('id', $id)->get();
        $cat = productCategeory::all();
        $totalcount = feedback::where('productid',$id)->count();

        $totalstars = feedback::where('productid',$id)->avg('stars');
         $avgstrs= round($totalstars);
        $review= DB::table('feedback')
        ->join('regist', 'regist.user_id', '=', 'feedback.userid')
        ->join('products', 'products.id', '=', 'feedback.productid')->where('productid', '=', $id)
        ->get();
        return view('welcome.guestsingleviewproduct', ['data' => $data, 'cat' => $cat,'review'=>$review,'avgstars'=>$avgstrs,'totalcount'=>$totalcount]);
    }
    public function Aboutus()
    {
       
        return view('aboutus');
    }
    
}
