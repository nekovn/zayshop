@php
    $help = new \App\Helpers\Blade\Table\client\Helper;
    $lists = [
        'item' =>
            [
                [
                'service'    => 'Tiền phòng',
                'util_price' => '5.000.000',
                'amount'     => '1',
                'into_money' => '5.000.000',
                'note'       => ''
                ],
                [
                    'service'    => 'Giữ xe',
                    'util_price' => '120.000',
                    'amount'     => '1',
                    'into_money' => '120.000',
                    'note'       => ''
                ],
                [
                    'service'    => 'Nước cố định',
                    'util_price' => '100.000',
                    'amount'     => '1',
                    'into_money' => '100.000',
                    'note'       => ''
                ],
                [
                    'service'    => 'Điện',
                    'util_price' => '3.500',
                    'amount'     => '88',
                    'into_money' => '308.000',
                    'note'       => ''
                ],
                [
                    'service'    => 'Tiện ích',
                    'util_price' => '150.000',
                    'amount'     => '1',
                    'into_money' => '150.000',
                    'note'       => 'Wifi + máy giặt + vệ sinh công cộng'
                ],
            ],
        'total' =>  '5.678.000'
    ];
@endphp
<tbody>
{!! $help::showTbodyInvoice($lists) !!}
</tbody>
