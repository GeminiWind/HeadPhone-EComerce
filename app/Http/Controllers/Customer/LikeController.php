<?php

namespace App\Http\Controllers\Customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Like;
use App\Models\Post;
use App\Models\Product;
use Auth;

class LikeController extends Controller
{


    public function like($slug,$target)
    {
    	$like = new Like();
    	$like->forceFill(['user_id' =>Auth::guard('web')->user()->id]);
    	if ($target === 'product' )
    	{
    		$product = Product::whereSlug($slug)->first();
    		$product->likes()->save($like);
    	}
    	if ($target === 'post' )
    	{
    		$post = Post::whereSlug($slug)->first();
    		$post->likes()->save($like);
    	}
    	return back();
    }
}
