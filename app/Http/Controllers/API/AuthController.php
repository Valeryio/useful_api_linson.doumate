<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Auth\UserLoginRequest;
use Dotenv\Exception\ValidationException;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(UserLoginRequest $request) {

        $credentials = $request->all();

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return response()->json([
                "success" => true,
            ]);
        }

        throw ValidationException::withMessage([
            "message" => "Wrong credentials!"
        ]
        );
    }

    public function register() {

    }
}
