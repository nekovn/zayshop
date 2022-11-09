<?php

namespace App\Http\Controllers\Client\Auth;

use App\Models\CustomerBehavior;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

trait AuthenticatesMembersTrait
{
    use AuthenticatesUsers;

    /**
     * ログイン時処理
     *
     * @param Request $request
     * @param [type] $client
     * @return void
     */

    protected function authenticated(Request $request, $member)
    {
        CustomerBehavior::putBehavior([
            'customer_id' => $member->id,
            'useragent' => $request->userAgent(),
            'last_logined_at' => Carbon::now(),
            'logined_ip' => $request->ip()
        ]);
    }

    /**
     * ログイン後の遷移先
     * @return void
     */

    protected function redirectTo()
    {
        return route('client.home');
    }
}
