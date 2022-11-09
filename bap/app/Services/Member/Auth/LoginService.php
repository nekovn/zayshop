<?php

namespace App\Services\Member\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;

/**
 * ログイン関連の処理をまとめたサービスクラス
 */
class LoginService
{

    public function __construct()
    {
    }

    /**
     * use AuthenticatesMembersTrait
     * AuthenticatesUsersの中に設定がある
     * ログイン処理を実行する。 (attemptLogin()から)
     * @access public
     * @return boolean true:認証成功 false:認証失敗
     */

    public function login(Request $request)
    {
        $credentials = Arr::only($request->input(), ['user_name', 'password']);
//         attempt (): tim kiem user trong ban neu hop thi tra ve true;
//         tham so t2 la remember neu la true : sẽ giữ cho người dùng đã được xác thực vô thời hạn, hoặc tới khi họ đăng xuất thủ công
//         tất nhiên, table users phải có một cột tring remember_token, cái mà sẽ được dùng để lưu token "remember me".

        return Auth::attempt($credentials, isset($request['remember']));
    }
}
