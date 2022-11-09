<?php

namespace App\Models;

use App\Enums\DefaultDefine;
use App\Notifications\Admin\TwoFactorCode;
use Illuminate\Auth\MustVerifyEmail;
use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements CanResetPassword
{
    use BaseModelTrait;
    use AuthenticationModelTrait;
    use MustVerifyEmail, Notifiable;


    protected $guarded = ['created_at', 'updated_at'];

    protected $hidden = ['password', 'remember_token'];

    protected $casts = ['email_verified_at' => 'datetime', 'two_factor_expires_at' => 'datetime'];


    public function sendEmailTwoFactorNotification()
    {
        $this->notify(new TwoFactorCode());
    }

    public function generateTwoFactorCode()
    {
        $this->timestamps = false;
        $this->two_factor_code = rand(100000, 999999);
        $this->two_factor_expires_at = now()->addMinutes(DefaultDefine::EXPIRE);
        $this->save();
    }

    /**
     * ２回目認証を初期化に再現する
     * @return void
     */
    public function resetTwoFactorCode()
    {
        $this->timestamps = false;
        $this->two_factor_code = null;
        $this->two_factor_expires_at = null;
        $this->save();
    }

}
