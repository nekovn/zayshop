@php
    $screenName  = 'Trang Chủ';
    $functionId  = 'home-page';
    $description = Lang::get('global.T.description');
    $title       = Lang::get('global.T.title');
    $keywords    = Lang::get('global.T.keywords');
    $image       = '/assets/img/apple-icon.png';
    $canonical   = config('app.url');
@endphp
@extends('client.layouts.app')
@section('banner')
    @include('client.layouts.slider.home.slider-banner')
@endsection
@section('featured-product')
    @include('client.layouts.content.home.featured-product')
@endsection
@section('content')
    @include('client.layouts.content.home.interest-product')
@endsection
@section('fast-news')
    @include('client.layouts.content.home.fast-news')
@endsection




