<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthContrroller extends Controller
{
    //

    public function login(Request $request)
    {
        $loginData = $request->validate([
            "email" => "required|email",
            "password" => "required"
        ]);

        $user = User::where("email", $loginData['email'])->first();

        //check user exist
        if (!$user) {
            return response(['message' => 'Invalid credentials'], 401);
        }

        if (!Hash::check($loginData['password'], $user->password)) {
            return response(['message' => 'Invalid credentials'], 401);
        }
        $token = $user->createToken('auth_token')->plainTextToken;

        return response(["user" => $user, "token" => $token]);
    }

    public function logout(Request $request){
        $request->user()->currentAccessToken()->delete();

        return response(['message'=>"logout success"]);

    }


}
