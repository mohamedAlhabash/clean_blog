<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        $categoriesCount = Category::count();
        $postsCount = Post::count();
        $usersCount = User::count();
        return view('admin.index', compact('categoriesCount', 'postsCount', 'usersCount'));
    }
}
