@php
    $helper = new \App\Helpers\Blade\Table\auth\Helper;
@endphp
@if ($items['data'])
    <ul class="pagination m-0 ms-auto" id="{{ $functionId.'-pagination' }}">
        {!! $helper::showPagination($items, $count, $per_page, $route, $sort) !!}
    </ul>
@endif
