@php
    $screenName  = Lang::get('global.M.menu.detail');
    $functionId  = 'detail-page';
    $description = Lang::get('global.T.description');
    $title       = Lang::get('global.T.title');
    $keywords    = Lang::get('global.T.keywords');
    $image       = '/assets/img/apple-icon.png';
    $canonical   = config('app.url').'/detail';
@endphp
@extends('client.layouts.app')
@section('content')
    <!-- Start Content -->
    @include('client.layouts.content.detail.content')
    <!-- End Content -->
@endsection

