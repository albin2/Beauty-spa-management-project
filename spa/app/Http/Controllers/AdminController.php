<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Mail;
use App\Mail\SendMailable;

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
use Illuminate\Support\Str;
use App\productCategeory;
use App\Product;


class AdminController extends Controller
{
    protected $redirectTo = '/home';
    public function addEmpRole(Request $request)
    {
        # code...
        $role = new EmpRoles($request->all());
        $role->save();
        return view('adminpages.addEmpRole', ['data' => EmpRoles::all()]);
    }
    public function viewEmployeeForm()
    {
        // return ;
        return view('adminpages.addEmployee', ['service1' => Service::select('id', 'servname')->get()]);
    }
    public function saveEmployee(Request $request)
    {
        $request->all();
        $count = User::where('email', $request->email)->count();

        if ($count > 0) {
            //already existing email
            return view('adminpages.addEmployee', ['service1' => Service::select('id', 'servname')->get(), 'err' => 'Email Already Exists!']);
        } else {
            //new user registration

            $key = Str::random(7);
            $password = Hash::make($key); //employee password randomly generated
            
            $request->request->add(['usertype' => '2', 'password' => $password]);
            $user = new User($request->all());
            $user->save();

            $eid = $user->id;
            $imgPath = "";
            if ($request->hasFile('image') && $request->file('image')->isValid()) {
                $image = $request->file('image');
                $imgPath = $image->store('public/images/emp/employee');
                //adjust image path
                $d = explode('/', $imgPath);
                array_shift($d);
                $imgPath = implode('/', $d);
            }
            // set emp details
            $request->request->add(['id' => $eid]);
            $emp = new EmployeeDetails($request->all());
            $emp->id = $eid;
            $emp->image = $imgPath;
            $emp->save();
            $msg = "";
            $name = $request->fname." ".$request->lname; //employee name

            # -- sending employee password through mail 
            if ($this->mail($request->email, $key, $name)) {
                $msg = "mail sent successfully";
            }

            // $data = array('name'=>"Virat Gandhi");
            //  Mail::send(['text'=>'mail'], $data, function($requestmail,$message) {
            //     $message->to($requestmail, 'Tutorials Point')->subject
            //        ('Laravel Basic Testing Mail');
            //     $message->from('xyz@gmail.com','Virat Gandhi');
            //  });


            return view('adminpages.addEmployee', ['service1' => Service::select('id', 'servname')->get(), 'msg' => $msg]);
        }

        //insert to login
    }

    /// employee mail__________________________________________________________________________
    public function mail($mailTo, $key, $name)
    {
        if (Mail::to($mailTo)->send(new SendMailable( $name,$key))) {
                return true;
            }
            return false;
    }

    public function addServices(Request $request) // add services
    {
        # code...
        $role = new Service($request->all());
        $role->save();
        return view('adminpages.addServices');
    }

// ///////////////////////////////////////////////////product//////////////////////////////////////



    public function addproductcategeory(Request $request) // add product categeory
    {
        # code...
        $role = new productCategeory($request->all());
        $role->save();
        return view('adminpages.addProductCategeory');
    }

    public function saveProduct(Request $request)
    {
        // return l;
        $imgPath = "";
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $image = $request->file('image');
            $imgPath = $image->store('images/emp/product');
            
            $product = $request->except('image');
            $product['image'] = $imgPath;

            // return $request->image;
            # code...
            $prod= new Product($product);
            $prod->save();

            // return $prod->image;
        }

        return view('adminpages.addProduct', ['products1' => productCategeory::select('id', 'categeory')->get()]);
    }


    public function viewProductForm()
    {
        return view('adminpages.addProduct', ['products1' => productCategeory::select('id', 'categeory')->get()]);
    }

//view products


public function viewProducts()
{
    $data = DB::table('products')
            ->join('productcategeory', 'products.categeory', '=', 'productcategeory.id')
            ->select('products.*', 'productcategeory.categeory')
            ->get();
    // $data = Product::all();
    return view('adminpages.viewProduct', ['data' => $data]);
}

//  view product full details


public function viewProductsDetail(Request $request)
{
    // $data = DB::table('products')
    //         ->join('productcategeory', 'products.categeory', '=', 'productcategeory.id')
    //         ->select('products.*', 'productcategeory.categeory')
    //         ->get();
    $data = Product::where('id', $request->id)->get();
    return view('adminpages.updateProduct', ['data' => $data]);
}

// delete products

public function delProducts(Request $request)
{
    //return $request->all();
    $data = Product::where('id', $request->id);
    $data->delete();

    $data = Product::all();
    return view('adminpages.viewProduct', ['data' => $data, 'info' => 'Product Removed']);
}


    
//----------------------------------------------------------------------------------------------------
//-------------PACKAGE--------------------------------------------------------------------------------
///---------------------------------------------------------------------------------------------------
    public function viewPackageForm()
    {
        return view('adminpages.addPackages', ['services1' => Service::select('id', 'servname')->get()]);
    }
    public function savePackages(Request $request)
    {
        $imgPath = "";
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $image = $request->file('image');
            $imgPath = $image->store('public/images/emp/pack');


            $package = $request->except('image');
            $package['image'] = $imgPath;

            // return $request->image;
            # code...
            $pack= new Package($package);
            $pack->save();

        }
        # code...
        // $pack = new Package($request->all());
        // $pack->save();

        return view('adminpages.addPackages', ['services1' => Service::select('id', 'servname')->get()]);
    }


    ///update form
    
    public function viewPackageDetail(Request $request)
{

    $data = Package::where('id', $request->id)->get();
    return view('adminpages.updatePackage', ['data' => $data]);
}



    public function viewUsers()
    {
        $data = Registration::all();
        
        return view('adminpages.viewUsers', ['data' => $data]);
    }

    public function delUser(Request $request)
    {
        $data = Registration::where('user_id', $request->uid);
        $data->delete();

        $user = User::find($request->uid);
        $user->delete();

        $data = Registration::all();
        return view('adminpages.viewUsers', ['data' => $data, 'info' => 'User Removed']);
    }
    public function viewServices()
    {
        $data = Service::all();
        return view('adminpages.viewServices', ['data' => $data]);
    }

    public function delServices(Request $request)
    {
        //return $request->all();
        $data = Service::where('id', $request->uid);
        $data->delete();

        $data = Service::all();
        return view('adminpages.viewServices', ['data' => $data, 'info' => 'Service Removed']);
    }
    public function viewPackages()
    {
        $data = Package::all();
        return view('adminpages.viewPackages', ['data' => $data]);
    }
    public function delPackages(Request $request)
    {
        //return $request->all();
        $data = Package::where('id', $request->uid);
        $data->delete();

        $data = Package::all();
        return view('adminpages.viewPackages', ['data' => $data, 'info' => 'Package Removed']);
    }
    public function viewEmployees()
    {
        $data = EmployeeDetails::all();
        return view('adminpages.viewEmployees', ['data' => $data]);
    }
    public function delEmployees(Request $request)
    {

        $data = User::where('id', $request->uid);

        $data->delete();

        $user = EmployeeDetails::find($request->uid);
        $user->delete();

        $data = EmployeeDetails::all();
        //return $request->all();
        return view('adminpages.viewEmployees', ['data' => $data, 'info' => 'Employee Removed']);
    }

    public function viewLeaves()
    {

        //$leaves=Empleave::all();
        $leaves = DB::table('employedetails', 'empleave')->select('employedetails.*', 'empleave.*')->join('empleave', 'employedetails.id', '=', 'empleave.empid')->get();

        //return $leaves;
        return view('adminpages.leaveEmployee', ['leaves' => $leaves]);
    }
    public function rejleave(Request $request)
    {
        // return $request->all();
        $eleave = Empleave::find($request->id);
        $eleave->status = 2;
        $eleave->save();
        $leaves = DB::table('employedetails', 'empleave')->select('employedetails.*', 'empleave.*')->join('empleave', 'employedetails.id', '=', 'empleave.empid')->get();

        // return $leaves;
        //$message = "Leave Applied on date : ".$request->leavedate;
        return view('adminpages.leaveEmployee', ['leaves' => $leaves]);
    }

    public function aprleave(Request $request)
    {
        // return $request->all();
        $eleave = Empleave::find($request->id);
        $eleave->status = 1;
        $eleave->save();
        $leaves = DB::table('employedetails', 'empleave')->select('employedetails.*', 'empleave.*')->join('empleave', 'employedetails.id', '=', 'empleave.empid')->get();

        // return $leaves;
        //$message = "Leave Applied on date : ".$request->leavedate;
        return view('adminpages.leaveEmployee', ['leaves' => $leaves]);
    }

    public function viewFeedbackform()
    {

        //$leaves=Empleave::all();
        $feeds = DB::table('regist', 'feedback')->select('regist.*', 'feedback.*')->join('feedback', 'regist.user_id', '=', 'feedback.uid')->get();

        //return $leaves;
        return view('adminpages.viewfeedback', ['feeds' => $feeds]);
    }
    public function delfeedback(Request $request)
    {
        //return $request->all();
        $data = feedback::where('id', $request->id);
        $data->delete();
        $feeds = DB::table('regist', 'feedback')->select('regist.*', 'feedback.*')->join('feedback', 'regist.user_id', '=', 'feedback.uid')->get();

        return view('adminpages.viewfeedback', ['data' => $data, 'feeds' => $feeds, 'info' => 'Service Removed']);
    }

    public function viewAppointment(Request $request)
    {

        $apm = DB::table('regist', 'booking')->select('regist.user_id', 'booking.*')->join('booking', 'regist.user_id', '=', 'booking.uid')->get();

        return view('adminpages.viewappontments', ['apm' => $apm, ]);
    }
}
