@php
    $helper = new \App\Helpers\Blade\Helper;
    $lists= config('app-settings-client.about-service');
@endphp
<div class="row">
    {!! $helper::getElementAboutService($lists) !!}
</div>
