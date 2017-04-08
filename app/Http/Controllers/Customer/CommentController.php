<?php

namespace App\Http\Controllers\Customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Comment;
use App\Models\Post;
use Auth;

class CommentController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request)
    {
    	$request->merge(['user_id' => Auth::user()->id]);
    	$comment = new Comment();
    	$filledData = $request->only('content');
    	$comment->forceFill($filledData);
    	$comment->user_id = $request->get('user_id');
    	if ($request->get('target') === 'product' )
    	{
    		$product = Product::whereSlug($request->get('product_slug'))->first();
    		$product->comments()->save($comment);
    	}
    	if ($request->get('target') === 'post' )
    	{
    		$post = Post::whereSlug($request->get('post_slug'))->first();
    		$post->comments()->save($comment);
    	}
    	return redirect()->back();
    }
}
