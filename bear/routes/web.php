<?php

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
Route::get('/', function () {
    return view('index');
});
Route::get('/', function () {
    if (Auth::user()) {

        if (Auth::user()->role == 1) {

            return view("/index");
        } else {
            return view("/create");
        }
    } else {
        return view("/login");
    }
});
Route::get("/logout", function () {
    Session::flush();
    Auth::logout();
    return Redirect('login');
});
Route::view("/login", "login");
Route::post("/login", function (Request $request) {
    if (Auth::attempt($request->only('email', 'password')))
        return redirect('index');
    return redirect("login");
});
Route::view("/register", "register");
Route::post("/register", function (Request $request) {
    $request["password"] = Hash::make($request['password']);
    User::create($request->all());
    return redirect("login");
});
Route::view("/create", "create");
Route::post("/create", function (Request $request) {
    if (!Auth::check() || (Auth::check() and Auth::user()->role != 2))
        return "<h1>Forbidden Action</h1>";
    $file = $request->file('imagefile');
    $uid = (string) Str::uuid() . "." . $file->getClientOriginalExtension();
    $file->move('uploads', $uid);
    $request["image"] = $uid;
    $request["user_id"] = Auth::user()->id;
    Singer::create($request->all());
    return redirect('index');
});
Route::get('/index', function () {
    $singers = Singer::all();
    return view('index', compact("singers"));
});
