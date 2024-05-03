<?php

namespace App\Services\User;

use App\Repositories\UserRepository;

class UserService
{
    protected $userRepository;
    public function __construct()
    {
        $this->userRepository= new UserRepository();
    }

    public function getUsers()
    {
        return $this->userRepository->get();
    }

    public function getUsersCount()
    {
        return $this->userRepository->get()->total();
    }

    public function getUserById($id)
    {
        return $this->userRepository->getById($id);
    }
}
