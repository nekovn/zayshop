<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Services\Admin\Auth\LoginService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use function redirect;
use function request;
use function view;

/**
 * ログイン画面のコントローラー
 */
class LoginController extends Controller
{
    use AuthenticatesMembersTrait;

    protected $redirectTo = RouteServiceProvider::MEMBER_HOME;
    protected $loginService;

    public function __construct(LoginService $loginService)
    {
        $this->loginService = $loginService;
        $this->middleware('guest')->except('logout');
    }

    /**
     * 使用するguardを指定する
     * @return void
     */

    protected function guard()
    {
        return Auth::guard('member');
    }

    /**
     * ログイン画面を表示する。
     * @access protected
     * @return string View名
     */

    protected function showLoginForm(): string
    {
        return view('admin.login');
    }


    /**
     * デフォルトでLaravelはemailフィールドを認証に利用します。
     * これをカスタマイズしたい場合は、LoginControllerでusernameメソッドを定義してください。
     * 現在認証されているユーザーの取得
     * $user = Auth::user();
     * @access public
     * @return string
     */

    public function username()
    {
        $email = request()->input('email');
        $field = 'email';
        request()->merge([$field => $email, 'is_login_prohibited' => 0, 'is_locked' => 0]);

        return $field;
    }

    /**
     * ログインを実行する。
     * （Attempt to log the user into the application.）
     * @access protected
     * @param \Illuminate\Http\Request $request リクエスト
     * @return bool
     */

    protected function attemptLogin(Request $request)
    {
        $auth = $this->loginService->login($request);
        return $auth;
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        Auth::guard('member')->logout();
        return redirect()->route('admin.login');

    }

    /**
     * ログイン失敗メッセージ
     */

    protected function sendFailedLoginResponse(Request $request)
    {
        throw ValidationException::withMessages([$this->username() => 'アカウントがロックされています。システム管理者にお問い合わせ下さい。']);

    }

}
