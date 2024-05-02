<?php

namespace App\Repositories;

use App\Http\Requests\Auth\Register\RegisterRequest;
use App\Models\User;

class UserRepository
{
    public function create(RegisterRequest $request): User
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->image = $request->image;
        $user->save();

        return $user;
    }
}
