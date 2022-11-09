<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Helpers\Util\SystemHelper;
use App\Http\Controllers\Controller;
use App\Models\LogInfo;
use App\Models\User;
use App\Notifications\Admin\TwoFactorCode;
use App\Providers\RouteServiceProvider;
use App\Services\Admin\Auth\LoginService;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Lang;
use Illuminate\Validation\ValidationException;

/**
 * ログイン画面のコントローラー
 */
class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = RouteServiceProvider::ADMIN_HOME;
    protected $loginService;

    protected $maxAttempts = 5;
    protected $decayMinutes = 5; //ロック時間: 5分
    protected $screen;

    public function __construct(LoginService $loginService)
    {
        $this->loginService = $loginService;
        //Authentication 定義する、logout抜き
        $this->middleware('guest:admin')->except('logout');
        $this->screen = 'admin.login';
    }

    /**
     * AuthenticatesUsersの中に設定がある
     * 使用するguardを指定する。
     * @return \Illuminate\Contracts\Auth\Guard|\Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard('admin');
    }

    /**
     * ログインフォーム
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    protected function showLoginForm()
    {
        $fields = ['code', 'current_password', 'remember'];
        return view('admin.auth.login', ['fields' => $fields]);
    }

    /**
     * ログイン認証で使用するユーザーIDのカラム名を指定する。
     * @return string
     */
    public function username()
    {
        return 'code';
    }

    /**
     * ログインを実行する。
     * @param Request $request
     * @return mixed
     */
    protected function attemptLogin(Request $request)
    {
        return $this->loginService->login($request);
    }

    /**
     * ログアウトの処理を行う。
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout(Request $request)
    {
        $request->session()->flush();
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }

    /**
     * Khi dang nhap sai qua so lan quy dinh thi lock ip
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
     * @param Request $request
     * @return mixed
     * @throws ValidationException
     */
    protected function sendFailedLoginResponse(Request $request)
    {
        throw ValidationException::withMessages([SystemHelper::getMessage('messages.E.login.fail')]);
    }

    /**
     * Xac thuc ma 2 lan (Two Factor)
     * @param Request $request
     * @param $user
     * @return void
     */
    protected function authenticated(Request $request, $user)
    {
        try {
            $user->generateTwoFactorCode();
//            $user->notify(new TwoFactorCode());
        } catch (\Exception $exception) {
            //ログ記録
            $model = new LogInfo();
            $model->createLog(['message' => $exception->getMessage(), 'code' => $exception->getCode()], __METHOD__, __LINE__, $this->screen);
            //ログアウト
            Auth::guard('admin')->logout();
            //認証コードがnullにする
            $user->resetTwoFactorCode();
            //エラーメッセージ発生
            return redirect('admin/login')->withErrors(Lang::get('messages.E.system.error'));
        }

    }


}
