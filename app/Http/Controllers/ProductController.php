<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{


    
        /**
         * Display a listing of the resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function index()
        {
            //
            $product = Product::all();
            

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
            $produ
         */
        public function edit(Product $product)
        {
            //
            $product = Product::find($id);
            // $this->validate($request,
             $product->guarantee_duration = $request->guarantee_duration;
            $product->category_id        = 1;

            $product->save();
            echo "Done";
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
        }

        /**
         * Show the form for editing the specified resource.
         *
         * @param  \App\Models\Product  $product
         * @return \Illuminate\Http\Response   [ //cac loi
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
            $product->name = $request->name;

            $product->price              = $request->price;
            $product->description        = $request->description;
            $product->is_hot             = $request->is_hot;
            $product->is_new             = $request->is_new;
            $product->image              = $request->image;
            $product->is_available       = $request->is_available;
            $produ
         */
        public function edit(Product $product)
        {
            //
            $product = Product::find($id);
            // $this->validate($request,
             $product->guarantee_duration = $request->guarantee_duration;
            $product->category_id        = 1;

            $product->save();
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

        /**
         * Remove the specified resource from storage.
         *
         * @param  \App\Models\Product  $product
         * @return \Illuminate\Http\Response
         */
        public function destroy($id)
        {
            //
            $product = Product::find($id);
            $product->delete();
            echo "Deleted";
        }
    }


    
        /**
         * Display a listing of the resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function index()
        {
            //
            $product = Product::all();
            

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
            $product->category_id        = 1;

            $product->save();
            echo "Done";
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
        }

        /**
         * Show the form for editing the specified resource.
         *
         * @param  \App\Models\Product  $product
         * @return \Illuminate\Http\Response   [ //cac loi
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
            $product->name = $request->name;

            $product->price              = $request->price;
            $product->description        = $request->description;
            $product->is_hot             = $request->is_hot;
            $product->is_new             = $request->is_new;
            $product->image              = $request->image;
            $product->is_available       = $request->is_available;
            $product->guarantee_duration = $request->guarantee_duration;
            $product->category_id        = 1;

            $product->save();
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

        /**
         * Remove the specified resource from storage.
         *
         * @param  \App\Models\Product  $product
         * @return \Illuminate\Http\Response
         */
        public function destroy($id)
        {
            //
            $product = Product::find($id);
            $product->delete();
            echo "Deleted";
        }
    }


    //

    // public function addProduct(Request $request)
    // {
    //     # code...
    //     //echo $request->Ten;
    //     $this->validate($request,
    //         [ //cac loi
    //             'name'  => 'required|unique:products|min:3|max:100',
    //             'price' => 'min:0',
    //         ],
    //         [ //cac thong bao
    //             'name.required' => 'Bạn chưa nhập tên',
    //             'name.unique'   => 'Tên đã tồn tại',
    //             'name.min'      => 'Tên tối thiểu 3 kí tự',
    //             'name.max'      => 'Tên tối đa 100 kí tự',
    //             'price.min'     => 'Giá không được âm',
    //         ]);

    //     //sau khi bat loi xong, tien hanh luu du lieu
    //     $product       = new Product;
    //     $product->name = $request->name;

    //     $product->price              = $request->price;
    //     $product->description        = $request->description;
    //     $product->is_hot             = $request->is_hot;
    //     $product->is_new             = $request->is_new;
    //     $product->image              = $request->image;
    //     $product->is_available       = $request->is_available;
    //     $product->guarantee_duration = $request->guarantee_duration;
    //     $product->category_id        = 1;

    //     $product->save();
    //     echo "Done";

    //     //     // return redirect('')->with('add', 'Successfully');
    // }

    // //  public function addProduct()
    // // {

    // //     $product              = new Product;
    // //     //$product->name         = $request->name;
    // //     $product->name         = 'Test Thử';
    // //     $product->price         = 8888;
    // //     $product->description         = 'Tham Kim Dung';
    // //     $product->is_hot = 2;
    // //     $product->is_new =3;
    // //     $product->image ='df';
    // //     $product->is_available=3;
    // //     $product->guarantee_duration=1;
    // //     $product->category_id=1;

    // //     $product->save();
    // //     echo "Done";

    // //     // return redirect('')->with('add', 'Successfully');
    // // }

    // public function deleteProduct($id)
    // {
    //     # code...
    //     $product = Product::find($id);
    //     $product->delete();
    //     echo "Done";
    // }

    // public function editProduct(Request $request, $id)
    // {
    //     # code...
    //     $product = Product::find($id);
    //     $this->validate($request,
    //         [ //cac loi
    //             'name'  => 'required|unique:products|min:3|max:100',
    //             'price' => 'min:0',
    //         ],
    //         [ //cac thong bao
    //             'name.required' => 'Bạn chưa nhập tên',
    //             'name.unique'   => 'Tên đã tồn tại',
    //             'name.min'      => 'Tên tối thiểu 3 kí tự',
    //             'name.max'      => 'Tên tối đa 100 kí tự',
    //             'price.min'     => 'Giá không được âm',
    //         ]);
    //     $product->name = $request->name;

    //     $product->price              = $request->price;
    //     $product->description        = $request->description;
    //     $product->is_hot             = $request->is_hot;
    //     $product->is_new             = $request->is_new;
    //     $product->image              = $request->image;
    //     $product->is_available       = $request->is_available;
    //     $product->guarantee_duration = $request->guarantee_duration;
    //     $product->category_id        = 1;

    //     $product->save();

    // }
//}
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        $product->category_id        = 1;

        $product->save();
        return redirect()->route('products.index');

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
        $product->is_available = $request->unit;
        $product->is_hot       = $request->is_hot;
        $product->is_new       = $request->is_new;

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

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $product = Product::find($id);
        $product->delete();
        return redirect()->route('products.index');
    }
}
