<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SubscriberController;
use App\Http\Middleware\MustBeAdmin;
use App\Http\Middleware\MustBeAuthUser;
use App\Http\Middleware\MustBeGuestUser;
use Illuminate\Support\Facades\Route;

Route::middleware(MustBeAdmin::class)->group(function () {
    Route::get('/admin', [AdminController::class, 'index']);
    Route::get('/admin/blogs/create', [AdminController::class, 'create']);
    Route::Post('/admin/blogs/store', [AdminController::class, 'store']);
    Route::delete('/admin/blogs/{blog}/delete', [AdminController::class, 'destory']);
    Route::get('/admin/blogs/{blog}/edit', [AdminController::class, 'edit']);
    Route::put('/admin/blogs/{blog}/update', [AdminController::class, 'update']);

    Route::get('/admin/categorylist', [CategoryController::class, 'index']);
    Route::get('/admin/categories/create', [CategoryController::class, 'create']);
    Route::Post('/admin/categories/store', [CategoryController::class, 'store']);
    Route::delete('/admin/categories/{category}/delete', [CategoryController::class, 'destory']);
    Route::get('/admin/categories/{category}/edit', [CategoryController::class, 'edit']);
    Route::put('/admin/categories/{category}/update', [CategoryController::class, 'update']);
});

Route::middleware(MustBeAuthUser::class)->group(function(){
    Route::get('/', [BlogController::class, 'index']);
    //wildcard
    Route::get('/blogs/{blog:slug}', [BlogController::class, 'show']);
    Route::get('/about', [AboutController::class, 'index']);
    Route::delete('/logout', [LogoutController::class, 'destory']);
    Route::Post('/blogs/{blog:slug}/comments', [CommentController::class, 'store']);
    Route::delete('/comment/{comment}/destory', [CommentController::class, 'destory']);
    Route::Post('/blogs/{blog:slug}/handel-subscription', [SubscriberController::class, 'toggle']);
});

Route::middleware(MustBeGuestUser::class)->group(function() {
    Route::get('/register', [RegisterController::class, 'create']);
    Route::Post('/register', [RegisterController::class, 'store']);
    Route::get('/login', [LoginController::class, 'create']);
    Route::Post('/login', [LoginController::class, 'store']);
});

    Route::get('/{user:username}', [ProfileController::class, 'show']);
    Route::get('/{user:username}/setting/edit-profile', [ProfileController::class, 'edit']);
    Route::put('/{user:username}/setting/edit-profile/update', [ProfileController::class, 'update']);
    Route::get('/{user:username}/setting/password', [ProfileController::class, 'store']);
    Route::put('/{user:username}/setting/password/update', [ProfileController::class, 'changePassword']);


//laravel resource controller

//action    method    view
//all       index     {resource}.index 
//single    show      {resource}.show
//create    create    {resource}.create
//create    store    {resource}.store
//edit      edit      {resource}.edit
//destory   destory   {resource}.destory