<?php

use App\Http\Controllers\PassportController;
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
Route::prefix('v1')->group(function () {
Route::post('/login', [PassportController::class, 'login']);
Route::middleware('auth:api')->get('/all', [PassportController::class, 'users']);
Route::post('/posts', 'PostController@create');
Route::get('/posts', 'PostController@index');
Route::get('/posts/{id}', 'PostController@show');
Route::put('/posts/{id}', 'PostController@update');
Route::delete('/posts/{id}', 'PostController@delete');

});