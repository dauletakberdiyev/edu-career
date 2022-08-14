<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\PostController;
use App\Http\Controllers\API\UserController;
use App\Models\User;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('reports', ReportController::class);
Route::apiResource('posts', PostController::class);
Route::apiResource('users', UserController::class);

Route::get('/update/git/repo', function() {
    $res = shell_exec('git pull origin master');
    return $res;
});