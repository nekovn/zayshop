<?php
$lang = require(resource_path('lang/vi/global.php'));
return [
    'tbodyBtn' => [
        'contact' => [
            'default' => [
                'lang' => $lang['T.body.btn.see.lang'],
                'type' => 'see',
            ],
            'send_mail' => [
                'lang' => $lang['T.body.btn.send_mail.lang'],
                'type' => 'sendmail',
            ],
        ],
        'log' => [
            'default' => [
                'lang' => $lang['T.body.btn.see.lang'],
                'type' => 'see',
            ],
        ],
        'banner' => [
            'default' => [
                'lang' => $lang['T.body.btn.see.lang'],
                'type' => 'see',
            ],
            'edit' => [
                'lang' => $lang['T.body.btn.edit.lang'],
                'type' => 'edit',
            ],
        ],
        'room' => [
            'default' => [
                'lang' => $lang['T.body.btn.see.lang'],
                'type' => 'see',
            ],
            'edit' => [
                'lang' => $lang['T.body.btn.edit.lang'],
                'type' => 'edit',
            ],
        ],
        'client' => [
            'default' => [
                'lang' => $lang['T.body.btn.see.lang'],
                'type' => 'see',
            ],
            'edit' => [
                'lang' => $lang['T.body.btn.edit.lang'],
                'type' => 'edit',
            ],
        ],

    ],
    'filterShowRow' => [
        10 => '10',
        20 => '20',
        30 => '30',
        40 => '40'
    ],
    'filterStatus' => [
        'get-status' => [
            'text' => $lang['S.not.replied.text'],
            'number' => '0',
        ],
    ],
    'listButton' => [
        'reload' => [
            'text' => $lang['F.reload.data'],
            'class' => 'bg-cyan'
        ],
        'change-status' => [
            'text' => $lang['F.change.status'],
            'class' => 'bg-azure'
        ],
        'delete' => [
            'text' => $lang['F.delete.data'],
            'class' => 'bg-red'
        ],
    ],
    'sortData' => [
        'default' => $lang['S.data.default'],
        'asc' => $lang['S.data.asc'],
        'desc' => $lang['S.data.desc'],
    ],
    'admin-menu' => [
    [
        'link' => '',
        'text' => $lang['M.menu.home'],
        'icon' => 'Home',
    ],
    [
        'link' => 'dashboard',
        'text' => 'Bảng điều khiển',
        'icon' => 'Dashboard',
    ],
    [
        'link' => 'client',
        'text' => 'Khách hàng',
        'icon' => 'Client',
    ],
    [
        'link' => 'admin',
        'text' => 'Quản lý',
        'icon' => 'Admin',
    ],
    [
        'link' => 'room',
        'text' => 'Phòng trọ',
        'icon' => 'Room',
    ],
    [
        'link' => 'invoices',
        'text' => 'Đã thanh toán',
        'icon' => 'Invoices',
    ],
    [
        'link' => 'waiting',
        'text' => 'Đang chờ duyệt',
        'icon' => 'Waiting',
    ],
    [
        'link' => 'contact',
        'text' => 'Liên hệ',
        'icon' => 'Contact',
    ],
    [
        'link' => 'notification',
        'text' => 'Thông báo',
        'icon' => 'Notification',
    ],
    [
        'link' => 'book-room',
        'text' => 'Đặt phòng',
        'icon' => 'BookRoom',
    ],
    [
        'link' => 'banner',
        'text' => 'Ảnh bìa',
        'icon' => 'banner',
    ],
    [
        'link' => 'news',
        'text' => 'Tin tức',
        'icon' => 'news',
    ],
    [
        'link' => 'gold',
        'text' => 'Giá vàng',
        'icon' => 'gold',
    ],
    [
        'link' => 'exchange',
        'text' => 'Tỉ giá',
        'icon' => 'exchange',
    ],
    [
        'link' => 'log',
        'text' => 'Log',
        'icon' => 'log',
    ],
    [
        'link' => 'login',
        'text' => 'Đăng xuất',
        'icon' => 'Logout',
    ],
],
];
