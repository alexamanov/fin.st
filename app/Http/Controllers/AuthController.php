<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    private const TOKEN_NAME = 'finst_token';

    public function register(Request $request): Response
    {
        $fields = $request->validate([
            User::NAME => 'required|string',
            User::EMAIL => 'required|unique:users,email',
            User::PASSWORD => 'required',
        ]);

        $user = User::create([
            User::NAME => $fields[User::NAME],
            User::EMAIL => $fields[User::EMAIL],
            User::PASSWORD => bcrypt($fields[User::PASSWORD]),
        ]);

        $token = $user->createToken(self::TOKEN_NAME)->plainTextToken;

        return response([
            'user' => $user,
            'token' => $token,
        ], 201);
    }

    public function login(Request $request): Response
    {
        $fields = $request->validate([
            User::EMAIL => 'required',
            User::PASSWORD => 'required',
        ]);

        $user = User::where(User::EMAIL, $fields[User::EMAIL])->first();
        if (empty($user) || !Hash::check($fields[User::PASSWORD], $user->password)) {
            return response()->json([
                'message' => 'Bad request',
            ], 401);
        }

        $token = $user->createToken(self::TOKEN_NAME)->plainTextToken;

        return response([
            'user' => $user,
            'token' => $token,
        ], 200);
    }

    public function logout(): JsonResponse
    {
        auth()->user()->tokens()->delete();

        return response()->json([
            'message' => 'Logged out',
        ]);
    }
}
