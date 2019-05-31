<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Mail;
use App\Mail\SendMailable;
use App\Mail\SendMailableLeave;

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
use App\Booking;
use Illuminate\Support\Str;
use App\productCategeory;
use App\Product;
use App\Cart;
use Carbon\Carbon;

class AdminController extends Controller
{
   
    protected $redirectTo = '/home';



    public function adminhome()
    
    {
        $data = Product::where('stock',10)->orWhere('stock',10)->orWhere('stock',9)->orWhere('stock',8)->orWhere('stock',7)->orWhere('stock',6)->orWhere('stock',5)->orWhere('stock',4)->orWhere('stock',3)->orWhere('stock',2)->orWhere('stock',1)->orWhere('stock',0)->get();

       
        return view('adminhome',['data' => $data]);
    }
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
                $msg = "mail sent successfully to the Employee";
            }

            // $data = array('name'=>"Virat Gandhi");
            //  Mail::send(['text'=>'mail'], $data, function($requestmail,$message) {
            //     $message->to($requestmail, 'Tutorials Point')->subject
            //        ('Laravel Basic Testing Mail');
            //     $message->from('xyz@gmail.com','Virat Gandhi');
            //  });


            return view('adminpages.addEmployee', ['service1' => Service::select('id', 'servname')->get(), 'msg' => $msg,'info' => 'Employee added ']);
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

        
        $imgPath = "";
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $image = $request->file('image');
            $imgPath = $image->store('public/images/emp/serv');
            $d = explode('/', $imgPath);
            array_shift($d);
            $imgPath = implode('/', $d);


            $role = $request->except('image');
            $role['image'] = $imgPath;

            // return $request->image;
            # code...
            $service= new Service($role);
            $service->save();

        }
   
        return view('adminpages.addServices');
    }

// ///////////////////////////////////////////////////product//////////////////////////////////////



    public function addproductcategeory(Request $request) // add product categeory
    {
        # code...
        $role = new productCategeory($request->all());
        $role->save();
        return view('adminpages.addProductCategeory',['info' => 'Product categeory added']);
    }

    public function saveProduct(Request $request)
    {
        // return l;
        $imgPath = "";
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $image = $request->file('image');
            $imgPath = $image->store('public/images/emp/product');
            $d = explode('/', $imgPath);
            array_shift($d);
            $imgPath = implode('/', $d);
            $product = $request->except('image');
            $product['image'] = $imgPath;

            // return $request->image;
            # code...
            $prod= new Product($product);
            $prod->save();

            // return $prod->image;
        }

        return view('adminpages.addProduct', ['products1' => productCategeory::select('id', 'categeory')->get(),'info' => 'Product added']);
    }

 // ......................................updatesProductdetails

    public function updatesProductdetails(Request $request)
{
    $da=$request->except('_token', 'id','image');
    $imgPath = "";
     // return l;
        $imgPath = "";
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $image = $request->file('image');
            $imgPath = $image->store('public/images/emp/product');
            $d = explode('/', $imgPath);
            array_shift($d);
            $imgPath = implode('/', $d);
            
            $da['image'] = $imgPath;

    }
  // return $da;
   
    Product::where('id', $request->id)->update($da);

    $datas = Product::where('id', $request->id)->get();

    $data = Product::all();
    return view('adminpages.viewProduct', ['data' => $data,'datas' => $datas,'info' => 'Product updated']);
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
            ->where('products.status', '=', '1')
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

//block products

public function blockProducts(Request $request)
{
    //return $request->all();
    Product::where('id', $request->id)->update(['status'=>0]);

    $data = Product::all();
    return view('adminpages.viewProduct', ['data' => $data, 'info' => 'Product Blocked']);
}



public function unblockProducts(Request $request)
{
    //return $request->all();
    Product::where('id', $request->id)->update(['status'=>1]);

    $data = Product::all();
    return view('adminpages.viewProduct', ['data' => $data, 'info' => 'Product Unblocked']);
}



// VIEW  PRODUCT STOCK PAGE


public function productupdates(Request $request)
{
    $datas = Product::where('id', $request->id)->get();
    $data = Product::all();
    return view('adminpages.updateproductstock', ['data' => $data,'datas' =>$datas]);
}

public function viewupdateProductstock()
{
    $data = Product::all();
    return view('adminpages.updatestock', ['data' => $data]);
}


//update stock

public function updateproduct(Request $request)
{
    $request->id;
    $currentstock=$request->cstock;
    $newstock=$request->stock;
    $actualstock=$currentstock+$newstock;
    Product::where('id', $request->id)->update( ['stock'=>$actualstock]);
    $datas = Product::where('id', $request->id)->get();

    $data = Product::all();
    return view('adminpages.updateproductstock', ['data' => $data,'datas' => $datas,'info' => 'Product updated']);
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
            $d = explode('/', $imgPath);
            array_shift($d);
            $imgPath = implode('/', $d);


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

        return view('adminpages.addPackages', ['services1' => Service::select('id', 'servname')->get(),'info' => 'Package added']);
    }


    ///update form
    
    public function viewPackageDetail(Request $request)
{

    $data = Package::where('id', $request->id)->get();
    return view('adminpages.updatePackage', ['data' => $data]);
}

public function updatesPackages(Request $request)
{
    $da=$request->except('_token', 'id','image');
    $imgPath = "";
    if ($request->hasFile('image') && $request->file('image')->isValid()) {
        $image = $request->file('image');
        $imgPath = $image->store('public/images/emp/pack');
        $d = explode('/', $imgPath);
        array_shift($d);
        $imgPath = implode('/', $d);


           $da['image'] = $imgPath;
    }
   
   
    Package::where('id', $request->id)->update($da);

    $datas = Package::where('id', $request->id)->get();

    $data = Package::all();
    return view('adminpages.viewPackages', ['data' => $data,'datas' => $datas,'info' => 'Package updated']);
}


///............................................................................................



    public function viewUsers()
    {
        $data = DB::table('regist', 'users')-> select('regist.*', 'users.*')->where('users.usertype','=',1)->where('users.status', '=', '1')->join('users', 'regist.user_id', '=', 'users.id')->get();
        
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


    //Block Employees
    public function BlockEUser(Request $request)
    {

        User::where('id',$request->uid)->update(['status'=>0]);
        $data = DB::table('users')
        ->join('employedetails','employedetails.id','=','users.id')
        ->get()->toArray();
        // return $data;
        return view('adminpages.viewEmployees', ['data' => $data,'info' => 'Employee Blocked']);
    }

    public function unBlockEUser(Request $request)
    {
        // return $request;
        User::where('id',$request->uid)->update(['status'=>1]);
        $data = DB::table('users')
        ->join('employedetails','employedetails.id','=','users.id')
        ->get()->toArray();
        // return $data;
        return view('adminpages.viewEmployees', ['data' => $data,'info' => 'Employee UnBlocked']);
    }

    // Block users



    public function BlockUser(Request $request)
    {

        User::where('id',$request->uid)->update(['status'=>0]);

        $data = DB::table('regist', 'users')-> select('regist.*', 'users.*')->where('users.usertype','=',1)->where('users.status', '=', '1')->join('users', 'regist.user_id', '=', 'users.id')->get();

        return view('adminpages.viewUsers', ['data' => $data, 'info' => 'User Blocked']);
    }

    public function UnblockUser(Request $request)
    {

        User::where('id',$request->uid)->update(['status'=>1]);

        $data = DB::table('regist', 'users')-> select('regist.*', 'users.*')->where('users.usertype','=',1)->where('users.status', '=', '0')->join('users', 'regist.user_id', '=', 'users.id')->get();

        return view('adminpages.viewblockedusers', ['data' => $data, 'info' => 'User  unBlocked']);
    }

    
    public function viewblockedUsers()
    {
        $data = DB::table('regist', 'users')-> select('regist.*', 'users.*')->where('users.status', '=', '0')->join('users', 'regist.user_id', '=', 'users.id')->get();
        
        return view('adminpages.viewblockedusers', ['data' => $data]);
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
///Block Packages

    public function blockPackages(Request $request)
    {
        //return $request->all();
        $data = Package::where('id', $request->uid)->update(['status'=>0]);

        $data = Package::all();
        return view('adminpages.viewPackages', ['data' => $data, 'info' => 'Package Blocked']);
    }

    public function  unblockPackages(Request $request)
    {
        //return $request->all();
        $data = Package::where('id', $request->uid)->update(['status'=>1]);;

        $data = Package::all();
        return view('adminpages.viewPackages', ['data' => $data, 'info' => 'Package UnBlocked']);
    }


    public function viewEmployees()
    {
        $data = DB::table('users')
        ->join('employedetails','employedetails.id','=','users.id')
        ->get()->toArray();
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

    
    public function viewLeaveDetailed(Request $request)
    {
       //   $request;
          $leaveid=$request->leaveid;
          $leaveddate=$request->leavedate;
          
    $leaveusers= DB::table('booking')
    ->join('empleave', 'empleave.empid', '=', 'booking.emplid')
    ->join('employedetails', 'employedetails.id', '=', 'empleave.empid')
    ->join('users', 'users.id', '=', 'booking.uid')
    ->where('empleave.leaveid','=', $leaveid)->where('empleave.status','=','0')
     ->where('booking.bdate','=',$leaveddate)->select('users.email','booking.id as bkdid','booking.uid','booking.bdate','booking.time','booking.packid','booking.servid','booking.emplid','booking.usname','booking.duration','booking.amount','booking.status as bstatus','empleave.leaveid','empleave.leavedate','empleave.reson','empleave.status as lstatus','employedetails.id as eid','employedetails.fname','employedetails.lname')
    ->get();
        //$leaves=Empleave::all();
    $leaves = DB::table('employedetails', 'empleave')->select('employedetails.*', 'empleave.*')->join('empleave', 'employedetails.id', '=', 'empleave.empid')->where('empleave.leaveid','=', $leaveid)->get();

        //return $leaves;
        return view('adminpages.empleavedetailed', ['leaveusers' => $leaveusers,'leaves'=>$leaves]);
    }




    public function rejleave(Request $request)
    {
        // return $request->all();
        $eleave = Empleave::find($request->id);
        $eleave->status = 10;
        $eleave->save();
        $leaves = DB::table('employedetails', 'empleave')->select('employedetails.*', 'empleave.*')->join('empleave', 'employedetails.id', '=', 'empleave.empid')->get();

        // return $leaves;
        //$message = "Leave Applied on date : ".$request->leavedate;
        return view('adminpages.leaveEmployee', ['leaves' => $leaves]);
    }

    public function aprleave(Request $request)
    {
        // //return $mailss= $request->all();
        $eleave = Empleave::find($request->id);
        $eleave->status = 2;
        $eleave->save();
        $bkid=$request->bkid;
        $mailleave=$request->email;
       $bdate=$request->bdate;
        foreach($mailleave as  $leavemails){
            $mailto=$leavemails;
            $bkdate= $bdate;
           
         $this->leavemail($mailto,$bkdate);
        }

        foreach ($bkid as $term){
        $terms = Booking::find($term);
        $terms->status = 8;
        $terms->save();

        }


        $leaves = DB::table('employedetails', 'empleave')->select('employedetails.*', 'empleave.*')->join('empleave', 'employedetails.id', '=', 'empleave.empid')->get();

        //return $leaves;
        return view('adminpages.leaveEmployee', ['leaves' => $leaves]);
    }

//mailleave

      public function leavemail($mailTo,$bkdate)
      {
          if (Mail::to($mailTo)->send(new SendMailableLeave($bkdate))) {
                  return true;
              }
              return false;
      }



    public function aprleaveno(Request $request)
    {
        // return $request->all();
        $eleave = Empleave::find($request->id);
        $eleave->status = 2;
        $eleave->save();
        $leaves = DB::table('employedetails', 'empleave')->select('employedetails.*', 'empleave.*')->join('empleave', 'employedetails.id', '=', 'empleave.empid')->get();

        //return $leaves;
        return view('adminpages.leaveEmployee', ['leaves' => $leaves]);
    }
    
    //product feedback

    public function viewFeedbackform()
    {
        $feeds= DB::table('feedback')
        ->join('regist', 'regist.user_id', '=', 'feedback.userid')
        ->join('products', 'products.id', '=', 'feedback.productid')
        ->get();

        //$leaves=Empleave::all();
        //return $leaves;
        return view('adminpages.viewproductfeedback', ['feeds' => $feeds]);
    }
    public function delfeedback(Request $request)
    {
        //return $request->all();
        $data = feedback::where('feedid', $request->id);
        $data->delete();
        $feeds= DB::table('feedback')
        ->join('regist', 'regist.user_id', '=', 'feedback.userid')
        ->join('products', 'products.id', '=', 'feedback.productid')
        ->get();

        //$leaves=Empleave::all();
        //return $leaves;
        return view('adminpages.viewproductfeedback', ['feeds' => $feeds,'info' => 'feedback Removed']);
    }

    public function viewAppointment(Request $request)
    {

        $apm = DB::table('regist', 'booking')->select('regist.user_id', 'booking.*')->join('booking', 'regist.user_id', '=', 'booking.uid')->get();

        return view('adminpages.viewappontments', ['apm' => $apm, ]);
    }
    public function todayviewAppointment(Request $request)
    {
        $dt = Carbon::now();
        
        $apm = DB::table('regist', 'booking')->select('regist.user_id', 'booking.*')->join('booking', 'regist.user_id', '=', 'booking.uid')->where('booking.bdate', '=', $dt->toDateString())->get();

        return view('adminpages.viewtodaysappointment', ['apm' => $apm,'currentdate'=>$dt ]);
    }


    /// view product Bookings
     public function viewProductsBooking(Request $request){
    
         $data = DB::table('cart')
        ->join('regist', 'regist.user_id', '=', 'cart.userid')
        ->join('address', 'address.uid', '=', 'cart.userid')
        ->where('cart.satus', '=', '2')->orWhere('cart.satus', '=', '0')->orWhere('cart.satus', '=', '3')->orWhere('cart.satus', '=', '4')
        ->get();
        
        return view('adminpages.viewproductBooking', ['data' => $data,]);
    }
    public function viewProductsBookingDetails(Request $request){
        $sta= $request->status;
        $amnt=$request->tmnt;
        $data = DB::table('cart')
       ->join('cartitems', 'cartitems.cartid', '=', 'cart.cartid')
       ->join('products', 'cartitems.ptoductid', '=', 'products.id')
       ->where('cartitems.cartid', $request->id)
       ->get();
       
       return view('adminpages.viewBookedproduct', ['data' => $data,'sta'=>$sta,'total'=>$amnt,]);
   }
   //update productcart status after shipping
   public function  shippedProduct(Request $request)
   {
      // return $request;
     Cart::where('cartid', $request->id)->update(['satus'=>3]);;

     $data = DB::table('cart')
     ->join('regist', 'regist.user_id', '=', 'cart.userid')
     ->join('address', 'address.uid', '=', 'cart.userid')
     ->where('cart.satus', '=', '2')->orWhere('cart.satus', '=', '0')->orWhere('cart.satus', '=', '3')->orWhere('cart.satus', '=', '4')
     ->get();
     
     return view('adminpages.viewproductBooking', ['data' => $data,]);
   }


   ///product stock alert
   public function AlertProductstock()
{
    return $data = Product::where('stock',10)->orWhere('stock',10)->orWhere('stock',9)->orWhere('stock',8)->orWhere('stock',7)->orWhere('stock',6)->orWhere('stock',5)->orWhere('stock',4)->orWhere('stock',3)->orWhere('stock',2)->orWhere('stock',1)->orWhere('stock',0)->get();
    return view('adminpages.updatestock', ['data' => $data]);
}




}
