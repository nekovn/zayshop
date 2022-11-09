<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientHomeController
{
    public function home(Request $request)
    {
        $request->session()->flush();//remove all session
        Auth::guard('admin')->logout();
//        $request->session()->flush();//remove all session
//        Auth::guard('member')->logout();
        return view('client.home');
    }
}
