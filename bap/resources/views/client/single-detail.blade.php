@php
    $screenName  = 'Product Detail Page';
    $functionId  = 'single-detail-page';
    $description = Lang::get('global.T.description');
    $title       = Lang::get('global.T.title');
    $keywords    = Lang::get('global.T.keywords');
    $image       = '/assets/img/apple-icon.png';
    $canonical   = config('app.url').'/single-detail';
@endphp
@extends('client.layouts.app')
@section('content')
    <!-- Open Content -->
    @include('client.layouts.content.single-detail.container-card')
    <!-- Close Content -->
@endsection
