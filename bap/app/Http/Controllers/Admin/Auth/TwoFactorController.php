<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Models\LogInfo;
use App\Models\User;
use App\Notifications\Admin\TwoFactorCode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Lang;

class TwoFactorController extends Controller
{

    protected $screen;

    public function __construct()
    {
        //ログインしたこと、認証コード発行された後、
        $this->middleware(['auth:admin', 'twofactor']);
        $this->middleware('throttle:6,1')->only('store', 'resend');
        $this->screen = 'admin.twofactor';
    }

    /**
     * 画面初期表示
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $auth = Auth::guard('admin');
        try {
            if ($auth->check()) {
                if ($auth->user()->two_factor_code) {
                    $fields = ['two_factor_code'];
                    return view('admin.auth.twoFactor', ['fields' => $fields]);
                } else {
                    //認証が正常になった後、
                    return redirect('admin/dashboard');
                }
            }
        } catch (\Exception $exception) {
            //ログ記録
            $model = new LogInfo();
            $model->createLog(['message' => $exception->getMessage(), 'code' => $exception->getCode()], __METHOD__, __LINE__, $this->screen);
            //ログアウト
            Auth::guard('admin')->logout();
            //認証コードがnullにする
            $auth->user()->resetTwoFactorCode();
            //エラーメッセージ発生
            return redirect('admin/login')->withErrors(Lang::get('messages.E.system.error'));
        }
    }

    /**
     * 認証コードを確認する
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        //再確認、バリデート
        $request->validate([
            'two_factor_code' => 'integer|required'
        ]);

        $user = auth()->user();
        try {
            //通信認証コードとDBのコードを比べる
            if ($request->input('two_factor_code') === $user->two_factor_code) {
                //カラムは空白に再現する
                $user->resetTwoFactorCode();
                //Luc nay two_factor_code da la null cho nen middleware\TwoFactor next()
                return redirect()->route('admin.dashboard');
            }
            //エラーメッセージ発生
            return redirect()->back()->withErrors(Lang::get('messages.E.otp.not.match'));
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

    /**
     * 認証コードを再発行する
     * @return mixed
     */
    public function resend()
    {
        //Models/User.phpを取得する
        $user = auth()->user();
        try {
            //認証コードを再発
            $user->generateTwoFactorCode();
            //認証コードを送信する
            $user->notify(new TwoFactorCode());
            //再発行メッセージ
            return redirect()->back()->withSuccess(Lang::get('messages.E.otp.send.again'));
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
