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

// Index page
Route::get('/', 'ShowIndex');
// Storefront show single blog post
Route::get('/post/{slug}/', 'ShowBlogPost');
// Login
Route::get('login', 'LoginController@index');
Route::post('/login/', 'LoginController@authenticate');
Route::get('logout', 'LoginController@logout');
// Admin
/*
Route::prefix('admin')->group(function() {
  Route::resource('/blogposts', 'BlogPostController');
  Route::view('/dashboard', 'dashboard');
})->middleware('checkauth');
 */

Route::group(['middleware' => 'checkauth', 'prefix' => 'admin'], function(){
  Route::resource('/blogposts', 'BlogPostController');
  Route::view('/dashboard', 'dashboard');
});
