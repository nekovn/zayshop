@php
    $contactDefine= \App\Enums\ContactDefine::getMethods();
    $helper= new \App\Helpers\Blade\Helper;
@endphp
<div class="col-lg-auto ms-lg-auto">
    <ul class="list-inline list-inline-dots mb-0">
        {!! $helper::showContact($contactDefine['contact']) !!}
    </ul>
</div>

