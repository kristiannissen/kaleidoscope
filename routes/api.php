<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Log;

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

Route::get('/activity/{model_id}', function ($model_id) {
    return new ActivityCollection(
        Activity::where('model_id', '=', $model_id)
            ->orderBy('created_at')
            ->get()
    );
});

Route::get('blogpost/{id}', function ($id) {
    return new BlogPostResource(BlogPost::find($id));
});

Route::get('blogposts', function () {
    return new BlogPostCollection(BlogPost::all());
});

Route::get('blogpost/{id}/prevnext', function ($id) {
    $prev_id = $id - 1;
    $next_id = $id + 1;
    if ($prev_id == 0) {
        $prev_id = 0;
    }
    return new BlogPostCollection(
        BlogPost::whereIn('id', [$prev_id, $next_id])->get()
    );
})->middleware('cors');

Route::get('latest-blogposts', function() {
  return new BlogPostCollection(
    BlogPost::where('online', '=', 'online')
      ->orderBy('online_at', 'desc')
      ->limit(10)
      ->get()
  );
})->middleware('cors');

Route::post('tracker/{random_id}/', function($random_id) {
  return 'hello '. $random_id;
});

Route::post('error/{random_id}/', function($random_id) {
  return 'hello '. $random_id;
});
