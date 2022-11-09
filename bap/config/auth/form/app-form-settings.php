<?php
$lang = require(resource_path('lang/vi/global.php'));

use App\Enums\CodeDefine;
use App\Helpers\Util\Helper as Util;
use Illuminate\Support\Arr;

$theadRoom = Arr::except(config('app-settings.thead.room'), ['id', 'button', 'created_at', 'updated_at', 'created_by', 'updated_by']);
$labelRoom = Util::changeKeyNameInArray($theadRoom, ['room_name' => 'room_id', 'district_name' => 'district_id', 'star_name' => 'star_id', 'hot_name' => 'hot_id', 'status_name' => 'status_id']);
$selectRoom = ['star_id' => CodeDefine::CODE_STAR, 'room_id' => CodeDefine::CODE_ROOM, 'district_id' => CodeDefine::CODE_DISTRICT, 'hot_id' => CodeDefine::CODE_HOT, 'status_id' => CodeDefine::CODE_STATUS];
$checkRoom = ['space_room_name' => CodeDefine::SPACE_ROOM, 'space_share_name' => CodeDefine::SPACE_SHARE, 'utility_room_name' => CodeDefine::UTILITY_ROOM];


$theadClient = Arr::except(config('app-settings.thead.client'), ['id', 'button', 'created_at', 'updated_at', 'created_by', 'updated_by']);
$labelClient = Util::changeKeyNameInArray($theadClient, ['room_name' => 'room_id', 'customer_type_name' => 'customer_type', 'gender_name' => 'gender', 'status_name' => 'status_id', 'delete_name' => 'deleted_id']);
$selectClient = ['customer_type' => CodeDefine::CUSTOMER_TYPE, 'gender' => CodeDefine::CODE_GENDER, 'status_id' => CodeDefine::CODE_STATUS, 'deleted_id' => CodeDefine::CODE_DELETED, 'room_id' => CodeDefine::CODE_ROOM];
//$checkClient = ['space_room_name' => CodeDefine::SPACE_ROOM, 'space_share_name' => CodeDefine::SPACE_SHARE, 'utility_room_name' => CodeDefine::UTILITY_ROOM];


return [
    'modal-open' => [
        'contact' => [
            'title' => $lang['T.body.btn.see.lang'],
            'label' => Arr::except(config('app-settings.thead.contact'), ['id', 'button']),
            'url' => 'open',
        ],
        'log' => [
            'title' => $lang['T.body.btn.see.lang'],
            'label' => Arr::except(config('app-settings.thead.log'), ['id', 'button']),
            'url' => 'open',
        ],
        'banner' => [
            'title' => $lang['T.body.btn.see.lang'],
            'label' => Arr::except(config('app-settings.thead.banner'), ['id', 'button']),
            'url' => 'open',
        ],
        'room' => [
            'title' => $lang['T.body.btn.see.lang'],
            'label' => Arr::except(config('app-settings.thead.room'), ['id', 'button']),
            'url' => 'open'
        ],
        'client' => [
            'title' => $lang['T.body.btn.see.lang'],
            'label' => Arr::except(config('app-settings.thead.client'), ['id', 'button']),
            'url' => 'open'
        ],

    ],

    'modal-sendmail' => [
        'contact' => [
            'title' => $lang['T.body.btn.send_mail.lang'],
            'label' => Arr::except(config('app-settings.thead.contact'), ['id', 'status_name', 'contacted_at', 'replied_at', 'replied_by', 'replied_content']),
            'submitBtn' => $lang['B.send'],
            'textarea' => ['textarea'],
            'hidden' => ['id', 'client', 'subject', 'email', 'code'],
            'url' => 'sendmail'
        ]
    ],

    'modal-edit' => [
        'banner' => [
            'title' => $lang['T.body.btn.edit.lang'],
            'label' => Arr::except(config('app-settings.thead.banner'), ['id', 'button']),
            'submitBtn' => $lang['M.b.send'],
            'text' => ['title'],
            'image' => ['image'],
            'hidden' => ['id'],
            'url' => 'open.edit'
        ],
        'room' => [
            'title' => $lang['T.body.btn.edit.lang'],
            'label' =>  $labelRoom,
            'submitBtn' => $lang['M.b.send'],
            'text' => ['title', 'description', 'address', 'price', 'acreage', 'point'],
            'checkbox' => $checkRoom,
            'select' => $selectRoom,
            'multiple_image' => ['image_name'],
            'hidden' => ['id'],
            'url' => 'edit'
        ],
        'client' => [
            'title' => $lang['T.body.btn.edit.lang'],
            'label' =>  $labelClient,
            'submitBtn' => $lang['M.b.send'],
            'text' => ['full_name', 'phone', 'address', 'remark_name', 'email', 'user_name', 'password'],
            'date' => ['birthday_year'],
            'select' => $selectClient,
            'multiple_image' => ['image_name'],
            'hidden' => ['id'],
            'url' => 'edit'
        ],

    ],

    'modal-create' => [
        'banner' => [
            'title' => $lang['B.create'],
            'label' => Arr::only(config('app-settings.thead.banner'), ['title', 'image']),
            'submitBtn' => $lang['M.b.send'],
            'text' => ['title'],
            'image' => ['image'],
            'hidden' => [],
            'url' => 'create'
        ],
        'room' => [
            'title' => $lang['B.create'],
            'label' => $labelRoom,
            'submitBtn' => $lang['M.b.send'],
            'text' => ['title', 'description', 'address', 'price', 'acreage', 'point'],
            'checkbox' => $checkRoom,
            'select' => $selectRoom,
            'multiple_image' => ['image_name'],
            'hidden' => [],
            'url' => 'create'
        ],
        'client' => [
            'title' => $lang['B.create'],
            'label' => $labelClient,
            'submitBtn' => $lang['M.b.send'],
            'text' => ['full_name', 'phone', 'address', 'remark_name', 'email', 'user_name', 'password'],
            'date' => ['birthday_year'],
            'select' => $selectClient,
            'multiple_image' => ['image_name'],
            'hidden' => [],
            'url' => 'create'
        ],
    ]
];
