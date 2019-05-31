<?php
 
namespace App\Http\Controllers;
 
use Session;
use Redirect;
use Razorpay\Api\Api;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
 
class RazorpayController extends Controller
{    
    public function pay_with_razorpay()
    {        
        return view('paa');
    }
 
    public function payment()
    {
        $input   = Input::all();
        $api     = new Api(config('custom.razor_key'), config('custom.razor_secret'));
        $payment = $api->payment->fetch($input['razorpay_payment_id']);
 
        if(count($input)  && !empty($input['razorpay_payment_id']))
        {
            try
            {
                $response = $api->payment->fetch($input['razorpay_payment_id'])->capture(array('amount'=>$payment['amount'])); 
 
            }
            catch (\Exception $e)
            {
                return  $e->getMessage();
                \Session::put('error',$e->getMessage());
                return redirect()->back();
            }
 
            // Do something here for store payment details in database...
        }
        
        \Session::put('success', 'Payment successful, your order will be despatched in the next 48 hours.');
        return redirect()->back();
    }
}
 
?>