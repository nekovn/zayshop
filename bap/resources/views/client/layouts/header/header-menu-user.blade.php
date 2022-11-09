@php
    $helper= new \App\Helpers\Blade\Helper;
    $menuUser= config('app-settings-client.user-menu');
@endphp
{!! $helper::showMenuUser($menuUser); !!}
