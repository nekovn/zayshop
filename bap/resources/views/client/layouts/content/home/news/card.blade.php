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
{{--<div class="row">--}}
{{--    <div class="col-md-4">--}}
{{--        <img src="{{ asset('assets/static/photos/de6d0fd1feebb6a2.jpg') }}" class="w-100 h-50 object-cover" alt="Card side image">--}}
{{--    </div>--}}
{{--    <div class="col-md-8">--}}
{{--        <a class="nav-link" href="#" title="#"><h3>Làm mẹ ở tuổi đôi mươi, 2 hot girl Sài thành vẫn giữ nguyên gu mặc khoe hình thể</h3></a>--}}
{{--        <p class="text-muted limit-text">Ngày 8/7, Uỷ ban Chứng khoán Nhà nước đã có báo cáo kết quả phát hành cổ--}}
{{--            phiếu để trả cổ tức 2021 của Công ty Cổ phần Dược – Thiết bị y tế Đà Nẵng (Dapharco).--}}
{{--            Theo đó, lượng cổ phiếu Công ty phát hành thành công--}}
{{--        </p>--}}
{{--    </div>--}}
{{--</div>--}}
<div class="col-md-12">
    <div class="card">
        <div class="card-body">
            <div class="row row-cards">
                <div class="carousel slide carousel-fade col-md-4" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <a class="nav-link" href="#">
                                <img class="d-block w-100 h-25" alt="TÌM BẠN NAM Ở GHÉP"
                                     src="{{ asset('assets/static/photos/a159fb2bff29fda4.jpg')}}">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="ribbon ribbon-top bg-blue">News</div>
                    <div class="card-header">
                        <a class="nav-link" href="#">
                            <h3 class="card-title">Tượng đài Cảnh sát giao thông và PCCC ở công viên Thống Nhất gây tranh cãi</h3>
                        </a>
                    </div>
                    <div class="list-group-item">
                        <div class="row align-items-center">
                            <div class="col-auto limit-text">
                                Cụm tượng đài CSGT và PCCC vẫn đang trong quá trình hoàn hiện nhưng đã xuất hiện nhiều luồng tranh cãi.
                                Cụm tượng đài CSGT và PCCC vẫn đang trong quá trình hoàn hiện nhưng đã xuất hiện nhiều luồng tranh cãi.
                                Cụm tượng đài CSGT và PCCC vẫn đang trong quá trình hoàn hiện nhưng đã xuất hiện nhiều luồng tranh cãi.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row row-cards">
                <div class="carousel slide carousel-fade col-md-4" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <a class="nav-link" href="#">
                                <img class="d-block w-100 h-25" alt="TÌM BẠN NAM Ở GHÉP"
                                     src="{{ asset('assets/static/photos/a159fb2bff29fda4.jpg')}}" width="285" height="189">
                            </a>

                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card-header">
                        <a class="nav-link" href="#">
                            <h3 class="card-title">Sao nữ bỏ bạn trai nghèo lấy đại gia, giờ còng lưng gánh nợ gần 500 tỷ</h3>
                        </a>
                    </div>
                    <div class="list-group-item">
                        <div class="row align-items-center">
                            <div class="col-auto limit-text">
                                Tiểu tam quyết lấy đại gia giờ khốn đốn vì khoản nợ trăm tỷ thế này.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

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

    </style>
@endpush
