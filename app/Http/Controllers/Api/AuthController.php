<?php

namespace App\Http\Controllers\Api;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login(Request $request) {
        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'password' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->getMessageBag(), 422);
        }

        $user = User::where("username", $request->username)->first();

        if($user && Hash::check($request->password, $user->password)) {
            $tokenResult = $user->createToken("Personal Access Token");
            return response()->json([
                "user" => $user,
                "token" => $tokenResult,
                "expires_at" => Carbon::parse($tokenResult->token->expires_at)->toDateTimeString()
            ]);
        }

        return response()->json([
            "status" => false,
            "message" => "Username and Password doesn't match!"
        ], 500);
    }
}
