<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * sau khi login ma quay lai login thi xu ly.
     *
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard('admin')->check()) {
            $user = Auth::guard('admin')->user();
            //ログインしたこと、まだ、認証されていない
            if($user && $user->two_factor_code) {
                return redirect()->route('admin.verify.index');
            } else {
                //認証が正常になった後、
                return redirect('admin/dashboard');
            }
        } elseif(Auth::guard('member')->check()) {
            return redirect('/');
        }
        return $next($request);
    }
}
