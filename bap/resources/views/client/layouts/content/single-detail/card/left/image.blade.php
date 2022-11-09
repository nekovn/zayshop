@php
    $helper= new \App\Helpers\Blade\Helper;
    $lists = [
        [
            [
                'image' => '/assets/static/photos/8c13ad59f739558c.jpg',
                'title' => 'Product Image 1'
            ],
            [
                'image' => '/assets/static/photos/8a26974ee6444acd.jpg',
                'title' => 'Product Image 2'
            ],
            [
                'image' => '/assets/static/photos/6d35d9a2bd6c63c2.jpg',
                'title' => 'Product Image 3'
            ],
            [
                'image' => '/assets/static/photos/6ab3200b14549f8a.jpg',
                'title' => 'Product Image 4'
            ],
            [
                'image' => '/assets/static/photos/3d2998219313cd37.jpg',
                'title' => 'Product Image 5'
            ],
            [
                'image' => '/assets/static/photos/1b73704b282a8ec6.jpg',
                'title' => 'Product Image 6'
            ],
        ],
    ];
@endphp
{!! $helper::getSingleDetailCardLeftSlider($lists) !!}

@push('app-script')
    <script src="{{ asset('assets/dist/libs/fslightbox/fslightbox.js') }}" defer></script>
@endpush
