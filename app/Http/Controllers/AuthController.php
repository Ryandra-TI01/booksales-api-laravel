<?php

namespace App\Http\Controllers;

use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class AuthController extends Controller
{
    use ApiResponse;

    // Register a new user
    public function register(Request $request)
    {
        try {
            $validated = $request->validate([
                'name' => 'required|string|max:100',
                'email' => 'required|email|unique:users',
                'password' => 'required|string|min:6|confirmed',
            ]);

        } catch (ValidationException $e) {
            return $this->errorResponse('Validation Error', $e->errors(), 422);
        }

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        $token = JWTAuth::fromUser($user);

        return $this->successResponse([
            'user' => $user,
            'token' => $token,
        ], 'User registered successfully', 201);
    }

    // Login a user
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ]);

        try {
            if (!$token = auth()->guard('api')->attempt($credentials)) {
                return $this->errorResponse('Email or Password is wrong', null, 401);
            }

            return $this->successResponse([
                'user' => auth()->guard('api')->user(),
                'token' => $token,
            ], 'Login Successful', 200);

        } catch (JWTException $e) {
            return $this->errorResponse('Something went wrong, please try again', null, 500);
        }
    }

    // Logout a user
    public function logout()
    {
        try {
            auth()->guard('api')->logout();
            return $this->successResponse(null, 'User logged out successfully', 200);
        } catch (JWTException $e) {
            return $this->errorResponse('Failed to logout, token may be invalid or expired', null, 500);
        }
    }

}
