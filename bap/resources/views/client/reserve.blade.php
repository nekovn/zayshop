@php
    $screenName  = Lang::get('global.C.reserve.head.title');
    $functionId  = 'login-page';
    $description = Lang::get('global.C.reserve.head.text');
    $title       = $screenName;
    $keywords    = Lang::get('global.T.keywords').", $screenName";
    $image       = '/assets/img/apple-icon.png';
    $canonical   = config('app.url').'/reserve';
@endphp
@extends('client.layouts.app')
@section('content')
    @include('client.layouts.content.reserve.title')
    @include('client.layouts.content.reserve.form')
@endsection
