<?php

namespace App\Http\Controllers\Authentication;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->zip = $request->zip;
        $user->username = $request->username;
        $user->address = $request->address;
        $user->message = $request->message;
        $user->phoneNumber = $request->phoneNumber;
        $user->save();
        // return  $user;
        return response()->json(['message' => 'You are successfully registered'], 200);
    }

    public function login(Request $request)
    {
        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::guard('web')->attempt($credentials)) {
            $user = Auth::guard('web')->user();
            $user->api_token = Str::random(60);
            $user->save();

            return $user;
        }

        return response()->json(['message' => 'Something went wrong'], 401);
    }

    public function logout(Request $request)
    {
        $user = Auth::guard('api')->user();
        $user->api_token = null;
        $user->save();

        return response()->json(['message' => 'You are successfully logged out'], 200);
    }
}