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

Route::get('/', function () {
    return view('guest.welcome');
});

Route::get('/posts', 'PostController@index')->name('posts.index');
Route::get('/posts/{post}', 'PostController@show')->name('posts.show');
Route::post('/posts', 'PostController@store')->name('posts.store');

Route::get('/home', 'HomeController@index')->name('home');
Auth::routes();

Route::name('admin.')->prefix('admin')->namespace('Admin')->middleware('auth')
->group(function() {
    Route::delete('/comments/{comment}', 'CommentController@destroy')->name('comments.destroy');
    Route::resource('posts','PostController');
    //rotta commenti admin
});
