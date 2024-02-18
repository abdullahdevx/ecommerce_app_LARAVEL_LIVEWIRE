<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class authApiController extends Controller
{
    //Controller for register and Login using sanctum Tokens
    public function registerUser(Request $request)
    {
        $validated = $request->validate(
            [
                'name' => 'required|string',
                'email' => 'required|string',
                'password' => 'required|string',
            ]
            );
            $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']),
            ]);

            $sanctumToken = $user->createToken('userToken')->plainTextToken;

            $response = [
                'user' => $user,
                'token' => $sanctumToken,
            ];

            return response($response, 201);
    }

    public function login(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'password' => 'required',
        ]);

        $credientials = $request->only('name', 'password');

        if(Auth::attempt($credientials))
        {
            $user = Auth::user();
            $sanctumToken = $user->createToken('userToken')->plainTextToken;

            $response = [
                'user' => $user,
                'token' => $sanctumToken,
             ];
            return response()->json($response, 200);
        }
        else
        {
            $response = ['status' => 'Invalid Credientials'];
            return response($response, 401);
        }
        }


    public function logout(Request $request)
    {
        auth()->user()->tokens()->delete();
        return [
            'message' => 'Logged Out',
        ];
    }
}