<?php

namespace App\Http\Controllers\Customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Cart;
use App\Models\Product;

class CartController extends Controller
{
    public function index() {
    	return view('customers.cart');
    }

    public function quickAdd($productSlug, $qty=1)
    {
    	$product= Product:: whereSlug($productSlug)->first();
    	Cart::add(array(
            'id'=>$product->id,
            'name'=>$product->name,
            'price'=>$product->price,
            'qty'=>$qty,
            'options' => [
              	'main_image'=>$product->image['main']
            ]));
    	return redirect()->back();

    }
    public function add($productSlug, Request $request) {
    	$product= Product:: whereSlug($productSlug)->first();
    	Cart::add(array(
            'id'=>$product->id,
            'name'=>$product->name,
            'price'=>$product->price,
            'qty'=>$request->qty,
            'options' => [
              	'main_image'=>$product->image['main']
            ]));
        return redirect()->back();

    }

    public function update(Request $request, $rowId) {
    	// Will update the quantity
    	Cart::update($rowId, $request->qty);
    	return redirect()->back();
    }
    
    public function remove($rowId) {
        Cart::remove($rowId);
        return redirect()->back();
    }
    public function destroy() {
        Cart::destroy();
        return redirect()->back();
    }

    public function search($productId) {
    	$cart = Cart::content();
		return ($cart->search(function ($cartItem, $rowId) use ($productId) {	
		    return $cartItem->id == $productId;
		}));
    }
}
