<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SummaryAppController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UploadFileController;;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Home page 
Route::get('/dashboard', [SummaryAppController::class, 'index']);

Route::get('/checkdb',function(){
    return view('check_db_connection');
});

Route::get('add-blog-post-form', [PostController::class, 'index']);
Route::post('store-form', [PostController::class, 'store']);

Route::get('/uploadfile','UploadFileController@index');
Route::post('/uploadfile','UploadFileController@showUploadFile');