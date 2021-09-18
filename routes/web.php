<?php

use App\Http\Controllers\Auth\DashboardController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\PostsController;
use Illuminate\Support\Facades\Route;

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

// Prevent using the browser back button on logout Wrapper
Route::group(['middleware' => 'prevent-back-history'],function(){
    
    //=================
    // HOMEPAGE ROUTE
    //=================
    Route::get('/', function () {
        return view('welcome');
    })->name('home');

    /*
    |--------------------------------------------------------------------------
    | Grouped resource routes
    |--------------------------------------------------------------------------
    | Grouped routes (can be prefixed i.e: /admin) to login for users with admin roles
    | & using auth middleware to authenticate user
    |
    */
    Route::group(['middleware' => 'auth'], function() {

        //=================
        // POST ROUTES
        //=================
        Route::post('/post/store', [PostsController::class, 'store'])
            ->name('post.store');
            
        Route::get('/post/create', [PostsController::class, 'create'])
            ->name('post.create');

        Route::get('/posts/trashed', [PostsController::class, 'trashed'])
            ->name('posts.trashed');

        Route::get('/post/{id}', [PostsController::class, 'show'])
            ->name('post.show');

        Route::get('/posts', [PostsController::class, 'index'])
            ->name('posts');

        Route::get('/posts/edit/{id}', [PostsController::class, 'edit'])
            ->name('post.edit');

        Route::post('/post/update/{id}', [PostsController::class, 'update'])
            ->name('post.update');

        Route::get('/post/delete/{id}', [PostsController::class, 'destroy'])
            ->name('post.delete');

        Route::get('/post/permanant/{id}', [PostsController::class, 'permanant'])
            ->name('post.permanant');

        Route::get('/post/restore/{id}', [PostsController::class, 'restore'])
            ->name('post.restore');

        //=================
        // CATEGORY ROUTES
        //=================
        Route::get('/category/create', [CategoriesController::class, 'create'])
            ->name('category.create');

        Route::post('/category/store', [CategoriesController::class, 'store'])
            ->name('category.store');

        Route::post('/category/update/{id}', [CategoriesController::class, 'update'])
            ->name('category.update');

        Route::get('/categories', [CategoriesController::class, 'index'])
            ->name('categories');

        Route::get('/category/edit/{id}', [CategoriesController::class, 'edit'])
            ->name('category.edit');

        Route::get('/category/delete/{id}', [CategoriesController::class, 'destroy'])
            ->name('category.delete');

        //=================
        // DASHBOARD ROUTE
        //=================
        Route::get('/dashboard', [DashboardController::class, 'index'])
            // ->middleware('verified')
            ->name('dashboard');
    });

    require __DIR__.'/auth.php';
});
