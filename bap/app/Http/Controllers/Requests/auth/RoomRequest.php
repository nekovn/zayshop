<?php

namespace App\Http\Controllers\Requests\auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RoomRequest extends FormRequest
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
        if ($this->input('id')) {
            $title = $this->input('title');
            $rules = [
                'id' => 'required',
                'title' => [
                    'required',
                    'string',
                    'min:5',
                    'max:200',
                    Rule::unique('room')->ignore($this->id)
                    ->where(function ($query) use ($title) {
                        return $query->where('title', $title);
                    })
                ],
                'image' => 'required_without:old_image|array|image|mimes:jpeg,png,jpg|max:1024',
                'old_image' => 'required|array',
            ];
        } else {
            //新規登録
            $rules = [
                'title' => 'required|string|unique:room,title|min:5|max:200',
                'image' => 'required|array',
            ];
        }

        $default = [
            'description' => 'required|string|min:5|max:200',
            'address' => 'required|string|min:5|max:200',
            'price' => 'required|string|min:5|max:200',
            'acreage' => 'required|string|min:5|max:200',
            'point' => 'string|min:5|max:200',
            'space_room_name' => 'required|array',
            'space_share_name' => 'required|array',
            'utility_room_name' => 'required|array',
            'room_id' => 'required|numeric',
            'district_id' => 'required|numeric',
            'star_id' => 'required|numeric',
            'hot_id' => 'required|numeric',
            'status_id' => 'required|numeric',
        ];

        return array_merge($rules, $default);
    }

    public function attributes()
    {
        return [
            'title' => __('global.T.title.name'),
            'description' => __('global.T.description.name'),
            'address' => __('global.T.address'),
            'price' => __('global.T.price'),
            'acreage' => __('global.T.acreage'),
            'point' => __('global.T.point'),
            'space_room_name' => __('global.T.space_room'),
            'space_share_name' => __('global.T.space_share'),
            'utility_room_name' => __('global.T.utilities'),
            'star_id' => __('global.T.start'),
            'room_id' => __('global.T.room.code'),
            'district_id' => __('global.T.district'),
            'image' => __('global.T.image'),
            'old_image' => __('global.T.old.image'),
            'hot_id' => __('global.T.hot'),
            'status_id' => __('global.T.status'),
        ];
    }

}
