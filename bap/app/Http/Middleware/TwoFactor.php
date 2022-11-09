<?php
namespace App\Http\Middleware;
use Closure;
use Illuminate\Support\Facades\Lang;

class TwoFactor
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = auth()->user();
        //ユーザー既にログインしたことと、コードが発行されたの場合は
        if (auth()->check() && $user->two_factor_code) {
            //現在の時間に比べて、以下の場合は2回目を初期化に再現する
            if ($user->two_factor_expires_at < now()) //expired
            {
                //カラムは空白に再現する
                $user->resetTwoFactorCode();
                //ログアウト
                auth()->logout();
                return redirect()->route('admin.login')->withErrors(Lang::get('messages.E.otp.expired'));
            }

            //Sau khi login xong, chuyen den xac thuc 2 buoc,
            // neu nhap url den dashboard, thi se quay lai xac thuc 2 buoc
            if (!$request->is('admin/verify*')) //prevent enless loop, otherwise send to verify
            {
                return redirect()->route('admin.verify.index');
            }
        }

        return $next($request);
    }
}
