<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Product;

class ProductController extends Controller
{
    public function show($categorySlug, $productSlug)
    {
        $product = Product::whereSlug($productSlug)->with('comments')->first();
        if ($product) {
            $relatedProducts = Product::whereCategoryId($product->category->id)->where('id', '!=', $product->id)->paginate(3);
            return view('customers.product', ['product' => $product, 'relatedProducts' => $relatedProducts]);
        }
        abort(404);
    }
}
