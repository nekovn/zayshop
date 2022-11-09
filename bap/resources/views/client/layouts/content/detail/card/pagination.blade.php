@php
    $helper = new \App\Helpers\Blade\Helper;
    $pagination= [
        [
          'page'   => '1',
          'link'   => '#1',
          'active' => true,
        ],
        [
          'page'   => '2',
          'link'   => '#2',
          'active' => false,
        ],
        [
          'page'   => '3',
          'link'   => '#3',
          'active' => false,
        ],
        [
          'page'   => '4',
          'link'   => '#4',
          'active' => false,
        ],
    ];
@endphp
<div class="d-flex">
    <ul class="pagination ms-auto">
        {!! $helper::showElementPagination($pagination) !!}
    </ul>
</div>
