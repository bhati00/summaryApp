<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SummaryAppController;
use App\Http\Controllers\RawTextController;
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
Route::get('/', [SummaryAppController::class, 'index']);

Route::get('/checkdb',function(){
    return view('check_db_connection');
});

// CRUD FOR raw text file 
Route::get('add-raw-text', [RawTextController::class, 'index']);
Route::post('store-raw-text', [RawTextController::class, 'store']);
Route::get('files-list', [RawTextController::class, 'raw_text_files']);
Route::get('view-raw-file/{file_id}', [RawTextController::class, 'view_raw_file']);

// generating insights from raw text 
Route::get('generate-key-points/{file_id}',[SummaryAppController::class,'generate_key_points']);

