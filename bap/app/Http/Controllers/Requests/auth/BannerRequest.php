<?php

namespace App\Http\Controllers\Requests\auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
class BannerRequest extends FormRequest
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
     *【必須】
     * バリデーションルール
     * @return string[]
     */
    public function rules()
    {
        //編集
        if($this->input('id')) {
            $title = $this->input('title');
            $rules = [
                'id'        => 'required',
                'title'     => [
                                'required',
                                'string',
                                'min:5',
                                'max:200',
                                Rule::unique('banner')->ignore($this->id)
                                ->where(function($query) use($title) {
                                    return $query->where('title', $title);
                                })
                ],
                'image'     => 'required_without:old_image|image|mimes:jpeg,png,jpg|max:1024',
                'old_image' => 'required',
            ];
        } else {
            //新規登録
            $rules = [
                'title' => 'required|string|unique:banner,title|min:5|max:200',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:1024',
            ];
        }
        return $rules;
    }

    public function attributes()
    {
        return [
            'title' => __('global.L.contact.subject'),
            'image' => __('global.T.banner.image'),
        ];
    }



}
