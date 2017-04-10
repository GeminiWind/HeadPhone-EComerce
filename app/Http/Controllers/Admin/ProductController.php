<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Validator;

class ProductController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $products = Product::all();
        return view('admins.product', compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'name'         => 'required|unique:products,name',
            'price'        => 'required|min:0',
            'description'  => 'required',
            'is_new'       => 'required',
            'is_hot'       => 'required',
            'is_available' => 'required',
            'guarantee_duration' => 'required',
            'category_id'  => 'required|exists:categories,id',
            'brand_id'  => 'required|exists:brands,id',
        ];
        $messages = [
            'name.required'   => 'Enter the name of product',
            'name.unique'     => "Product existing",
            'is_new.required' => 'Required new',
            'is_hot.requied'  => 'required hot',
            'description'     => 'Required description',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if (!$validator->fails()) {
            $request->merge([
                'image'  => '{"main": "In Ear/250_678_tai_nghe_sennheiser_cx271_chinh_hang.gif"}',
            ]);
            $inputs = $request->only([
                'name',
                'price',
                'is_hot',
                'is_new',
                'is_available',
                'guarantee_duration',
                'image',
                'description'
            ]);
            $product = new Product;
            $product->forceFill($inputs);
            $product->category_id = $request->category_id;
            $product->brand_id = $request->brand_id;
            $product->save();
            return redirect()->route('products.index')->with('status', 'success');
        } else {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
    }

    public function update(Request $request, $slug)
    {
         $rules = [
            'price'        => 'required|min:0',
            'description'  => 'required',
            'is_new'       => 'required',
            'is_hot'       => 'required',
            'is_available' => 'required',
            'guarantee_duration' => 'required',
            'category_id'  => 'required|exists:categories,id',
            'brand_id'  => 'required|exists:brands,id',
        ];
        $messages = [
            'is_new.required' => 'Required new',
            'is_hot.requied'  => 'required hot',
            'description'     => 'Required description',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if (!$validator->fails()) {
            $request->merge([
                'image'  => '{"main": "In Ear/250_678_tai_nghe_sennheiser_cx271_chinh_hang.gif"}',
            ]);
            $inputs = $request->only([
                'price',
                'is_hot',
                'is_new',
                'is_available',
                'guarantee_duration',
                'image',
                'description'
            ]);
            $product = Product::whereSlug($slug)->first();
            if ($product)
            {
                $product->update($inputs);
                $product->category_id = $request->category_id;
                $product->brand_id = $request->brand_id;
            }
            $product->save();
            return redirect()->route('products.index')->with('status', 'success');
        } else {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        if ($product)
        {
            $product->delete();
            return redirect()->route('products.index')->with('status','success');
        }
        abort(404);
      
    }

}
