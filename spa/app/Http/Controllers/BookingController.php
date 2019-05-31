<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Cart;
use App\User;
use App\Cartitems;
use App\Product;
use App\State;
use App\District;
use App\BillingAddress;
use App\PaymentDetails;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMailableProduct;

class BookingController extends Controller
{

    //see if cart is open
    protected function isCartOpen()
    {
        $cart = Cart::where('userid', Auth::id())
        ->where('satus', 1)->get();
        if ($cart->count()) {
            return $cart[0]->cartid;
        }
        return false;
        //returns id or false
    }

    //open a new cart
    public function openCart()
    {
        $cart = Cart::create(['userid' => Auth::id(), 'satus' => 1, 'totalamount' => 0]);
        return $cart->cartid;
        //returns id
    }

    //add products to cart
    protected function addProducts($product, $cartId)
    {
        if (!$this->productExists($product, $cartId)) {
            //add
            Cartitems::create(['ptoductid' => $product, 'cartid' => $cartId, 'count' => 1]);
            return true;
        }

        return false;
    }

    //check if product already added in the cart
    protected function productExists($productId, $cartId)
    {
        return Cartitems::where('ptoductid', $productId)
        ->where('cartid', $cartId)->count();
        # code...
    }


    ///user cart
    public function setCart(Request $request)
    {
        $request->all();
        //check if cart is open else open one
        $cartId = $this->isCartOpen();
        if (!$cartId) {
            $cartId = $this->openCart();
        }

        //add products
        $product = $request->ptoductid;
        $alert = "Product is already in the Cart";
        if ($this->addProducts($product, $cartId)) {
            $alert = "Successfully Added!";
        }

        return $this->viewcart();
        //redirect
    }
    public function viewcart()                              //view cart
    {
        $data = DB::table('cart')
            ->join('cartitems', 'cartitems.cartid', '=', 'cart.cartid')
            ->join('products', 'products.id', '=', 'cartitems.ptoductid')
            ->where('cart.userid', Auth::id())
            ->where('cart.satus', '=', '1')
            ->get();
        return view('userpages.productcart', ['data' => $data]);
    }

    public function viewmycart()                              //view my cart
    {
        $data = DB::table('cart')
            ->join('cartitems', 'cartitems.cartid', '=', 'cart.cartid')
            ->join('products', 'products.id', '=', 'cartitems.ptoductid')
            ->where('cart.userid', Auth::id())
            ->where('cart.satus', '=', '1')
            ->get();
        return view('userpages.productcart', ['data' => $data]);
    }

    public function editcart()                          //view edit cart
    {
        $data = DB::table('cart')
            ->join('cartitems', 'cartitems.cartid', '=', 'cart.cartid')
            ->join('products', 'products.id', '=', 'cartitems.ptoductid')
            ->where('cart.userid', Auth::id())
            ->where('cart.satus', '=', '1')
            ->get();
        return view('userpages.editproductcart', ['data' => $data]);
    }

    public function updatecart(Request $request)
    {
        //  return $request->all();
        //cartid
        $cartId = Cart::where('satus', '1')
        ->where('userid', Auth::id())->get()[0]->cartid;
        //cartitems
        $cartItems = Cartitems::where('cartid', $cartId)->get();
        $msg = "";
        foreach ($cartItems as $item) {

            $pid = $item->ptoductid;
            $count = $request->get($pid);
            if ($count != "") {
                $stock = Product::where('id', $pid)
                ->select('stock')->get()[0]->stock;

                if ($count != "" && $count <= $stock) {
                    Cartitems::where('cartid', $cartId)
                    ->where('ptoductid', $pid)
                    ->update(['count' => $request->get($pid)]);
                } else {
                    $msg = "The requested Quantity not available";
                }
            }
        }
        if ($msg == "") {
            return $this->viewcart();
        } else {
            //update view
            $data = DB::table('cart')
                ->join('cartitems', 'cartitems.cartid', '=', 'cart.cartid')
                ->join('products', 'products.id', '=', 'cartitems.ptoductid')
                ->where('cart.userid', Auth::id())
                ->where('cart.satus', '=', '1')
                ->get();
            return view('userpages.editproductcart', ['data' => $data, 'msg' => $msg]);;
        }
    }

    public function removecart($id)
    {
        //return $request->all();
        //cartid
        $cartId = Cart::where('satus', '1')
        ->where('userid', Auth::id())->get()[0]->cartid;
        //cartitems
        Cartitems::where('cartid', $cartId)
        ->where('ptoductid', $id)->delete();

        return $this->editcart();
    }


    public function viewcheckout()                              //view checkoutpage
    {

        $cartId = Cart::where('satus', '1')
        ->where('userid', Auth::id())->get()[0]->cartid;

        //cartitems
        $cartItems = Cartitems::where('cartid', $cartId)->get();
        $msg = "";
        foreach ($cartItems as $item) {
            $pid = $item->ptoductid;
            $count = $item->count;

            if ($count != "") {
                $stock = Product::where('id', $pid)
                ->select('stock')->get()->toArray();
            }

            if (sizeof($stock)) {
                if ($count != "" && $count > $stock[0]['stock']) {
                    $msg = "The requested Quantity not available please update your Cart";
                }
            }
        }
        if ($msg == "") {
            $data = DB::table('cart')
                ->join('cartitems', 'cartitems.cartid', '=', 'cart.cartid')
                ->join('products', 'products.id', '=', 'cartitems.ptoductid')
                ->where('cart.userid', Auth::id())
                ->where('cart.satus', '=', '1')
                ->get();
            $states = State::where('status', 1)->get();
            $address = DB::table('address')
                ->join('districts', 'districts.did', '=', 'address.district')
                ->join('states', 'states.sid', '=', 'districts.sid')
                ->where('uid', Auth::id())
                ->get();
            return view('userpages.checkout', ['data' => $data, 'states' => $states, 'address' => $address]);
        } else {
            //update view
            $data = DB::table('cart')
                ->join('cartitems', 'cartitems.cartid', '=', 'cart.cartid')
                ->join('products', 'products.id', '=', 'cartitems.ptoductid')
                ->where('cart.userid', Auth::id())
                ->where('cart.satus', '=', '1')
                ->get();
            return view('userpages.productcart', ['data' => $data, 'msg' => $msg]);;
        }
    }
    public function district(Request $request)
    {
        // return  $request;
        return District::where('sid', $request->sid)
        ->where('status', 1)->get();
    }
    public function BillingAddress(Request $request) // add Billing address
    {
        //$request;
        $count = BillingAddress::where('uid', Auth::id())->count();
        if ($count == 0) {
            $address = new BillingAddress($request->all());

            $address->uid = Auth::id();
            $address->save();
        } else {
            $address = new BillingAddress($request->all());

            $address->uid = Auth::id();
            BillingAddress::where('uid',  Auth::id())
            ->update($request->except('_token', 'total'));
        }
        $total = $request->total;
        $cartId = Cart::where('satus', '1')
        ->where('userid', Auth::id())->get()[0]->cartid;
        Cart::where('cartid', $cartId)->update(['totalamount' => $total]);


        $data = DB::table('cart')
            ->join('cartitems', 'cartitems.cartid', '=', 'cart.cartid')
            ->join('products', 'products.id', '=', 'cartitems.ptoductid')
            ->where('cart.userid', Auth::id())
            ->where('cart.satus', '=', '1')
            ->get();
        $states = State::where('status', 1)->get();


        $address = DB::table('address')
            ->join('districts', 'districts.did', '=', 'address.district')
            ->join('states', 'states.sid', '=', 'districts.sid')
            ->where('uid', Auth::id())
            ->get();

        return view('userpages.payment', ['data' => $data, 'states' => $states, 'address' => $address]);
    }

    public function ViewBillingAddress(Request $request) // add Billing address
    {
        $data = DB::table('cart')
            ->join('cartitems', 'cartitems.cartid', '=', 'cart.cartid')
            ->join('products', 'products.id', '=', 'cartitems.ptoductid')
            ->where('cart.userid', Auth::id())
            ->where('cart.satus', '=', '1')
            ->get();
        $states = State::where('status', 1)->get();


        $address = DB::table('address')
            ->join('districts', 'districts.did', '=', 'address.district')
            ->join('states', 'states.sid', '=', 'districts.sid')
            ->where('uid', Auth::id())
            ->get();

        return view('userpages.payment', ['data' => $data, 'states' => $states, 'address' => $address]);
    }




    public function paymentDetails(Request $request)
    {
        // $request;
        $details = new PaymentDetails($request->except('cvv', 'date'));
        $details->save();

        //cart items
        $cartItems = Cartitems::where('cartid', $request->cartid)->get();
        foreach ($cartItems as $item) {
            //deduct stock
            $currStock = Product::where('id', $item->ptoductid)
            ->get()[0]->stock;
            $updatedStock = $currStock - $item->count;
            Product::where('id', $item->ptoductid)
            ->update(['stock' => $updatedStock]);
        }

        $data = DB::table('cart')
            ->join('cartitems', 'cartitems.cartid', '=', 'cart.cartid')
            ->join('products', 'products.id', '=', 'cartitems.ptoductid')
            ->where('cart.userid', Auth::id())
            ->where('cart.satus', '=', '1')
            ->get();


        $add = DB::table('cart')
            ->join('address', 'address.uid', '=', 'cart.userid')
            ->join('regist', 'regist.user_id', '=', 'cart.userid')
            ->where('cart.userid', Auth::id())
            ->where('cart.satus', '=', '1')
            ->get();
        $maildetails = User::where('id', Auth::id())->get();
        $mailto = $maildetails[0]->email;
        $name = $add[0]->fname;
        $cartid = $add[0]->cartid;
        $bdt = Carbon::now()->toDateString();
        $this->productmail($mailto, $name, $cartid, $bdt);


        $dt = Carbon::now();

        cart::where('cartid', $request->cartid)
        ->update(['satus' => 2, 'bookingdate' => $dt->toDateString()]);



        return view('userpages.paymentinvoice', ['data' => $data, 'add' => $add]);
    }

    //mail
    public function productmail($mailto, $name, $cartid, $bdt)
    {
        if (Mail::to($mailto)->send(new SendMailableProduct($name, $cartid, $bdt))) {
            return true;
        }
        return false;
    }

    public function viewspaymentDetails(Request $request)
    {

        return view('/home');
    }
}
