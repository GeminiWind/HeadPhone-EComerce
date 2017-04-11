<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Mail\PlaceOrderMail;
use App\Models\Order;
use App\Models\Product;
use App\Models\Receiver;
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
        $order                 = new Order;
        $order->total          = Cart::subtotal(0, '', '');
        $order->payment_method = $request->payment_method;
        $order->user()->associate($customer);
        $order->save();
        foreach (Cart::content() as $item) {
            $order->products()->attach([$item->id => ['quantity' => $item->qty, 'price' => $item->price]]);
            $product = Product::find($item->id);
            //update the number of purchased product
            $product->count = $product->count + $item->qty;
            $product->save();
            //update stock
            $stock           = $product->stock;
            $stock->quantity = $stock->quantity - $item->qty;
            $stock->save();
        }
        $order->save();
        $receiver = new Receiver();
        if ($request->receiver_type === 'auth') {
            $receiver->forceFill([
                'name'      => Auth::guard('web')->user()->name,
                'email'     => Auth::guard('web')->user()->email,
                'address'   => Auth::guard('web')->user()->address,
                'telephone' => Auth::guard('web')->user()->telephone,
                'note'      => $request->note,
            ]);
            $order->receiver()->save($receiver);
        } else {
            $receiver->forceFill([
                'name'      => $request->name,
                'email'     => $request->email,
                'address'   => $request->address,
                'telephone' => $request->telephone,
                'note'      => $request->note,
            ]);
            $order->receiver()->save($receiver);
        }
        //Send Mail To Customer
        Mail::to($order->receiver->email)->send(new PlaceOrderMail($order));
        //clean the cart
        Cart::destroy();

        return redirect()->back()->with('status', 'success');
    }
}
