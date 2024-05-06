<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

class RegisterUserController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        // Validate
        $validated = $request->validate([
            'first_name' => ['required', 'max:254'],
            'last_name' => ['required', 'max:254'],
            'email' => ['required', 'email', 'max:254'],
            'password' => ['required', Password::min(8)->max(254), 'confirmed'],
        ]);

        // Create the user
        $user = User::create($validated);

        // Login
        Auth::login($user);

        // Redirect
        return redirect('/');
    }
}
