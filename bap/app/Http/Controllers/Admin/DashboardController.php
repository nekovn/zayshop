<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController
{
    public function dashboard(Request $request)
    {
//        $request->session()->flush();//remove all session
//        Auth::guard('admin')->logout();
        return view('admin.dashboard');
    }
}
