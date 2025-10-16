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
use App\Http\Resources\Auth\LoginResource;

class AuthController extends Controller
{

    /**
     * register a new user into the database
     */
    public function register(UserRegistrationRequest $request) {

        $fields = $request->all();
        $user = User::create($fields);
        
        $data = [
            "id" => $user->id,
            "name" => $user->name,
            "email" => $user->email,
            "created_at" => $user->created_at
        ];

        $response = (new LoginResource($data))
            ->response()
            ->setStatusCode(201);
    }


    public function login(UserLoginRequest $request) {
        $existingUser = User::where("email", $request["email"])->first();

        if (!$existingUser || !Hash::check($request->password, $existingUser->password)){
            return response()->json(null, 401);
        }

        $token = $existingUser->createToken($existingUser->id);
        $data = [
            "id" => $existingUser->id,
            "email" => $existingUser->email,
            "created_at" => $existingUser->created_at,
            "token" => $token->plainTextToken
        ];

        $response = (new LoginResource($data))
            ->response()
            ->setStatusCode(200);

        return $response;
    }

    public function logout(Request $request) {
        $request->user()->tokens()->delete();

        return [
            "message" => "User logout successfully!"
        ];
    }

}
