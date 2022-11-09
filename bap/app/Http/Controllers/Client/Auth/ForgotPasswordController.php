<?php

namespace App\Http\Controllers\Client\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ForgotPasswordController extends Controller
{

    protected $redirectTo = RouteServiceProvider::MEMBER_HOME;
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */
    use SendsPasswordResetEmails;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
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
     * Display the form to request a password reset link.
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showLinkRequestForm()
    {
        $fields = ['email'];
        return view('client.admin.passwords.email', ['fields' => $fields]);
    }

    /**
     * Get the response for a successful password reset link.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $response
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */

    protected function sendResetLinkResponse(Request $request, $response)
    {
        return $request->wantsJson()
            ? new JsonResponse(['message' => trans($response)], 200)
            : redirect()->route('client.login')->with('success', 'Bạn vui lòng kiểm tra email để thực hiện quá trình quên mật khẩu.');
    }
}
