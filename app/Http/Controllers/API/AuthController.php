<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        //1. validation - email passport required
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        //2. check login attempt - user exist or not
        if(\Auth::attempt(['email' => $request->email, 'password' => $request->password])){

        //3.if exist, create token

        $user = auth()->user();
        $token = $user->createToken('Finance Project')->accessToken;

        return response()->json([
            'success' => true,
            'message' => 'Successfully Login',
            'token' => $token
        ]);

       

    }else{
        // 4. if not return error
        return response()->json([
            'success' => false,
            'message' => 'Credential not matching with our records',
        ]);
    }

   

    }
    public function logout()
    {
        auth()->user()->token()->revoke();

        return response()->json([
            'success' => true,
            'message' => 'Logout successfully'
        ]);
    }
}



