@php
    $helper= new \App\Helpers\Blade\Helper;
    $sliders = [
        [
            'image'   => 'assets/static/photos/1b73704b282a8ec6.jpg',
            'title'   => 'Phòng trọ 15m2, đường Lê Sát, Nam Hòa Cường',
            'content' => 'Gần trường ĐH Kiến trúc, ĐH Đông Á, ĐH Ngoại ngữ, CĐ Bách Khoa, CĐ Phương Đông – Gần chợ đầu mối, siêu thị metro, lotte – Phòng khép kín, vệ sinh riêng',
            'link'    => '#',
        ],
        [
            'image'   => 'assets/static/photos/3d2998219313cd37.jpg',
            'title'   => 'CĂN HỘ CAO CẤP MỚI XÂY, 2 MẶT TIỀN QUẬN HẢI CHÂU',
            'content' => 'NộiĐập hộp căn hộ mới xây, cao cấp, giá rẻ, an toàn và tiện nghi.
                            ♡♡♡ Chỉ từ 3 tr cho phòng cơ bản, 3.5 triệu cho phòng full nội thất. Ở tối đa 2 người, không nuôi Pet.
                            Căn hộ 1 phòng ngủ và căn hộ studio.
                            Nằm ngay quận Hải Châu TTTP, 2 mặt tiền, cách đường lớn Phan Đăng Lưu 20m. Sát trường ĐH Ngoại Ngữ, CĐ Bách Khoa, ĐH Đông Á, Kiến Trúc, Duy Tân, chưa đầy 5p đi bộ, gần nhiều chợ, cơ quan nhà nước,….
                            Với cơ sở hạ tầng cao cấp, thang máy, cổng xe rộng rãi, hệ thống chống giật, báo và chữa cháy tự động, wifi tốc độ cao, camera an ninh 24/24, có người dọn dẹp khu vực chung, miễn phí giặt sấy, view thoáng đẹp.
                            Cô chủ rất nhiệt tình và dễ thương. 😉 😉 😉
                            Địa chỉ: 59 Nguyễn Khánh Toàn.
                            Call, zalo: 0933399530 Loan. dung mô tả',
            'link'    => '#',
        ],
        [
            'image'   => 'assets/static/photos/6ab3200b14549f8a.jpg',
            'title'   => 'PHÒNG TRỌ GẦN TRƯỜNG ĐH ĐÔNG Á, KIẾN TRÚC, CHỢ ĐẦU MỐi',
            'content' => 'PHÒNG TRỌ GẦN TRƯỜNG ĐH ĐÔNG Á, KIẾN TRÚC, CHỢ ĐẦU MỐI L/H: 0795612399
                            Đĩa chỉ: 56 ngô thị liễu ( ngay đường Hàn Thuyên rẻ vào)
                            Giá : 1 triệu 4
                            Có chỗ để xe rộng rãi, an toàn, có camera 24/24, giờ giấc thoải mái không chung chủ.
                            Nằm trong khu dân dư rất an ninh.
                            Đường rộng rãi thoáng mái.
                            Có khu vực bếp chung rộng rãi sạch sẽ để nấu ăn, phòng thoáng có 2 cửa sổ.
                            Có khu vực phơi đồ thoáng gió.',
            'link'    => '#',
        ],
        [
            'image'   => 'assets/static/photos/6d35d9a2bd6c63c2.jpg',
            'title'   => 'PHÒNG TRỌ GẦN TRƯỜNG ĐH ĐÔNG Á, KIẾN TRÚC, CHỢ ĐẦU MỐi',
            'content' => 'PHÒNG TRỌ GẦN TRƯỜNG ĐH ĐÔNG Á, KIẾN TRÚC, CHỢ ĐẦU MỐI L/H: 0795612399
                            Đĩa chỉ: 56 ngô thị liễu ( ngay đường Hàn Thuyên rẻ vào)
                            Giá : 1 triệu 4
                            Có chỗ để xe rộng rãi, an toàn, có camera 24/24, giờ giấc thoải mái không chung chủ.
                            Nằm trong khu dân dư rất an ninh.
                            Đường rộng rãi thoáng mái.
                            Có khu vực bếp chung rộng rãi sạch sẽ để nấu ăn, phòng thoáng có 2 cửa sổ.
                            Có khu vực phơi đồ thoáng gió.',
            'link'    => '#',
        ],
        [
            'image'   => 'assets/static/photos/8a26974ee6444acd.jpg',
            'title'   => 'PHÒNG TRỌ GẦN TRƯỜNG ĐH ĐÔNG Á, KIẾN TRÚC, CHỢ ĐẦU MỐi',
            'content' => 'PHÒNG TRỌ GẦN TRƯỜNG ĐH ĐÔNG Á, KIẾN TRÚC, CHỢ ĐẦU MỐI L/H: 0795612399
                            Đĩa chỉ: 56 ngô thị liễu ( ngay đường Hàn Thuyên rẻ vào)
                            Giá : 1 triệu 4
                            Có chỗ để xe rộng rãi, an toàn, có camera 24/24, giờ giấc thoải mái không chung chủ.
                            Nằm trong khu dân dư rất an ninh.
                            Đường rộng rãi thoáng mái.
                            Có khu vực bếp chung rộng rãi sạch sẽ để nấu ăn, phòng thoáng có 2 cửa sổ.
                            Có khu vực phơi đồ thoáng gió.',
            'link'    => '#',
        ],
    ];
@endphp
{!! $helper::showSliderInner($sliders) !!}
@push('app-style')
    <style>
        .limit-text {
            overflow: hidden;
            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-line-clamp: 3; /* number of lines to show */
            line-clamp: 3;
            -webkit-box-orient: vertical;
        }

        .hover-text:hover {
            cursor: pointer;
            color: #0b5ed7;
        }
    </style>
@endpush
