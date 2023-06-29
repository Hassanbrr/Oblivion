<?php

use App\Http\Controllers\SingerController;
use App\Models\Candy;
use App\Models\Singer;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;


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



if (Auth::user()) {

    Route::resource('/', SingerController::class)->parameters(['singer' => 'id']);
} else {
    Route::get('/', function () {
        return view("/login");
    });
}

//create read update destroy for singers 
Route::resource('/', SingerController::class)->parameters(['singer' => 'id']);
Route::get('/edit/{id}', [SingerController::class, "edit"]);
Route::put('/update/{id}', [SingerController::class, "update"]);
Route::delete('/destroy/{id}', [SingerController::class, "destroy"]);









Route::get("/logout", function () {
    Session::flush();
    Auth::logout();
    return Redirect('login');
});
Route::view("/login", "login");
Route::post("/login", function (Request $request) {
    if (Auth::attempt($request->only('email', 'password')))
        return redirect('/');
    return redirect("login");
});
Route::view("/register", "register");
Route::post("/register", function (Request $request) {
    $request["password"] = Hash::make($request['password']);
    User::create($request->all());
    return redirect("login");
});
