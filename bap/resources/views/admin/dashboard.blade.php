@php
    $screenName  = 'Bảng điều khiển';
    $functionId  = 'dashboard-page';
    $description = Lang::get('global.T.description');
    $title       = Lang::get('global.T.title');
    $keywords    = Lang::get('global.T.keywords');
    $image       = '/assets/img/apple-icon.png';
    $canonical   = config('app.url').'admin/dashboard';
@endphp
@extends('admin.layouts.app')
@section('content')
@include('admin.layouts.content.dashboard.index')
@endsection
@section('modal')
@include('modal.dashboard.index')
@endsection
