@php
    $helper= new \App\Helpers\Blade\Helper;
    $cards = [
        [
            'link'    => 'shop-single.html',
            'image'   => 'assets/img/feature_prod_02.jpg',
            'title'   => 'PHÒNG TRỌ GẦN TRƯỜNG ĐH ĐÔNG Á, KIẾN TRÚC, CHỢ ĐẦU MỐi',
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt in culpa qui officia deserunt.Sunt in culpa qui officia deserunt.',
            'address' => '8 Lê Sát, Hòa Cường, Hòa Cường Nam, Hải Châu District, Da Nang, Vietnam',
            'start'   => '5',
            'price'   => '2 Triệu'
        ],
        [
            'link'    => 'shop-single.html',
            'image'   => 'assets/img/feature_prod_02.jpg',
            'title'   => 'Phòng trọ 15m2, đường Lê Sát, Nam Hòa Cường',
            'content' => 'Nội Đập hộp căn hộ mới xây, cao cấp, giá rẻ, an toàn và tiện nghi.
                                ♡♡♡ Chỉ từ 3 tr cho phòng cơ bản, 3.5 triệu cho phòng full nội thất. Ở tối đa 2 người, không nuôi Pet.
                                Căn hộ 1 phòng ngủ và căn hộ studio.
                                Nằm ngay quận Hải Châu TTTP, 2 mặt tiền, cách đường lớn Phan Đăng Lưu 20m. Sát trường ĐH Ngoại Ngữ, CĐ Bách Khoa, ĐH Đông Á, Kiến Trúc, Duy Tân, chưa đầy 5p đi bộ, gần nhiều chợ, cơ quan nhà nước,….
                                Với cơ sở hạ tầng cao cấp, thang máy, cổng xe rộng rãi, hệ thống chống giật, báo và chữa cháy tự động, wifi tốc độ cao, camera an ninh 24/24, có người dọn dẹp khu vực chung, miễn phí giặt sấy, view thoáng đẹp.
                                Cô chủ rất nhiệt tình và dễ thương. 😉 😉 😉
                                Địa chỉ: 59 Nguyễn Khánh Toàn.
                                Call, zalo: 0933399530 Loan. dung mô tả',
            'address' => '8 Lê Sát, Hòa Cường, Hòa Cường Nam, Hải Châu District, Da Nang, Vietnam',
            'start'   => '2',
            'price'   => '3 Triệu'
        ],
        [
            'link'    => 'feature_prod_01.html',
            'image'   => 'assets/img/feature_prod_02.jpg',
            'title'   => 'CĂN HỘ CAO CẤP MỚI XÂY, 2 MẶT TIỀN QUẬN HẢI CHÂU',
            'content' => 'PHÒNG TRỌ GẦN TRƯỜNG ĐH ĐÔNG Á, KIẾN TRÚC, CHỢ ĐẦU MỐI L/H: 0795612399
                                Đĩa chỉ: 56 ngô thị liễu ( ngay đường Hàn Thuyên rẻ vào)
                                Giá : 1 triệu 4
                                Có chỗ để xe rộng rãi, an toàn, có camera 24/24, giờ giấc thoải mái không chung chủ.
                                Nằm trong khu dân dư rất an ninh.
                                Đường rộng rãi thoáng mái.
                                Có khu vực bếp chung rộng rãi sạch sẽ để nấu ăn, phòng thoáng có 2 cửa sổ.
                                Có khu vực phơi đồ thoáng gió.',
            'address' => '8 Lê Sát, Hòa Cường, Hòa Cường Nam, Hải Châu District, Da Nang, Vietnam',
            'start'   => '3',
            'price'   => '2 Triệu'
        ],
    ];
@endphp
{!! $helper::showCardRelated($cards) !!}
@push('app-style')
    <style>
        .over, .limit-text-1, .limit-text-2, .limit-text-4 {
            overflow: hidden;
            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-box-orient: vertical;
        }
        .limit-text-2 {
            -webkit-line-clamp: 2;/* number of lines to show */
            line-clamp: 2;
        }
        .limit-text-4 {
            -webkit-line-clamp: 4; /* number of lines to show */
            line-clamp: 4;
        }
        .limit-text-1 {
            -webkit-line-clamp: 2;/* number of lines to show */
            line-clamp: 2;
        }
    </style>
@endpush

