@php
    $helper = new \App\Helpers\Blade\Menu\Helper;
@endphp

<ul class="navbar-nav">
    {!! $helper::showMenu() !!}
</ul>
