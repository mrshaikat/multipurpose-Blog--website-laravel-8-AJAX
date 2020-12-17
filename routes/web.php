<?php

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


//Frontend Load
Route::get('/', 'App\Http\Controllers\FrontEndController@homePage');
Route::get('/blog', 'App\Http\Controllers\FrontEndController@blogPage') -> name('blog');
Route::get('/blog-single/{slug}', 'App\Http\Controllers\FrontEndController@singlePost') -> name('blog.single');

// Route::get('/blog-single', function () {
//     return view('frontend.blog-single');
// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Category Routes
Route::resource('post-category', 'App\Http\Controllers\CategoryController');
Route::get('post-category-unpublished/{id}', 'App\Http\Controllers\CategoryController@unpublishedCategory') -> name('category.unpublished');
Route::get('post-category-published/{id}', 'App\Http\Controllers\CategoryController@publishedCategory') -> name('category.published');
Route::get('post-category-edit/{id}', 'App\Http\Controllers\CategoryController@edit');
Route::post('post-category-update', 'App\Http\Controllers\CategoryController@update') -> name('category.update');

// Tags Routes

Route::resource('tag', 'App\Http\Controllers\TagController');
Route::get('post-tag-unpublished/{id}', 'App\Http\Controllers\TagController@unpublishedTag') -> name('tag.unpublished');
Route::get('post-tag-published/{id}', 'App\Http\Controllers\TagController@publishedTag') -> name('tag.published');
Route::get('post-tag-edit/{id}', 'App\Http\Controllers\TagController@edit');
Route::post('post-tag-update', 'App\Http\Controllers\TagController@update') -> name('category.update');

// Posts Routes
Route::resource('post', 'App\Http\Controllers\PostController');
Route::get('post-edit/{id}', 'App\Http\Controllers\PostController@edit');
