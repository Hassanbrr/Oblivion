<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function register(Request $request)
    {
        $user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);
        $token = $user->createToken('authToken')->plainTextToken;
        return response()->json(['access_token' => $token]);
    }

    public function login(Request $request)
    {
        if (!Auth::attempt($request->only('email', 'password'))) {
            return response()->json(['message' => 'Invalid login data'], 401);
        }

        $user = User::where('email', $request['email'])->firstOrFail();
        $token = $user->createToken('authToken')->plainTextToken;
        return response()->json(['access_token' => $token]);
    }

    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();
        return [
            'message' => 'user logged out'
        ];
    }
}
