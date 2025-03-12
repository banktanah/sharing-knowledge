<?php

use App\Http\Api\SiteAcknowledgeApi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::prefix('site-acknowledge')->group(function () {
    Route::get('/list', [SiteAcknowledgeApi::class, 'list']);
    Route::post('/get', [SiteAcknowledgeApi::class, 'get']);
    Route::post('/update', [SiteAcknowledgeApi::class, 'update']);
});
