<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Mail\PlaceOrderMail;
use App\Models\Order;
use App\Models\Product;
use Auth;
use Cart;
use Illuminate\Http\Request;
use Mail;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function checkout(Request $request)
    {
        $customer = Auth::user();
        //create order
        $order        = new Order;
        $order->total = Cart::subtotal(0, '', '');
        $order->user()->associate($customer);
        $order->save();
        foreach (Cart::content() as $item) {
            $order->products()->attach([$item->id => ['quantity' => $item->qty]]);
            $product = Product::find($item->id);
            //update stock
            $stock           = $product->stock;
            $stock->quantity = $stock->quantity - $item->qty;
            $stock->save();
        }
        $order->save();
        //Send Mail To Customer
        Mail::to($customer->email)->send(new PlaceOrderMail($order));
        //clean the cart
        Cart::destroy();

        return redirect()->back();
    }
}
