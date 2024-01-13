<?php

use App\Http\Controllers\BlogController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('/blog')->group(function(){
    Route::get('/',[BlogController::class,'getAllBlogs']);
    Route::get('/{id?}',[BlogController::class,'findBlogById'])
        ->whereNumber('id');
    Route::post('/post',[BlogController::class,'postBlog']);
    Route::put('/post',[BlogController::class,'updateBlog']);
});



