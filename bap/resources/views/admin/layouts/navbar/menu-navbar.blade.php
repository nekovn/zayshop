@php
    $helper = new \App\Helpers\Blade\Menu\Helper;
@endphp
<div class="collapse navbar-collapse" id="navbar-menu">
    <ul class="navbar-nav pt-lg-3">
        {!! $helper::showMenuAuth() !!}
    </ul>
</div>
