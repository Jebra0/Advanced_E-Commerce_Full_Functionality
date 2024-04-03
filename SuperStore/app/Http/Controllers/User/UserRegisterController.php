<?php

namespace App\Http\Controllers\User;

use App\Http\Requests\UserRegisterRequest;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserRegisterController
{
    function register(UserRegisterRequest $request): JsonResponse
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        $token = $user->createToken($user->name);

        return  response()->json([
            'token' => $token->plainTextToken,
            'status' => 200
        ]);
    }

    function destroy(Request $request): JsonResponse
    {
        $request->user()->tokens()->where('tokenable_id', $request->user()->id)->delete();

        return response()->json(['message' => 'Loged out successfully']);
    }
}
