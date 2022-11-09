@php
    $screenName  = Lang::get('global.C.forgot.head.title');
    $functionId  = 'admin-forgot';
    $description = Lang::get('global.C.forgot.head.text');
    $title       = $screenName;
    $keywords    = Lang::get('global.T.keywords').", $screenName";
    $image       = '/assets/img/apple-icon.png';
    $canonical   = config('app.url').'admin/forgot';
@endphp
@extends('client.layouts.app')
@section('content')
    @include('admin.layouts.content.forgot.form')
@endsection
