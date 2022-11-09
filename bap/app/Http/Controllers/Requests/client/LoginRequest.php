<?php

namespace App\Http\Controllers\Requests\client;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    /**
     * 認証設定
     * 画面に参照権限を設ける場合に使用。
     * これを使用しない場合はtrueを固定で返してください
     * @return boolean
     */
    public function authorize()
    {
        return true;
    }

    /**
     * 【必須】
     * バリデーションルール
     * @return void
     */

    public function rules()
    {
        return [
            'email' => 'required|email',
            'password' => 'required'
        ];
    }

}
