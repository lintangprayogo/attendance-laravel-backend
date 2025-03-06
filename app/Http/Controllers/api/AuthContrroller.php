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


        return response()->json([
            'message' => 'Login success',
            'access_token' => $token,
            'user' => $user,
        ], 200);
    }

    public function logout(Request $request){
        $request->user()->currentAccessToken()->delete();

        return response(['message'=>"logout success"]);

    }
    
    public function updateProfile(Request $request)
    {
        $request->validate([
            'face_embedding' => 'required',
        ]);
        $user = $request->user();
        $face_embedding = $request->face_embedding;
        $user->face_embedding = $face_embedding;
        $user->save();

        return response([
            'message' => 'Profile updated',
            'user' => $user,
        ], 200);
    }

}
