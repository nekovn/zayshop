<?php

namespace App\Http\Controllers\Requests\auth;

use Illuminate\Foundation\Http\FormRequest;
use function __;

class ContactRequest extends FormRequest
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
            'id' => 'required',
            'client' => 'required|string|max:30',
            'email' => 'required|email',
            'subject' => 'required|string|min:5|max:100',
            'textarea' => 'required|string|min:5|max:1000',
            'code' => 'required'
        ];
    }


    public function attributes()
    {
        return [
            'client' => __('global.L.contact.name'),
            'email' => __('global.L.contact.mail'),
            'subject' => __('global.L.contact.subject'),
            'textarea' => __('global.L.contact.textarea')
        ];
    }


}
