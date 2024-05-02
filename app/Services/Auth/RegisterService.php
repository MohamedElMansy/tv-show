<?php

namespace App\Services\Auth;

use App\Http\Requests\Auth\Register\RegisterRequest;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;

class RegisterService
{
    public function register(RegisterRequest $request)
    {
        $user = (new UserRepository())->create($request);
        Auth::login($user);
    }
}
