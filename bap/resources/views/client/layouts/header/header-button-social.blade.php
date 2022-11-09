@php
    $contactDefine= \App\Enums\ContactDefine::getMethods();
    $helper= new \App\Helpers\Blade\Helper;
@endphp

{!! $helper::showSocial($contactDefine['socials']) !!}
