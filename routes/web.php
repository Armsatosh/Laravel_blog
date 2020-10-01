<?php

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
    return view('welcome');
});
Route::group(['namespace'=>'Blog', 'prefix'=>'blog'],function (){
    Route::resource('posts','PostController')->names('blog.posts');
});
//Route::resource('rest','RestTestController')->names('restTest');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

//----------- ADMIN PART -----------//
$groupData = [
    'namspace' => 'Blog\Admin',
    'prefix'   => 'admin/blog'
];
Route::group($groupData,function (){
    //BlogCategory
    $methods = ['index','edit','store','update', 'create'];
    Route::resource('categories','CategoryCantroller')->only($methods)->names('blog.admin.categories');
});
//------- End Admin Part -------//
