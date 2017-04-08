<?php

namespace App\Http\Controllers\Customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
    	$posts = Post::orderBy('created_at')->get();
    	return view('customers.post.index',['posts' => $posts]);
    }

    public function show($postSlug)
    {
    	$post = Post::whereSlug($postSlug)->first();
    	return view('customers.post.show', ['post' =>$post]);
    }
}
