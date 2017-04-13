<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Category;

class CategoryController extends Controller
{
    public function show($slugCategory)
    {
        $category = Category::whereSlug($slugCategory)->with('products')->first();
        if ($category) {
        	$products = $category->products()->paginate(6);
            return view('customers.category', ['category' => $category, 'products' => $products]);
        }
        abort(404);
    }
}
