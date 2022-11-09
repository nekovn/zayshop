@php
    $helper = new \App\Helpers\Blade\Table\auth\Helper;
    $filterStatus = config('app-settings-admin.filterStatus');
    $listButton = config('app-settings-admin.listButton');
    $sortData = config('app-settings-admin.sortData');
@endphp

<div class='col-xl-6'>
    <div class='row text-muted'>
        {!! $helper::showFilterStatus($filterStatus, $statusBtn, $functionId) !!}
        {!! $helper::showShortData($sortData, $functionId) !!}
        {!! $helper::showListButton($listButton, $functionId, $acceptBtn) !!}
    </div>
</div>
