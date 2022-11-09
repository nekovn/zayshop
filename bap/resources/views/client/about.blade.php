@php
    $screenName  = Lang::get('global.C.about.head.title');
    $functionId  = 'about-page';
    $description = Lang::get('global.C.about.head.text');
    $title       = $screenName;
    $keywords    = Lang::get('global.T.keywords').", $screenName";
    $image       = '/assets/img/hero.png';
    $appName     = config('app.name');
    $canonical   = config('app.url').'/about';
    $aboutListTitle= Lang::get('global.C.about.list.title');
    $aboutServiceTitle= Lang::get('global.C.about.service.head.title');
    $aboutPolicyTitle= Lang::get('global.C.about.policy.head.title');
@endphp
{!!  !!}
@extends('client.layouts.app')
@section('content')
@include('client.layouts.content.about.top')
@endsection
@push('app-style')
@endpush
