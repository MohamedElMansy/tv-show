<?php

namespace App\Repositories;

use App\Enums\User\UserRoleEnum;
use App\Http\Requests\Auth\Register\RegisterRequest;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;

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

    public function get()
    {
        return $this->initateQuery()->where('role' , UserRoleEnum::USER->value)->paginate(10);
    }

    public function getById($id)
    {
        return $this->initateQuery()->where('role' , UserRoleEnum::USER->value)->find($id);
    }

    protected function initateQuery(): Builder|User
    {
        return (new User())->newModelQuery();
    }
}
