<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify'=>true]);


Route::get('/home', 'HomeController@index')->name('home');

Route::get('/_register', function () {
    $value=session('key');
    if($value=="_regist2")
    {
    return view('register1');
    }
    else {
        return view('welcome');
    }
});
Route::post('/registerTo', 'user\UserController@regStep')->name('registerTo');


/*admin routes
__________________ */





//menu_redirect
Route::view('/admin/viewEmpRole', 'adminpages.addEmpRole')->name('viewEmpRole'); //viewEmpRole
Route::view('/admin/viewServices', 'adminpages.addServices')->name('viewServices');


//user routs
Route::get('/user/spaservice/view','user\UserController@viewSeviceuser')->name('viewSpaaServices');// user view service
Route::get('/user/spaproduct/view','user\UserController@viewProductss')->name('viewUserproduct');// user view product
Route::get('/user/view/singleproduct/{id}','user\UserController@viewsingleProducts')->name('singleviewproduct');//view single product



Route::get('/user/appointment/view','user\UserController@viewuserappontments')->name('viewUserappontment');// user appointment
Route::get('/user/view/product/{id}','user\UserController@viewcatProduct')->name('product-cat-user');
Route::get('/user/view/profile','user\UserController@viewuserProfile')->name('viewUserprofile');// view user profile
Route::get('/user/view/editprofile','user\UserController@viewusereditProfile')->name('viewUsereditprofile');// view user edit profile


//cart
Route::post('/add/toCart', 'BookingController@setCart')->name('toCart');//add to cart
Route::get('/edit/toCart', 'BookingController@editcart')->name('editcart');//add to cart
Route::post('/update/cart/items', 'BookingController@updatecart')->name('updatecart');//update to cart
Route::get('/user/remove/cartproduct/{id}','BookingController@removecart')->name('removecartproduct');

//checkout
Route::post('/district','BookingController@district')->name('district');
//save payment details
Route::post('/save/payement/details', 'BookingController@paymentDetails')->name('paymentDetails');//update to cart



Route::post('/add/tobillingaddress', 'BookingController@BillingAddress')->name('BillingAddress');//add to cart

Route::get('/view/checkout', 'BookingController@viewcheckout')->name('viewcheckout');//view checkout page

Route::post('/user/view/usereditprofile','user\UserController@proedit')->name('Userproedit');// view user edit profile


//Route::post('/user/view/ServiceToPackage','user\UserController@viewuserEmployees')->name('userEmployees');
Route::get('/user/view/service/{id}','user\UserController@viewPackagesuser')->name('service-details-user');
Route::post('/user/view/service','user\UserController@viewPackagesuser')->name('userServiceToPackage');

Route::post('/user/view/package1','user\UserController@viewuserEmployees')->name('userEmployees');
Route::post('/user/view/choosedate','user\UserController@viewdate')->name('viewdate');
Route::get('/user/view/feedbacks','user\UserController@makefeedback')->name('feedback');
Route::post('/user/save/sfeedbacks','user\UserController@savefeedback')->name('addfeedback');

Route::get('user/updateuser', 'user\UserController@userupdates')->name('userupdate');//update user

Route::post('/user/save/appontment','user\UserController@saveappoinment')->name('makeappointment');//make appointment

Route::get('/user/check/date','user\UserController@verifyDate');//verify Date

Route::get('/user/view/pappointment','user\UserController@viewuserappontments')->name('viewappoinments');//viewappoinments

Route::post('/user/can/pappointment','user\UserController@cancelapointment')->name('canappo');//cancelappoinments

Route::get('/user/view/employees','user\UserController@viewuserEmployeessp')->name('userEmployeessp');


//employee routs
Route::get('/employeehome', 'EmployeeController@index1')->name('employeehome');
Route::get('/employee/view/service/{id}','EmployeeController@viewPackages')->name('service-details');

Route::get('/employee/leave', 'EmployeeController@empleave')->name('empleave');
Route::post('/empleave', 'EmployeeController@leave')->name('empleave1');
Route::post('/employee/cancelleave', 'EmployeeController@cancelLeave')->name('cancelLeave');

Route::get('/employee/viewfeedbacks', 'EmployeeController@empviewFeedbackform')->name('empviewFeedback');//view feedbacks
Route::get('/employee/viewappointments', 'EmployeeController@viewAppointment')->name('empviewappointment');//view feedbacks

// Route::view('/page', 'page');


Route::get('/send/email', 'HomeController@mail'); ;//mail emp add



//admin
Route::middleware(['disableadmin'])->group(function (){
    Route::post('/admin/savePackages','AdminController@savePackages')->name('savePackages');
    Route::post('/admin/saveEmployee','AdminController@saveEmployee')->name('saveEmployee');
    Route::post('/admin/addEmpRole', 'AdminController@addEmpRole')->name('addEmpRole');
    Route::post('/admin/addServices', 'AdminController@addServices')->name('addServices');
    Route::post('/admin/del/user', 'AdminController@delUser')->name('delUser');
    Route::post('/admin/del/services', 'AdminController@delServices')->name('delServices');
    Route::post('/admin/del/packages', 'AdminController@delPackages')->name('delPackages');

    Route::post('/admin/block/packages', 'AdminController@blockPackages')->name('blockPackages');  // block packages  unblockPackages
    Route::post('/admin/unblock/packages', 'AdminController@unblockPackages')->name('unblockPackages');  // unblock packages  

    Route::post('/admin/del/Employee', 'AdminController@delEmployees')->name('delEmployees');
    Route::post('/admin/rej/Empleave', 'AdminController@rejleave')->name('rejleave');
    Route::post('/admin/apr/Empleaves', 'AdminController@aprleave')->name('aprleave');

    Route::post('/admin/block/user', 'AdminController@BlockUser')->name('blockUser');// BLOCK USER
    Route::post('/admin/unblock/user', 'AdminController@UnblockUser')->name('unblockUser');// UNBLOCK USER
    Route::post('/admin/blocke/user', 'AdminController@BlockEUser')->name('blockEUser');// BLOCK USER
    Route::post('/admin/unblocke/user', 'AdminController@unBlockEUser')->name('unblockEUser');// UNBLOCK USER

    ///PRODUCT

//add product categeory

Route::view('/admin/viewcategeoryform', 'adminpages.addProductCategeory')->name('addProductCategeory');
Route::post('/admin/addproductcaregeory', 'AdminController@addproductcategeory')->name('ProductCategeory');
//update stock

//Route::get('/admin/viewProductstock', 'AdminController@viewupdateProductstock')->name('viewupdateProductstock');
Route::post('/admin/updateProductstock', 'AdminController@updateproduct')->name('updateproduct');
Route::get('/admin/updateProductstockss', 'AdminController@viewupdateProductstock')->name('updateproductss');


Route::get('/admin/viewProductstock/{id}', 'AdminController@productupdates')->name('productupdates');

// add product
Route::get('/admin/viewProduct', 'AdminController@viewProductForm')->name('viewProduct');
Route::post('/admin/addproductdetails', 'AdminController@saveProduct')->name('Product');

// product view

Route::get('/admin/list/products','AdminController@viewProducts')->name('listproducts');
Route::post('/admin/list/productsDetails','AdminController@viewProductsDetail')->name('listproductsDetail'); //detail


// delete product

Route::post('/admin/del/products', 'AdminController@delProducts')->name('delProducts');

//block product            

Route::post('/admin/block/products', 'AdminController@blockProducts')->name('blockProducts');

//unblockProducts

Route::post('/admin/unblock/products', 'AdminController@unblockProducts')->name('unblockProducts');
//..........................................PACKAGE...............................................................

Route::post('/admin/list/packageDetails','AdminController@viewPackageDetail')->name('listpackageDetail'); //detail


//----------------------------------------------------------------------------------------------------------
Route::get('/admin/viewEmployee', 'AdminController@viewEmployeeForm')->name('viewEmployee');
Route::get('/admin/viewPackage', 'AdminController@viewPackageForm')->name('viewPackage');
Route::get('/admin/viewfeedback', 'AdminController@viewFeedbackform')->name('viewFeedback');//view feedback
Route::post('/admin/del/feedback', 'AdminController@delfeedback')->name('deletefeedback');//REMOVE FEEEDBACK
Route::get('/admin/viewappointmentss', 'AdminController@viewAppointment')->name('viewappoi');//view appointments


Route::get('/admin/list/blockedusers','AdminController@viewblockedUsers')->name('listblockedusers');//view blocked users
Route::get('/admin/list/users','AdminController@viewUsers')->name('listusers');
Route::get('/admin/list/services','AdminController@viewServices')->name('listservices');
Route::get('/admin/list/packages','AdminController@viewPackages')->name('listpackages');
Route::get('/admin/list/employees','AdminController@viewEmployees')->name('listemployees');
Route::get('/admin/view/empleaves','AdminController@viewLeaves')->name('listempleaves');
Route::view('/adminhome', 'adminhome');
    

});