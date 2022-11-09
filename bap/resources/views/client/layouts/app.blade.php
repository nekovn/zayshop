<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('client.layouts.header.header-tag')
</head>

<body>
<div class="page" id="{{isset($functionId)? $functionId: 'app'}}">
    @include('client.layouts.header.header')
    @include('client.layouts.top.top-nav')
    <div class="page-wrapper">
        @yield('banner')
        @yield('featured-product')
        @yield('content')
        @yield('fast-news')
        @include('client.layouts.footer.footer')
    </div>

</div>
{{-- 共通モジュールより後にloadしたい --}}
@stack('app-script')
@stack('app-style')
</body>

</html>
