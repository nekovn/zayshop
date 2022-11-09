@php
    $screenName  = Lang::get('global.C.reset.head.title');
    $functionId  = 'reset-password-page';
    $description = Lang::get('global.C.reset.head.text');
    $title       = $screenName;
    $keywords    = Lang::get('global.T.keywords').", $screenName";
    $image       = '/assets/img/apple-icon.png';
    $canonical   = config('app.url').'/password/reset';
@endphp
@extends('client.layouts.app')
@section('content')
    @include('client.layouts.content.reset.form')
@endsection
