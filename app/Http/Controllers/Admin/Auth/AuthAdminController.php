<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Helpers\ResponseHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\Login\LoginRequest;
use App\Services\Admin\LoginAdminService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class AuthAdminController extends Controller
{
    public function showAdminLoginForm()
    {
        return view('admin.auth.login');
    }

    public function login(LoginRequest $request)
    {
        try {
            return (new LoginAdminService())->login($request);
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            return ResponseHelper::errorResponse($exception->getMessage());
        }
    }

    public function logout()
    {
        Auth::logout();

        return redirect('/admin/login');
    }
}
