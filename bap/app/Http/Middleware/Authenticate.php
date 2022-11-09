<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        //$request->expectsJson() : xem request gui len co phai la AJAX hoac la không phải PJAX, và accept bất cứ Content-Type nào hay ko
        // kiểm tra xem client có yêu cầu JSON hay không, neu ko co thi moi thuc hien
        if (! $request->expectsJson()) {
            if ($request->is('admin/*')) {
                return route('admin.login');
            }
            return route('admin.login');
            //フェーズ１：ログイン画面なし
            // return route('member.info');
        }
    }
}
