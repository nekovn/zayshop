<?php

namespace App\Http\Controllers\Requests\auth;

use App\Enums\CodeDefine;
use App\Http\Controllers\Requests\Pass;
use App\Rules\PasswordPolicy;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CustomerRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        if ($this->input('id')) {
            $rules = [];
        } else {
            //新規登録
            $rules = [
                'image' => 'required|array',
            ];
        }

        $default = [
            'customer_type' => 'required|numeric',
            'gender' => 'required|numeric',
            'full_name' => 'required|string|min:5|max:50',
            'phone' => 'string|min:10|max:12',
            'address' => 'required|string|min:5|max:200',
            'remark' => 'nullable',
            'birthday_year' => 'required|date',
            'email' => [
                'nullable',
                'email',
                 Rule::unique('customers')->where('deleted_id', CodeDefine::INACTIVE_VALUE)
            ],
            'user_name' => [
                'required',
                 Rule::unique('customers')->where('deleted_id', CodeDefine::INACTIVE_VALUE),
                'min:3',
                'max:10',
            ],
            'status_id' => 'required|numeric',
            'deleted_id' => 'required|numeric',
            'room_id' => 'nullable|numeric',
            'password' => [
                new PasswordPolicy()
            ]
        ];

        return array_merge($rules, $default);
    }

    public function attributes()
    {
        return [
            'customer_type_name' => __('global.T.client.type'),
            'remark' => __('global.T.remark'),
            'deleted_id' => __('global.T.deleted'),
            'room_id' => __('global.T.room.code'),
            'image' => __('global.T.image'),
            'old_image' => __('global.T.old.image'),
            'status_id' => __('global.T.status'),
        ];
    }


}
