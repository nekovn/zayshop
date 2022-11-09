@php
    $screenName  = Lang::get('global.C.login.head.title');
    $functionId  = 'login-page';
    $description = Lang::get('global.C.login.head.text');
    $title       = $screenName;
    $keywords    = Lang::get('global.T.keywords').", $screenName";
    $image       = '/assets/img/apple-icon.png';
    $canonical   = config('app.url').'/admin/login';
@endphp
@extends('client.layouts.app')
@section('content')
    @include('admin.layouts.content.login.form')
@endsection
