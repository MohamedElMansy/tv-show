<?php

namespace App\Services\Auth;

use App\Http\Requests\Auth\Login\LoginRequest;
use Illuminate\Support\Facades\Auth;

class LoginService
{
    public function login(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            // Authentication successful
            return redirect('/');
        } else {
            // Authentication failed
            return back()->withErrors(['password' => 'Invalid credentials']);
        }
    }
}
