<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Auth\UserLoginRequest;
use App\Http\Requests\Auth\UserRegistrationRequest;
use App\Models\User;
use Dotenv\Exception\ValidationException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function register(UserRegistrationRequest $request) {

        $fields = $request->all();
        $user = User::create($fields);
        
        $data = [
            "id" => $user->id,
            "name" => $user->name,
            "email" => $user->email,
            "created_at" => $user->created_at
        ];

        return [
            "user" => $data
        ];
    }


    public function login(UserLoginRequest $request) {
        $existingUser = User::where("email", $request["email"])->first();

        if (!$existingUser || !Hash::check($request->password, $existingUser->password)){
            return [
                "message" => "Provided values are incorrect!"
            ];
        }

        $data = [
            "id" => $existingUser->id,
            "email" => $existingUser->email,
            "created_at" => $existingUser->created_at
        ];
        $token = $existingUser->createToken($existingUser->id);
         return [
            "user" => $data,
            "token" => $token->plainTextToken
        ];
    }

    public function logout(Request $request) {
        $request->user()->tokens()->delete();

        return [
            "message" => "User logout successfully!"
        ];
    }

}
