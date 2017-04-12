<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Logic\ProductOrderLogic;
use App\Models\Category;
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
            'name'               => 'required|unique:products,name',
            'price'              => 'required|min:0',
            'description'        => 'required',
            'is_new'             => 'required',
            'is_hot'             => 'required',
            'is_available'       => 'required',
            'file'               => 'required|image',
            'guarantee_duration' => 'required',
            'category_id'        => 'required|exists:categories,id',
            'brand_id'           => 'required|exists:brands,id',
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
            $image       = $request->file('file');
            $name        = str_random(6) . '_' . str_slug($request->name) . '.' . $image->getClientOriginalExtension();
            $category    = Category::find($request->category_id);
            $destination = substr(config('headphone.products'), 1) . $category->name;
            $image->move($destination, $name);
            $request->merge([
                'image' => ['main' => $category->name . '/' . $name],
            ]);
            $inputs = $request->only([
                'name',
                'price',
                'is_hot',
                'is_new',
                'is_available',
                'image',
                'guarantee_duration',
                'description',
            ]);
            $product = new Product;
            $product->forceFill($inputs);
            $product->category_id = $request->category_id;
            $product->brand_id    = $request->brand_id;
            $product->save();
            return redirect()->route('products.index')->with('status', 'success');
        } else {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()->with('status', 'error');
        }
    }

    public function update(Request $request, $slug)
    {
        $rules = [
            'price'              => 'required|min:0',
            'description'        => 'required',
            'is_new'             => 'required',
            'is_hot'             => 'required',
            'is_available'       => 'required',
            'guarantee_duration' => 'required',
            'category_id'        => 'required|exists:categories,id',
            'brand_id'           => 'required|exists:brands,id',
        ];
        $messages = [
            'is_new.required' => 'Required new',
            'is_hot.requied'  => 'required hot',
            'description'     => 'Required description',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if (!$validator->fails()) {
            $product = Product::whereSlug($slug)->first();
            if ($product) {
                if ($request->hasFile('file')) {
                    $image       = $request->file('file');
                    $name        = str_random(6) . '_' . str_slug($product->name) . '.' . $image->getClientOriginalExtension();
                    $category    = Category::find($product->category_id);
                    $destination = substr(config('headphone.products'), 1) . $category->name;
                    $image->move($destination, $name);
                    $request->merge([
                        'image' => ['main' => $category->name . '/' . $name],
                    ]);
                    $inputs = $request->only([
                        'price',
                        'is_hot',
                        'is_new',
                        'is_available',
                        'guarantee_duration',
                        'image',
                        'description',
                    ]);
                } else {
                    $inputs = $request->only([
                        'price',
                        'is_hot',
                        'is_new',
                        'is_available',
                        'guarantee_duration',
                        'description',
                    ]);
                }
                $product->update($inputs);
                $product->category_id = $request->category_id;
                $product->brand_id    = $request->brand_id;
            }
            $product->save();
            return redirect()->route('products.index')->with('status', 'success');
        } else {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()->with('status', 'error');
        }
    }

    public function destroy($id)
    {
        $product = Product::with('orders')->find($id);
        if ($product) {
            $logic = new ProductOrderLogic($product);
            if ($logic->canDelete()) {
                $product->delete();
                return redirect()->route('products.index')->with('status', 'success');
            }
            return redirect()->route('products.index')->with('status', 'error');

        }
        abort(404);

    }
}
