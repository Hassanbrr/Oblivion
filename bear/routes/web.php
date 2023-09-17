<?php

use App\Http\Controllers\SingerController;
use App\Http\Controllers\MyAuthController;
use Illuminate\Support\Facades\Route;



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





//create read update destroy for singers 
Route::resource('/', SingerController::class)->parameters(['singer' => 'id']);
Route::get('/edit/{id}', [SingerController::class, "edit"]);
Route::put('/update/{id}', [SingerController::class, "update"]);
Route::delete('/destroy/{id}', [SingerController::class, "destroy"]);


Route::view('login',     'login');
Route::view('register',  'register');

Route::get('index',  [MyAuthController::class, 'index']);
Route::get('logout', [MyAuthController::class, 'logout']);

Route::post('login',     [MyAuthController::class, 'login']);
Route::post('register',  [MyAuthController::class, 'register']);
