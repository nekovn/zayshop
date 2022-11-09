@php
    $screenName  = 'Danh sách quản lý';
    $functionId  = 'admin-page';
    $description = Lang::get('global.T.description');
    $title       = Lang::get('global.T.title');
    $keywords    = Lang::get('global.T.keywords');
    $image       = '/assets/img/apple-icon.png';
    $canonical   = config('app.url').'admin/admin';
@endphp
@extends('admin.layouts.app')
@section('content')
    @include('admin.layouts.content.admin.index')
@endsection
@section('modal')
    @include('modal.admin.index')
@endsection
