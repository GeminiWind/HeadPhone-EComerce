<?php

namespace App\Http\Controllers;

use App\Http\Requests\CateRequest;
use App\Models\Category;

class CateController extends Controller
{

    public function getAddCate()
    {
        return view('admins.category');
    }

    public function postAddCate(CateRequest $request)
    {
        $cate              = new Category();
        $cate->name        = $request->name;
        $cate->slug        = str_slug($request->name);
        $cate->description = $request->description;
        $cate->save();
        return redirect()->route('admin.category.store') -> with(['flash_message'=>'Success complete add category']);
    }

}
