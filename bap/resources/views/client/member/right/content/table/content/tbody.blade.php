@php
    $help = new \App\Helpers\Blade\Table\client\Helper;
    $items = [
        'history' => [
            [
                'title'        => 'Thanh toán tiền nhất tháng 5 -2022',
                'room'         => '507',
                'code'         => 'SM507',
                'created_date' => '2022/07/17',
                'status'       => 'success',
                'price'        => '5.678.000',
                'link'         => '#',
            ],
            [
                'title'        => 'Thanh toán tiền nhất tháng 6 -2022',
                'room'         => '500',
                'code'         => 'SM500',
                'created_date' => '2022/07/18',
                'status'       => 'warning',
                'price'        => '5.000.000',
                'link'         => '#',
            ],
            [
                'title'        => 'Thanh toán tiền nhất tháng 7 -2022',
                'room'         => '501',
                'code'         => 'SM501',
                'created_date' => '2022/07/19',
                'status'       => 'success',
                'price'        => '4.000.000',
                'link'         => '#',
            ],
            [
                'title'        => 'Thanh toán tiền nhất tháng 8 -2022',
                'room'         => '401',
                'code'         => 'SM401',
                'created_date' => '2022/06/19',
                'status'       => 'warning',
                'price'        => '4.000.000',
                'link'         => '#',
            ],
        ],
        'notify' => [
            [
                'title'        => 'Vui lòng thanh toán tiền nhất tháng 8 -2022',
                'created_date' => '2022/06/19',
                'link'         => '#',
            ],
            [
                'title'        => 'Vui lòng thanh toán tiền nhất tháng 7 -2022',
                'created_date' => '2022/06/20',
                'link'         => '#',
            ],
            [
                'title'        => 'Thông báo từ quản trị viên',
                'created_date' => '2022/06/25',
                'link'         => '#',
            ],
        ],

    ];
    $textEmpty = __('global.E.data');
    $emptyData = "<tr><td class='text-muted'>$textEmpty</td></tr>";
    $xhtml = $help::showTbodyTable($thead, $items);
@endphp
<tbody>
@if($errors->has('exception')) cac @endif
@if ($xhtml) {!! $xhtml !!} @else {!! $emptyData !!} @endif
</tbody>
