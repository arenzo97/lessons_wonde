<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClassesController;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\DashboardController;

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

Route::get('/', function () {
    return view('home');
});

//routes for lessons features
Route::get('dashboard',[DashboardController::class,'index']);


//routes for lessons features
Route::get('classes/{teacher_id}',[ClassesController::class,'index']);

Route::get('classes/students/{class_id}',[StudentsController::class,'index']);