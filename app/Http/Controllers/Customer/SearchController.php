<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $results        = new Collection();
        $key            = str_slug($request->get('key'), $separator = "-");
        $resultProducts = Product::where('slug', 'LIKE', '%' . $key . '%')->orderBy('name')->get();
        $results->merge($resultProducts);
        $resultCategories = Category::where('slug', 'LIKE', '%' . $key . '%')->orderBy('name')->get();
        foreach ($resultCategories as $resultCategory) {
            $products = $resultCategory->products()->get();
            $results  = $results->merge($products);
        }
        $resultBrands = Brand::where('slug', 'LIKE', '%' . $key . '%')->orderBy('name')->get();
        foreach ($resultBrands as $resultBrand) {
            $products = $resultBrand->products()->get();
            $results  = $results->merge($products);
        }
        $results = $results->unique();

        $results = new \Illuminate\Pagination\LengthAwarePaginator(
            $results->forPage(\Illuminate\Pagination\Paginator::resolveCurrentPage(), 9),
            $results->count(), 9,
            \Illuminate\Pagination\Paginator::resolveCurrentPage(),
            ['path' => \Illuminate\Pagination\Paginator::resolveCurrentPath()]
        );
        return view('customers.search_result', ['results' => $results]);

    }
}
