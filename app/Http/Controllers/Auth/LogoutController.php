<?php

namespace App\Http\Controllers\Auth;

use App\Helpers\ResponseHelper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class LogoutController extends Controller
{
    public function logout(Request $request)
    {
        try {
            Auth::logout();
            return redirect('/login');
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            return ResponseHelper::errorResponse($exception->getMessage());
        }
    }
}
