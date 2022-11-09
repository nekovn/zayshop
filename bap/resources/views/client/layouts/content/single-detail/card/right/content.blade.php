@php
    $helper= new \App\Helpers\Blade\Helper;
    $contents = [
        [
            'link'      => '#',
            'image'     => 'assets/img/feature_prod_02.jpg',
            'title'     => 'Cho thuê phòng trọ mới xây, thiết kế hiện đại, nhiều không gian xanh gần đại học Kinh Tế và cầu Trần Thị Lý',
            'address'   => 'K420/31 đường lê văn hiến, khuê mỹ, ngũ hành sơn.',
            'price'     => '2 Triệu',
            'area'      => '25m2',
            'district'  => 'Khuê Mỹ',
            'code'      => '23612',
            'description' => 'Vị trí thuận lợi, cách chợ Khuê Mỹ 500m, bệnh viện 600 giường 250m, cầu Tiên Sơn 1.4km, đại học Kinh tế 2.2km,… ',
            'point' => 'Nhà 3 tầng gồm các phòng chưa nội thất và nội thất cơ bản, ko ở chung chủ.',
            'space_room' => [
                'Có nhà vệ sinh khép kín hiện đại trang bị toilet, bồn rửa mặt, vòi sen, gương, kệ, bình nóng lạnh.',
                'Mặt tiền, có ban công đón gió.',
                'Nhà vệ sinh khép kín lắp đặt thiết bị hiện đại.',
                'Nội thất cơ bản gồm gường King Size, tủ lớn áp tường, và kệ bếp cao cấp.',
            ],
            'space_share' => [
                'Sân thượng thoáng mát, có chỗ phơi đồ.',
                'Sân trước rộng rãi, trồng nhiều cây xanh.',
                'Chỗ để xe máy trong nhà.',
                'Phòng khách rộng rãi có ghế sofa.',
                'Hành lang rộng, có hệ thống đèn cảm ứng và giếng trời thông thoáng.',
            ],
            'price_content' => [
                'Phòng chưa nội thất: 2.3 – 2.8TR/tháng tùy vị trí và diện tích phòng.',
                'Phòng nội thất: 3.5TR/tháng.',
            ],
            'utilities' => [
                'Miễn phí wifi. Điện nước theo giá đồng hồ điện từng phòng.',
                'Cọc 1 tháng. Trả theo tháng.',
            ],
            'contact' => [
                'fa-user'            => 'Nguyen Quang Vinh',
                'fa-envelope-square' => '0978786988',
                'fa-phone-alt'       => 'phambaonguyendn@gmail.com',
            ],
            'start'=> '1'
        ],
    ];
@endphp
{!! $helper::getDetailCardRightContent($contents) !!}
