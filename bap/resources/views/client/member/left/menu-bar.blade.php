@php
    $helper = new \App\Helpers\Blade\Menu\Helper;
    $note = ['pay' => 'tháng 8', 'history' => '10', 'notify' => '130'];
@endphp
{!! $helper::showMenuMember($note) !!}
