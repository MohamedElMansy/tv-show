<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\User\UserService;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{

    public function index()
    {
        //get total users count
        $count = (new UserService())->getUsersCount();
        return view('admin.home',compact('count'));
    }
}
