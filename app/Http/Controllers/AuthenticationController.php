<?php

namespace App\Http\Controllers;

use App\Models\UserAccount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Symfony\Component\Console\Output\ConsoleOutput;

class AuthenticationController extends Controller
{
    public function registration(Request $request){
        $request->validate([
            'login' => 'required|unique:user_accounts,login',
            'password' => 'required|min:8',
        ]);

        $user = UserAccount::create([
            'login' => $request->login,
            'password' => Hash::make($request->password),
            'person_id' => 1
        ]);

    }

    public function login(Request $request){

        //dd("TEST");
        Log::info("Test");

        $credentials = $request->only('login', 'password');

        if(auth()->attempt($credentials)){
            $response = response()->json([
                'success' => true,
                'message' => 'Login successful',
                'user' => auth()->user()
            ], 200);
        }
        else{
            $response = response()->json([
                'success' => false,
                'message' => 'Login failed',
            ], 401);
        }
        return $response;
    }

    public function logout(Request $request){
        auth()->logout();
        return response()->json(['message' => 'Successfully logged out']);
    }
}
