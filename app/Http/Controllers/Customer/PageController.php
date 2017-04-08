<?php

namespace App\Http\Controllers\Customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;

class PageController extends Controller
{
      public function getIndex(){
        $newProduct = Product::where('is_new',1)->paginate(4);
        // $sanpham_khuyenmai = Product::where('promotion_price','<>',0)->paginate(8);
        return view('customers.home',compact('newProduct'));
    }

}
