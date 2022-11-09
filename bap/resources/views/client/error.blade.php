@php
    $screenName  = 'Trang Lỗi';
    $functionId  = 'alert-page';
    $description = Lang::get('global.T.description');
    $title       = Lang::get('global.T.title');
    $keywords    = Lang::get('global.T.keywords');
    $image       = '/assets/img/apple-icon.png';
    $canonical   = config('app.url').'alert';
@endphp
@extends('client.layouts.app')
@section('content')
    @include('client.layouts.content.error.index')
@endsection




