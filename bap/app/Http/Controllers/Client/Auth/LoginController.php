<?php

namespace App\Http\Controllers\Client\Auth;

use App\Helpers\Util\SystemHelper;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Services\Member\Auth\LoginService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{

    use AuthenticatesMembersTrait;

    protected $redirectTo =  RouteServiceProvider::MEMBER_HOME;

    protected $loginService;

    protected $maxAttempts = 5; //入力制限: 5回数
    protected $decayMinutes = 5; //ロック時間: 5分

    public function __construct(LoginService $loginService)
    {
        //$loginService: attemptLogin()をチェックする為に、Auth::attemptを設定する
        $this->loginService = $loginService;
        $this->middleware('guest:member')->except('logout');
    }

    /**
     * config/admin.php
     * 使用しているguardを指定する
     * @return \Illuminate\Contracts\Auth\Guard|\Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard('member');
    }


    /**
     * AuthenticatesUsersの中に設定がある
     * ログイン画面を表示する。
     * @access protected
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function showLoginForm()
    {
        $fields = ['user_name', 'current_password', 'remember'];
        return view('client.auth.login', ['fields' => $fields]);
    }

    /**
     * ログイン認証で使用するユーザーIDのカラム名を指定する。
     * AuthenticatesUsersの中に設定がある
     *
     * @return void
     */
    public function username()
    {
        $fields = 'user_name';
        //username():呼び出す時、requestの中に既存する
        request()->merge(['is_login_prohibited' => 0, 'is_locked' => 0]);
        return $fields;
    }

    /**
     * ログインを実行する。
     * AuthenticatesUsersの中に設定がある
     * false: show error , true: redirect() ->home
     * @param Request $request
     * @return bool
     */
    protected function attemptLogin(Request $request)
    {
        $auth = $this->loginService->login($request);
        return $auth;
    }

    /**
     * ログアウトの処理を行う。
     * AuthenticatesUsersの中に設定がある
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */

    public function logout(Request $request)
    {
        // config/admin.php : guards -> drivers -> sessionを設定してるので、
        $request->session()->flush();//remove all session
        Auth::guard('member')->logout();
        return redirect()->route('client.login');

    }

    /**
     * Get the throttle key for the given request.
     * 特定のIPから、入力した認証情報(emailとか、ユーザ名とか)が複数回、同じものの場合、
        IPと入力した認証情報での組み合わせでロックになります。
        なので、別の認証情報を入力すれば再度認証処理が走ります
     * 解決方法: throttleKeyをオーバーライドして、ipだけ返すようにします
     * @param  \Illuminate\Http\Request  $request
     * @return string
     */
    protected function throttleKey(Request $request)
    {
        return $request->ip();
    }

    /**
     * ログイン失敗メッセージ
     */
    protected function sendFailedLoginResponse(Request $request)
    {
        throw ValidationException::withMessages([SystemHelper::getMessage('messages.E.login.fail')]);
    }


}
