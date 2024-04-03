<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserLoginController
{
    function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        if (Auth::attempt($credentials)){
            //delete old tokens
            $request->user()->tokens()->where('tokenable_id', $request->user()->id)->delete();
            $token = $request->user()->createToken($request->user()->name);

            return  response()->json([
                'token' => $token->plainTextToken,
                'status' => 200
            ]);
        }else{
            return response()->json([
                'message' => 'The provided credentials do not match our records.',
                'status' => 401
            ]);
        }
    }
}
