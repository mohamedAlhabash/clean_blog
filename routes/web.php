<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PagesController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::prefix('admin')->name('admin.')->middleware('auth', 'check_user')->group(function(){
    Route::get('',[AdminController::class ,'index'])->middleware('check_admin')->name('index');
    Route::resource('categories',CategoryController::class);
    Route::resource('posts', PostController::class);
});

//Route::get('/admin',[AdminController::class,'index'])->middleware('auth');
Route::prefix('clean-blog')->name('frontend.')->group(function(){
    Route::get('/', [PagesController::class, 'index'])->name('index');
    Route::get('/about', [PagesController::class, 'about'])->name('about');
    Route::get('/contact', [PagesController::class, 'contact'])->name('contact');
    Route::post('/contact', [PagesController::class, 'contactSubmit'])->name('contactSubmit');
    Route::get('/posts/{slug}', [PagesController::class, 'postDetails'])->name('post_details');

});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
