<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;


class ProductController extends Controller
{
   

    public function index()
    {
        //
        $products = Product::all();
        //dd($products);
        return view('admins.product', compact('products'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request,
            [ //cac loi
                'name'  => 'required|unique:products|min:3|max:100',
                'price' => 'min:0',
            ],
            [ //cac thong bao
                'name.required' => 'Bạn chưa nhập tên',
                'name.unique'   => 'Tên đã tồn tại',
                'name.min'      => 'Tên tối thiểu 3 kí tự',
                'name.max'      => 'Tên tối đa 100 kí tự',
                'price.min'     => 'Giá không được âm',
            ]);
        //sau khi bat loi xong, tien hanh luu du lieu
        $product       = new Product;
        $product->name = $request->name;
        $product->price              = $request->price;
        $product->description        = $request->description;
        $product->is_hot             = $request->is_hot;
        $product->is_new             = $request->is_new;
        $product->image              = $request->image;
        $product->is_available       = $request->is_available;
        $product->guarantee_duration = $request->guarantee_duration;
        $product->category_id        = $request->category_id;
        $product->brand_id        = 1;
        $product->created_at        = $request->created;
        
        $product->save();
        return redirect()->route('products.index')->with('thongbao','Success');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $product = Product::find($id);
        echo $product;

        //echo "string";
    }
    public function edit(Request $request, $id)
    {
        //
        $product = Product::find($id);
        // $this->validate($request,
        $product->name = $request->name;
        // $product->category_id        = $request->all_categories;
        $product->description  = $request->description;
        $product->price        = $request->price;
        $product->category_id  = $request->category_id;
        $product->is_available = $request->is_available;
        $product->is_hot       = $request->is_hot;
        $product->is_new       = $request->is_new;
        $product->image =$request->image;
        $product->save();
        return redirect()->route('products.index');
    }
   
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }
   
    public function destroy($id)
    {
        //
        $product = Product::find($id);
        $product->delete();
        return redirect()->route('products.index');
    }

}
