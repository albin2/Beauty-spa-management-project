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

Auth::routes();

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
Route::view('/adminhome', 'adminhome');
Route::post('/admin/savePackages','AdminController@savePackages')->name('savePackages');
Route::post('/admin/saveEmployee','AdminController@saveEmployee')->name('saveEmployee');
Route::post('/admin/addEmpRole', 'AdminController@addEmpRole')->name('addEmpRole');
Route::post('/admin/addServices', 'AdminController@addServices')->name('addServices');
Route::post('/admin/del/user', 'AdminController@delUser')->name('delUser');
Route::post('/admin/del/services', 'AdminController@delServices')->name('delServices');
Route::post('/admin/del/packages', 'AdminController@delPackages')->name('delPackages');
Route::post('/admin/del/Employee', 'AdminController@delEmployees')->name('delEmployees');
Route::post('/admin/rej/Empleave', 'AdminController@rejleave')->name('rejleave');
Route::post('/admin/apr/Empleaves', 'AdminController@aprleave')->name('aprleave');



//menu_redirect
Route::view('/admin/viewEmpRole', 'adminpages.addEmpRole')->name('viewEmpRole'); //viewEmpRole
Route::view('/admin/viewServices', 'adminpages.addServices')->name('viewServices');
Route::get('/admin/viewEmployee', 'AdminController@viewEmployeeForm')->name('viewEmployee');
Route::get('/admin/viewPackage', 'AdminController@viewPackageForm')->name('viewPackage');
Route::get('/admin/viewfeedback', 'AdminController@viewFeedbackform')->name('viewFeedback');//view feedback
Route::post('/admin/del/feedback', 'AdminController@delfeedback')->name('deletefeedback');//REMOVE FEEEDBACK
Route::get('/admin/viewappointmentss', 'AdminController@viewAppointment')->name('viewappoi');//view appointments

Route::get('/admin/list/users','AdminController@viewUsers')->name('listusers');
Route::get('/admin/list/services','AdminController@viewServices')->name('listservices');
Route::get('/admin/list/packages','AdminController@viewPackages')->name('listpackages');
Route::get('/admin/list/employees','AdminController@viewEmployees')->name('listemployees');
Route::get('/admin/view/empleaves','AdminController@viewLeaves')->name('listempleaves');


//user routs
Route::get('/user/view/service/{id}','user\UserController@viewPackagesuser')->name('service-details-user');

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

