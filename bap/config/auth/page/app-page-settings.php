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
        'text' => 'B???ng ??i???u khi???n',
        'icon' => 'Dashboard',
    ],
    [
        'link' => 'client',
        'text' => 'Kh??ch h??ng',
        'icon' => 'Client',
    ],
    [
        'link' => 'admin',
        'text' => 'Qu???n l??',
        'icon' => 'Admin',
    ],
    [
        'link' => 'room',
        'text' => 'Ph??ng tr???',
        'icon' => 'Room',
    ],
    [
        'link' => 'invoices',
        'text' => '???? thanh to??n',
        'icon' => 'Invoices',
    ],
    [
        'link' => 'waiting',
        'text' => '??ang ch??? duy???t',
        'icon' => 'Waiting',
    ],
    [
        'link' => 'contact',
        'text' => 'Li??n h???',
        'icon' => 'Contact',
    ],
    [
        'link' => 'notification',
        'text' => 'Th??ng b??o',
        'icon' => 'Notification',
    ],
    [
        'link' => 'book-room',
        'text' => '?????t ph??ng',
        'icon' => 'BookRoom',
    ],
    [
        'link' => 'banner',
        'text' => '???nh b??a',
        'icon' => 'banner',
    ],
    [
        'link' => 'news',
        'text' => 'Tin t???c',
        'icon' => 'news',
    ],
    [
        'link' => 'gold',
        'text' => 'Gi?? v??ng',
        'icon' => 'gold',
    ],
    [
        'link' => 'exchange',
        'text' => 'T??? gi??',
        'icon' => 'exchange',
    ],
    [
        'link' => 'log',
        'text' => 'Log',
        'icon' => 'log',
    ],
    [
        'link' => 'login',
        'text' => '????ng xu???t',
        'icon' => 'Logout',
    ],
],
];
