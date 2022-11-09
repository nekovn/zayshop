@php
    $screenName  = Lang::get('global.C.two.factor');
    $functionId  = 'two-factor';
    $description = Lang::get('global.C.two.factor.text');
    $title       = $screenName;
    $keywords    = Lang::get('global.T.keywords').", $screenName";
    $image       = '/assets/img/apple-icon.png';
    $canonical   = config('app.url').'/admin/verify';
@endphp
@extends('client.layouts.app')
@section('content')
    @include('admin.layouts.content.twoFactor.form')
@endsection
