<?php

namespace App\Http\Controllers\Customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use Illuminate\Support\Collection;

class SearchController extends Controller
{
    public function search(Request $request)
    {
    	$results = new Collection();
    	$key = $request->get('key');
    	$resultProducts = Product::where('name', 'LIKE', '%'.$key.'%')->orderBy('name')->get();
    	$results->merge($resultProducts);
    	$resultCategories = Category::where('name', 'LIKE', '%'.$key.'%')->orderBy('name')->get();
    	foreach ($resultCategories as $resultCategory) {
    		$products = $resultCategory->products()->get();
    		$results = $results->merge($products);
    	}
    	$resultBrands = Brand::where('name', 'LIKE', '%'.$key.'%')->orderBy('name')->get();
    	foreach ($resultBrands as $resultBrand) {
    		$products = $resultBrand->products()->get();
    		$results = $results->merge($products);
    	}
    	$results = $results->unique();
    	
    		$results = new \Illuminate\Pagination\LengthAwarePaginator(
		        $results->forPage(\Illuminate\Pagination\Paginator::resolveCurrentPage() ,9),
		        $results->count(), 9,
		        \Illuminate\Pagination\Paginator::resolveCurrentPage(),
		        ['path' => \Illuminate\Pagination\Paginator::resolveCurrentPath()]
		    );
    		return view('customers.search_result', ['results' => $results]);
    	
   
    }
}
