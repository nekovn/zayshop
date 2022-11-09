<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="description" content="{{$description}}">
<meta name="locale" content="vi_VN">
<meta http-equiv="Content-Language" content="vi">
<meta name="title" content="{{$title}}">
<meta name="keywords" content="{{$keywords}}">
<meta name="site_name" content="{{$screenName}}">
<meta name="image" content="{{asset($image)}}">
<meta name="type" content="article">
<meta name="url" content="{{config('app.url')}}">
<meta name="theme-color" content="#ffffff">

<meta property="og:locale" content="vi_VN">
<meta property="og:title" content="{{$title}}">
<meta property="og:description" content="{{$description}}">
<meta property="og:keywords" content="{{$keywords}}">
<meta property="og:site_name" content="{{$screenName}}">
<meta property="og:image" content="{{asset($image)}}">
<meta property="og:type" content="article">
<meta property="og:url" content="{{config('app.url')}}">
<meta property="og:image:width" content="1200">
<meta property="og:image:height" content="630">

<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:site" content="@realfavicon">
<meta name="twitter:creator" content="@realfavicon">
<meta name="twitter:title" content="{{$title}}">
<meta name="twitter:description" content="{{$description}}">
<meta name="twitter:image:src" content="{{asset($image)}}">


<title>{{config('app.name')}} - {{$screenName}}</title>
<link rel="canonical" href="{{$canonical ?? config('app.url')}}">
<link rel="apple-touch-icon" size="180x180" href="{{asset('assets/dist/img/logo.svg')}}">
<link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/dist/img/logo.svg')}}">
<link rel="icon" type="image/png" sizes="89x79" href="{{asset('assets/dist/img/logo.svg')}}">
<link rel="icon" type="image/png" sizes="89x79" href="{{asset('assets/dist/img/logo.svg')}}">
<script src="{{ asset('assets/dist/js/tabler.min.js') }}" defer></script>
<script src="{{ asset('assets/dist/js/demo.min.js') }}" defer></script>
<link href="{{ asset('assets/dist/css/demo.min.css') }}" rel="stylesheet"/>
<link href="{{ asset('assets/dist/css/tabler.min.css') }}" rel="stylesheet"/>

{{-- promise ie11対応 --}}
<script>window.Promise || document.write('<script src="//www.promisejs.org/polyfills/promise-7.0.4.min.js"><\/script>');</script>

@stack('head-style')
@stack('head-script')


