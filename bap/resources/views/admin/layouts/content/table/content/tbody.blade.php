@php
    $helper = new \App\Helpers\Blade\Table\auth\Helper;
    $thead = config("app-settings-admin.thead.$thead");
@endphp

<tbody>
@if($items['data'])
{!! $helper::showTbody($items['data'], $thead) !!}
@else
<tr data-result="empty"><td></td><td class="text-muted">{{ __('global.T.body.not.content') }}</td></tr>
@endif
</tbody>
@push('app-style')
<style>
    .hidden-text {
        text-align: left;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
        width: 140px;
        display: block;
    }
    .break-word {
        word-wrap: break-word;
    }
</style>
@endpush
