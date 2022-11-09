<?php
$lang = require(resource_path('lang/vi/global.php'));

/*
|--------------------------------------------------------------------------
| クライアントサイト画面デザインの共通定義を設定する。
|--------------------------------------------------------------------------
| base内(app-settings-client.php)の設定を上書きする項目を定義する。
*/

return [
    'single-detail-card-right-area'   => [
                                    'area'           => $lang['C.single-detail.card.right.area'],
                                    'district'       => $lang['C.single-detail.card.right.district'],
                                    'code'           => $lang['C.single-detail.card.right.code'],
                                   ],
    'single-detail-card-right-single-detail' => [
                                    'description'    => $lang['C.single-detail.card.right.des'],
                                    'address'        => $lang['C.single-detail.card.right.address'],
                                    'point'          => $lang['C.single-detail.card.right.point'],
                                  ],
    'single-detail-card-right-list'   => [
                                    'space_room'     => $lang['C.single-detail.card.right.space_room'],
                                    'space_share'    => $lang['C.single-detail.card.right.space_share'],
                                    'price_content'  => $lang['C.single-detail.card.right.price_content'],
                                    'utilities'      => $lang['C.single-detail.card.right.utilities'],
                                   ],
    'single-detail-card-right-contact' => [
                                    'contact'        => $lang['C.single-detail.card.right.contact'],
                                   ],
    'main-menu'                 => [
                                        [
                                            'link' => '',
                                            'text' => $lang['M.menu.home'],
                                            'icon' => 'Home',
                                        ],
                                        [
                                            'link' => 'detail',
                                            'text' => $lang['M.menu.detail'],
                                            'icon' => 'Detail',
                                        ],
                                        [
                                            'link' => 'share-house',
                                            'text' => $lang['M.menu.share-house'],
                                            'icon' => 'ShareHouse',
                                        ],
                                        [
                                            'link' => 'about',
                                            'text' => $lang['M.menu.about'],
                                            'icon' => 'About'
                                        ],
                                        [
                                            'link' => 'contact',
                                            'text' => $lang['M.menu.contact'],
                                            'icon' => 'Contact',
                                        ],
                                    ],
    'user-menu'                 =>  [
                                        [
                                            'link' => '/login',
                                            'icon' => 'Login',
                                            'text' => $lang['U.menu.login']
                                        ],
                                    ],
    'about-list'                 =>  [
                                        $lang['C.about.list.content01'],
                                        $lang['C.about.list.content02'],
                                        $lang['C.about.list.content03'],
                                     ],
    'about-policy'               =>  [
                                        $lang['C.about.policy.purpose'].
                                        $lang['C.about.policy.purpose.content01'].
                                        $lang['C.about.policy.purpose.content02'].
                                        $lang['C.about.policy.purpose.content03'].
                                        $lang['C.about.policy.purpose.content04'].
                                        $lang['C.about.policy.purpose.content05'],

                                        $lang['C.about.policy.range'].
                                        $lang['C.about.policy.range.content01'].
                                        $lang['C.about.policy.range.content02'],

                                        $lang['C.about.policy.storage'].
                                        $lang['C.about.policy.storage.content01'],

                                        $lang['C.about.policy.commit'].
                                        $lang['C.about.policy.commit.content01'].
                                        $lang['C.about.policy.commit.content02'].
                                        $lang['C.about.policy.commit.content03'],
                                      ],
    'about-service'             => [
                                        [
                                            'icon' => 'HomeInfo',
                                            'title' => $lang['A.service.home']
                                        ],
                                        [
                                            'icon' => 'HomeBuilding',
                                            'title' => $lang['A.service.building']
                                        ],
                                        [
                                            'icon' => 'HomeDola',
                                            'title' => $lang['A.service.dollar']
                                        ],
                                        [
                                            'icon' => 'HomeUser',
                                            'title' => $lang['A.service.user']
                                        ],
                                    ],
    'text-price'                => $lang['C.text.price'],
    'btn-see-new'               => $lang['C.button.see.new'],
    'btn-see-more'              => $lang['C.button.see.more'],
    'invoice-thead'             => [
                                        [
                                            'name'  => $lang['F.thead.stt'],
                                            'class' => 'text-center',
                                            'style' => 'width: 1%'
                                        ],
                                        [
                                            'name'  => $lang['F.thead.service'],
                                            'class' => '',
                                            'style' => ''
                                        ],
                                        [
                                            'name'  => $lang['F.thead.unit.price'],
                                            'class' => 'text-center',
                                            'style' => 'width: 1%'
                                        ],
                                        [
                                            'name'  => $lang['F.thead.amount'],
                                            'class' => 'text-center',
                                            'style' => 'width: 1%'
                                        ],
                                        [
                                            'name'  => $lang['F.thead.into.money'],
                                            'class' => 'text-center',
                                            'style' => 'width: 1%'
                                        ],
                                   ],
    'invoice-info-manger'       => [
                                        $lang['I.manger.address'],
                                        $lang['I.manger.name'],
                                        $lang['I.manger.sdt'],
                                        $lang['I.manger.stk01'],
                                        $lang['I.manger.bank01'],
                                        $lang['I.manger.stk02'],
                                        $lang['I.manger.bank02'],
                                        $lang['I.manger.stk03'],
                                        $lang['I.manger.bank03'],
                                   ],
    'member-menu'               => [
                                        'info'    =>  [
                                            'name'    => $lang['M.menu.info'],
                                            'route'   => 'members.info',
                                            'note'    => ''
                                        ],
                                        'account'  => [
                                            'name'   => $lang['M.menu.account'],
                                            'route'  => 'members.account',
                                            'note'   => ''
                                        ],
                                        'avatar'   => [
                                            'name'   => $lang['M.menu.avatar'],
                                            'route'  => 'members.avatar',
                                            'note'   => ''
                                        ],
                                        'room'     => [
                                            'name'  => $lang['M.menu.room'],
                                            'route' => 'members.room',
                                            'note'  => ''
                                        ],
                                        'pay'      => [
                                            'name'  => $lang['M.menu.pay'],
                                            'route' => 'members.pay',
                                            'note'  => ''
                                        ],
                                        'history'  => [
                                            'name'  => $lang['M.menu.history'],
                                            'route' => 'members.history',
                                            'note'  => ''
                                        ],
                                        'notify' =>   [
                                            'name'  => $lang['M.menu.notify'],
                                            'route' => 'members.notify',
                                            'note'  => ''
                                        ],
                                        'utility' =>  [
                                            'name'  => $lang['M.menu.utility'],
                                            'route' => 'members.utility',
                                            'note'  => ''
                                        ],
                                        'policy'  =>  [
                                            'name'  => $lang['M.menu.policy'],
                                            'route' => 'members.policy',
                                            'note'  => ''
                                        ],
                                   ],

];
