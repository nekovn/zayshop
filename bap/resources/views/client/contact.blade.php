@php
    $screenName  = Lang::get('global.C.contact.head.title');
    $functionId  = 'contact-page';
    $description = Lang::get('global.C.contact.head.text');
    $title       = $screenName;
    $keywords    = Lang::get('global.T.keywords').", $screenName";
    $image       = '/assets/img/apple-icon.png';
    $appName     = config('app.name');
    $address     = config('app.admin_address');
    $canonical   = config('app.url').'/contact';
@endphp
@extends('client.layouts.app')
@section('content')
<!-- Ena Map -->
@include('client.layouts.content.contact.form')

@endsection
