<?php

namespace App\Http\Controllers\Admin\User;

use App\Helpers\ResponseHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\Login\LoginRequest;
use App\Services\Admin\LoginAdminService;
use App\Services\User\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class UserAdminController extends Controller
{
    public function index()
    {
        $users = (new UserService())->getUsers();
        return view('admin.user.index',compact('users'));
    }

    public function show(Request $request)
    {
        try {
            $user = (new UserService())->getUserById($request->id);
            if ($user)
                return view('admin.user.details',compact('user'));
            else
                return view('admin.errors.not_found');
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            return ResponseHelper::errorResponse($exception->getMessage());
        }
    }
}
