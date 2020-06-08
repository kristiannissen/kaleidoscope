<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Resources\ActivityCollection;
use App\Http\Resources\BlogPostCollection;
use App\Http\Resources\BlogPost as BlogPostResource;
use App\Activity;
use App\BlogPost;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/activity/{model_id}', function($model_id) {
  return new ActivityCollection(Activity::where('model_id', '=', $model_id)->orderBy('created_at')->get());
});

Route::get('blogpost/{id}', function($id) {
  return new BlogPostResource(BlogPost::find($id));
});

Route::get('blogposts', function() {
  return new BlogPostCollection(BlogPost::all());
});
