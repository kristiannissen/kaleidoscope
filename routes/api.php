<?php

use Illuminate\Http\Request;

use App\BlogEntry;
use App\Http\Resources\BlogEntry as BlogEntryResource;
use App\Http\Controllers\API\AnalyticsController as AnalyticsController;

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

Route::get('/blogentries', function () {
    return BlogEntryResource::collection(BlogEntry::popular()->get());
});

Route::get('/blogentries/{id}/related', function($id = 0) {
    return BlogEntryResource::collection(BlogEntry::related($id)->get());
});

Route::apiResource('/analytics', 'API\AnalyticsController');
