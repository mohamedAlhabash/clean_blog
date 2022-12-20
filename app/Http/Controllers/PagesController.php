<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PagesController extends Controller
{
    public function index()
    {
        $posts = Post::latest('id')->simplePaginate(4);
        return view('frontend.index', compact('posts'));
    }

    public function postDetails($slug)
    {
        $post = Post::whereSlug($slug)->first();
        return view('frontend.post', compact('post'));
    }

    public function about()
    {
        return view('frontend.about');
    }

    public function contact()
    {
        return view('frontend.contact');
    }

    public function contactSubmit(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|exists:users,email',
            'phone' => 'required',
            'message' => 'required',
        ]);
        Mail::to('admin@admin.com')->send(new ContactMail($request->except('_token')));
        return redirect()->back();
    }
}
