<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Auth;
use Validator;
use Illuminate\Http\Request;

class PostController extends Controller
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
        $posts = Post::orderBy('created_at')->get();
        return view('admins.post.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admins.post.create');
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
            'title'   => 'required|unique:posts,title',
            'content' => 'required',
        ];
        $messages = [
            'title.required'   => 'Enter the name of post',
            'title.unique'     => "Post existing",
            'content.required' => 'Required content',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if (!$validator->fails()) {
            $post = new Post();
            $data = $request->only(['title', 'content']);
            $post->forceFill($data);
            $admin          = Auth::guard('admin')->user();
            $post->admin_id = $admin->id;
            $post->save();
            return redirect()->route('post.index')->with('status', 'success');
        } else {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()->with('status', 'error');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $post = Post::whereSlug($slug)->first();
        return view('admins.post.show', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $post = Post::whereSlug($slug)->first();
        return view('admins.post.edit', ['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $rules = [
            'title'   => 'required|unique:posts,title',
            'content' => 'required',
        ];
        $messages = [
            'title.required'   => 'Enter the name of post',
            'title.unique'     => "Post existing",
            'content.required' => 'Required content',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if (!$validator->fails()) {
            $post = Post::whereSlug($slug)->first();
            $data = $request->only(['title', 'content']);
            $post->update($data);
            $post->save();
            return redirect()->route('post.index')->with('status', 'success');
        } else {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()->with('status', 'error');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $post = Post::whereSlug($slug)->first();
        if ($post) {
            $post->delete();
            return back()->with('status', 'success');
        }
        return back()->with('status', 'error');
    }
}
