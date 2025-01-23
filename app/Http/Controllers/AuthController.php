<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
    // Register a new user
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return response()->json(['message' => 'User registered successfully'], 201);
    }

    // Login and issue a token
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        if (!Auth::attempt($request->only('email', 'password'))) {
            return response()->json(['message' => 'Invalid credentials'], 401);
        }

        $user = Auth::user();
        $token = $user->createToken('auth_token')->accessToken;

        return response()->json(['token' => $token], 200);
    }

    // Logout and revoke the token
    public function logout(Request $request)
    {
        $request->user()->token()->revoke();

        return response()->json(['message' => 'Logged out successfully'], 200);
    }

    // Redirect to the provider's OAuth2 page
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->stateless()->redirect();
    }

    // Handle the provider's callback
    public function handleProviderCallback($provider)
    {
        // Retrieve the user data from the provider
        $socialUser = Socialite::driver($provider)->stateless()->user();

        // Find or create the user in your database
        $user = User::firstOrCreate(
            ['email' => $socialUser->getEmail()],
            [
                'name' => $socialUser->getName(),
                'password' => Hash::make(uniqid()), // Random password
            ]
        );

        // Log in the user
        Auth::login($user, true);

        // Issue a token (if using Passport)
        $token = $user->createToken('auth_token')->accessToken;

        // Return a JSON response with the token
        /*
        return response()->json([
            'token' => $token,
            'user' => $user,
        ], 200);
        */
        // Redirect to the Vue3 app with the token as a query parameter
        return redirect()->away(
            'http://localhost:5173/auth/callback?token=' . $token . '&user=' . json_encode([
                'name' => $user->name,
                'email' => $user->email,
            ])
        );

    }
}
