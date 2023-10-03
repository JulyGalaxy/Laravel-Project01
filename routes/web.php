<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\SubscribeController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\AuthMiddleware;
use App\Models\Blog;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\Rules\Can;

Route::middleware(AdminMiddleware::class)->group(function(){
    Route::get('/admin', [AdminController::class,'index'])->name('admin.dashboard');
    Route::get('/admin/blogs/create', [AdminController::class,'create']);
    Route::post('/admin/blogs/store', [AdminController::class,'store']);
    Route::get('/admin/blogs/{blog:slug}/edit', [AdminController::class,'edit']);
    Route::patch('/admin/blogs/{blog:slug}/update', [AdminController::class,'update']);
    Route::delete('/admin/blogs/{blog:slug}/destroy', [AdminController::class,'destroy']);
});

Route::middleware(AuthMiddleware::class)->group(function(){
    Route::get('/', [BlogController::class,'index']);
    Route::get('/blogs/{blog:slug}',[BlogController::class,'show']);
    Route::post('/logout',[AuthController::class,'logout']);
    Route::post('/blogs/{blog:slug}/comments',[CommentController::class,'store']);
    Route::post('/blogs/{blog:slug}/toggle-subscribe',[SubscribeController::class,'toggle'])->name('blogs.toggle');
    Route::get('/comments/edit/{comment}',[CommentController::class,'edit'])->name('comments.edit');
    Route::put('/comments/update/{comment}',[CommentController::class,'update'])->name('comments.update');
    Route::delete('/comments/delete/{comment}',[CommentController::class,'delete'])->name('comments.delete')->middleware('can:edit,comment');
});


Route::middleware('guest')->group(function(){
    Route::get('/login',[AuthController::class,'login']);
    Route::post('/login',[AuthController::class,'loginStore']);
    Route::get('/register',[AuthController::class,'create']);
    Route::post('/register',[AuthController::class,'store']);
});





// resource - category
Route::get('/categories',[CategoryController::class,'index']);
Route::get('/categories/{slug}',[CategoryController::class,'show']);


Route::get('/about', function () {
    return view('about');
});
