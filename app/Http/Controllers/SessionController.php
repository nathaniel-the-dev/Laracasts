<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    public function create()
    {
        return view("auth.login");
    }

    public function store(Request $request)
    {
        // Validate
        $validated = $request->validate([
            'email' => ['required', 'email', 'max:254'],
            'password' => ['required'],
        ]);

        // Try to login
        $isAuthenticated = Auth::attempt($validated);

        if (!$isAuthenticated) {
            throw ValidationException::withMessages([
                'email' => 'Sorry, your credentials do not match our records.',
            ]);
        }

        // Regenerate session token
        $request->session()->regenerate();

        // Redirect
        return redirect('/jobs');
    }

    public function destroy()
    {
        Auth::logout();
        return redirect('/');
    }
}
