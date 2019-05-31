<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Service;
use App\Cart;

use Illuminate\Http\Request;

class AgentController extends Controller
{
      public function index1()
    {
        $data=Service::all();
        return view('agenthome',['data'=>$data]);
    }

    public function viewProductsBooking(Request $request){
    
        $data = DB::table('cart')
       ->join('regist', 'regist.user_id', '=', 'cart.userid')
       ->join('address', 'address.uid', '=', 'cart.userid')
       ->where('cart.satus', '=', '2')->orWhere('cart.satus', '=', '0')->orWhere('cart.satus', '=', '3')->orWhere('cart.satus', '=', '4')
       ->get();
       
       return view('agentpages.agentviewproductBooking', ['data' => $data,]);
   }
   public function viewProductsBookingDetails(Request $request){
    $sta= $request->status;
    $amnt=$request->tmnt;
    $data = DB::table('cart')
   ->join('cartitems', 'cartitems.cartid', '=', 'cart.cartid')
   ->join('products', 'cartitems.ptoductid', '=', 'products.id')
   ->where('cartitems.cartid', $request->id)
   ->get();
   
   return view('agentpages.AgentproductBooking', ['data' => $data,'sta'=>$sta,'total'=>$amnt,]);
}
public function  Deliveredproduct(Request $request)
{
   // return $request;
  Cart::where('cartid', $request->id)->update(['satus'=>4]);;
  $data = DB::table('cart')
  ->join('regist', 'regist.user_id', '=', 'cart.userid')
  ->join('address', 'address.uid', '=', 'cart.userid')
  ->where('cart.satus', '=', '2')->orWhere('cart.satus', '=', '0')->orWhere('cart.satus', '=', '3')->orWhere('cart.satus', '=', '4')
  ->get();
  
  return view('agentpages.agentviewproductBooking', ['data' => $data,]);
}
}
