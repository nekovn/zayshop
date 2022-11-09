@php
    $helper= new \App\Helpers\Blade\Helper;
    $cards= [
        [
            'link'    => '#',
            'image'   => 'assets/img/feature_prod_02.jpg',
            'title'   => 'Tìm nữ ở ghép',
            'address' => '8 Lê Sát, Hòa Cường, Hòa Cường Nam, Hải Châu District, Da Nang, Vietnam',
            'price'   => '2 Triệu'
        ],
        [
            'link'    => '#',
            'image'   => 'assets/img/feature_prod_02.jpg',
            'title'   => 'Tìm nam ở ghép',
            'address' => '8 Lê Sát, Hòa Cường, Hòa Cường Nam, Hải Châu District, Da Nang, Vietnam',
            'price'   => '3 Triệu'
        ],
        [
            'link'    => 'feature_prod_01.html',
            'image'   => 'assets/img/feature_prod_02.jpg',
            'title'   => 'Tìm nữ ở ghép',
            'address' => '8 Lê Sát, Hòa Cường, Hòa Cường Nam, Hải Châu District, Da Nang, Vietnam',
            'price'   => '4 Triệu'
        ],
    ];
@endphp
{{--{!! $helper::showCardNews($cards) !!}--}}

<div class="table-responsive">
    <table class="table table-vcenter card-table">
        <thead>
        <tr>
            <th></th>
            <th>Giá mua</th>
            <th>Giá chuyển khoản</th>
            <th>Giá bán</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>USD</td>
            <td class="text-muted">23,190.00</td>
            <td class="text-muted">23,220.00</td>
            <td class="text-muted">23,500.00</td>
        </tr>
        <tr>
            <td>EUR</td>
            <td class="text-muted">23,190.00</td>
            <td class="text-muted">23,220.00</td>
            <td class="text-muted">23,500.00</td>
        </tr>
        <tr>
            <td>JPY</td>
            <td class="text-muted">23,190.00</td>
            <td class="text-muted">23,220.00</td>
            <td class="text-muted">23,500.00</td>
        </tr>
        </tbody>
    </table>
</div>

