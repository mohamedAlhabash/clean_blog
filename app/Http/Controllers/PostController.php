<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::latest()->paginate(10);
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::query()->get(['id', 'name']);
        $users = User::query()->get(['id', 'name']);
        return view('admin.posts.create', compact('categories', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:posts,title',
            'subtitle' => 'required|max:255',
            'content' => 'required',
            'image' => 'required|file|mimes:png,jpg',
            'user_id' => 'required|exists:users,id',
            'category_id' => 'required|exists:categories,id',
        ]);

        if($request->hasFile('image')){
            $ex = $request->file('image')->getClientOriginalExtension();
            $new_name = 'post_'. time() .'.'. $ex;
            $request->file('image')->move(public_path('uploads/'), $new_name);
        }

        Post::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'subtitle' => $request->subtitle,
            'content' => $request->content,
            'image' => $new_name,
            'user_id' => $request->user_id,
            'category_id' => $request->category_id,
        ]);

        return redirect()->route('admin.posts.index')
        ->with('success','Post created')
        ->with('type', 'success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::query()->get(['id', 'name']);
        $users = User::query()->get(['id', 'name']);
        $post = Post::findOrFail($id);
        return view('admin.posts.edit', compact('categories', 'users', 'post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = Post::find($id);
        
        $request->validate([
            'title' => 'required|unique:posts,title,' . $post->id,
            'subtitle' => 'required|max:255',
            'content' => 'required',
            'image' => 'nullable|file|mimes:png,jpg',
            'user_id' => 'required|exists:users,id',
            'category_id' => 'required|exists:categories,id',
        ]);


        $new_name = $post->image;
        if($request->hasFile('image')){
            $ex = $request->file('image')->getClientOriginalExtension();
            $new_name = 'post_'. time() .'.'. $ex;
            $request->file('image')->move(public_path('uploads/'), $new_name);
        }

        $post->update([
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'content' => $request->content,
            'image' => $new_name,
            'user_id' => $request->user_id,
            'category_id' => $request->category_id,
        ]);

        return redirect()->route('admin.posts.index')
        ->with('success','Post updated')
        ->with('type', 'success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post::findorFail($id)->delete();
        return redirect()->route('admin.posts.index')
        ->with('success','Post deleted')
        ->with('type', 'danger');
    }
}
