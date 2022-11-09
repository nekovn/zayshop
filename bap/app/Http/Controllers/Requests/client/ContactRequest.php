<?php

namespace App\Http\Controllers\Requests\client;

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
            'client' => 'required|string|max:30',
            'email' => 'required|email',
            'tell' => 'required|regex:/\d{2,4}-?\d{2,4}-?\d{3,4}/',
            'subject' => 'required|string|min:5|max:100',
            'textarea' => 'required|string|min:5|max:1000'
        ];
    }

    public function attributes()
    {
        return [
            'client' => __('global.L.contact.name'),
            'email' => __('global.L.contact.mail'),
            'tell' => __('global.L.contact.tel'),
            'subject' => __('global.L.contact.subject'),
            'textarea' => __('global.L.contact.textarea')
        ];
    }


}
