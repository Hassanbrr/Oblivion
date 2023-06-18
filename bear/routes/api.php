<?php

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

Route::get("/{hello}/{number}", function ($hello, $number) {
    $number .= "";
    $hello .= "\n";
    $s = "";
    foreach (str_split($number) as $ch)
        $s .= str_repeat($hello, (int)($ch));

    return $s;
});






Route::get("/hello", function () {
    return "hi";
});




Route::get("/random", function () {
    $n = rand(10, 100);
    $characters = 'abcdefghijklmnopqrstuvwxyz';
    $charactersLength = strlen($characters);

    $uc = "#$!^@";
    $randomString = '';
    $randomChar = '';
    $ucLength = strlen($uc);
    for ($i = 0; $i < 2; $i++) {
        $randomString .= $characters[random_int(0, $charactersLength - 1)];
    };
    for ($i = 0; $i < 1; $i++) {
        $randomChar .= $uc[random_int(0, $ucLength - 1)];
    };
    return $randomString . "-" . $n . "-" . $randomChar . "-";
});





Route::post('/register', [AuthController::class, 'register']);

Route::post('/login', [AuthController::class, 'login']);

Route::group(['middleware' => ['auth:sanctum']], function () {

    Route::post('/logout', [AuthController::class, 'logout']);

    Route::post('/info', function (Request $request) {
        $user = $request->user();
        return response()->json(['username' => $user->name, 'data' => 'this is our protected data for ' . $user->name]);
    });
});
