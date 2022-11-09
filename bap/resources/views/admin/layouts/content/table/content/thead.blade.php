@php
    $helper = new \App\Helpers\Blade\Table\auth\Helper;
    $items = config("app-settings-admin.thead.$thead");
@endphp
<thead>
<tr>{!!  $helper::showThead($items) !!}</tr>
</thead>
