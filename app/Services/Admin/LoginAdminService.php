<?php

namespace App\Services\Admin;

use App\Http\Requests\Auth\Login\LoginRequest;
use Illuminate\Support\Facades\Auth;

class LoginAdminService
{
    public function login(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            //check is user has admin role
            if ($user->isAdmin()) {
                // Authentication passed for admin
                return redirect('/admin');
            }else{
                Auth::logout();
            }
        }

        return redirect()->back()->withErrors(['password' => 'Invalid credentials']);
    }
}
