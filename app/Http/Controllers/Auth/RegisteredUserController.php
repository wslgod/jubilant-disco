<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisteredUserController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:120'],
            'email' => ['required', 'email', 'max:120', 'unique:users,email'],
            'password' => ['required', 'min:8', 'confirmed'],
        ]);

        $user = User::create([
            ...$validated,
            'password' => Hash::make($validated['password']),
            'role' => 'student',
            'status' => true,
        ]);

        Auth::login($user);

        return redirect()->route('dashboard');
    }
}
