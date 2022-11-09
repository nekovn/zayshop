<?php

namespace App\Http\Controllers\Client\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */
    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::MEMBER_HOME;


    public function __construct()
    {
        $this->middleware('guest:member');
    }

    /**
     * Get the broker to be used during password reset.
     * ResetsPasswordsの中に設定がある
     * broker('member'): config/admin.php -> passwords -> member
     * @return \Illuminate\Contracts\Auth\PasswordBroker
     */

    protected function broker()
    {
        return Password::broker('member');
    }

    /**
     * パスワード再発行が正常になってから、$redirectToするので、guardを設定する
     * @return \Illuminate\Contracts\Auth\Guard|\Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard('member');
    }


    /**
     * Display the password reset view for the given token.
     *
     * If no token is present, display the link request form.
     * duoc gui tu email trong file PasswordResetNotification
     * @param  \Illuminate\Http\Request  $request
     * @param  string|null  $token
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function showResetForm(Request $request, $token = null)
    {
        $fields = ['new_password', 'password_confirmation'];
        return view('client.admin.passwords.reset', [
            'fields' => $fields
        ])->with(
            ['token' => $token, 'email' => $request->email]
        );
    }

    protected function setUserPassword($user, $password)
    {
        $user->password = $password;
    }


}
