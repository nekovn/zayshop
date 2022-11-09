<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('admin.layouts.header.header-tag')
    <link href="{{ mix('/css/app.css') }}" rel="stylesheet" />
    <script src="{{ mix('/js/app.js') }}" defer></script>
    @inertiaHead
</head>

<body>
@inertia
{{--<div class="page" id="{{isset($functionId)? $functionId: 'app'}}">--}}
{{--    @include('loader.index')--}}
{{--    @include('admin.layouts.navbar.index')--}}
{{--    <div class="page-wrapper">--}}
{{--        @yield('content')--}}
{{--        @include('client.layouts.footer.footer')--}}
{{--    </div>--}}
{{--</div>--}}
{{--@yield('modal')--}}
{{-- 共通モジュールより後にloadしたい --}}
{{--@stack('app-script')--}}
{{--@stack('app-style')--}}
</body>
</html>
