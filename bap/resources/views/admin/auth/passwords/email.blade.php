@php
    $screenName  = Lang::get('global.C.forgot.head.title');
    $functionId  = 'forgot-page';
    $description = Lang::get('global.C.forgot.head.text');
    $title       = $screenName;
    $keywords    = Lang::get('global.T.keywords').", $screenName";
    $image       = '/assets/img/apple-icon.png';
    $canonical   = config('app.url').'/password/reset';
@endphp
@extends('client.layouts.app')
@section('content')
    @include('client.layouts.content.forgot.form')
@endsection
