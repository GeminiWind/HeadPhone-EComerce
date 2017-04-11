<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CateRequest;
use App\Http\Requests\CateRequestUpdate;
use App\Models\Category;
use App\Logic\CategoryProductLogic;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cateData = Category::all();
        return view('admins.category', compact('cateData'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CateRequest $request)
    {
        if ($request) {
            $category = Category::create($request->all());
        }

        return redirect()->route('category.index')->with(['flash_message' => 'Sussess complete add category']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CateRequestUpdate $request, $id)
    {
        $category = Category::findOrFail($id);
        $category->update($request->all());
        return redirect()->route('category.index')->with(['flash_message' => 'Update completed description']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        $logic = new CategoryProductLogic($category);
        if ($logic->canDelete())
        {
            $category->delete();
            return redirect()->route('category.index')->with(['flash_message' => 'Delete completed a category']);
        }
        return back()->with('status','error');
    }
}
