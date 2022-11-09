@php
    $screenName  = 'Danh sách khách hàng đã thanh toán tiền phòng';
    $functionId  = 'client-page';
    $description = Lang::get('global.T.description');
    $title       = Lang::get('global.T.title');
    $keywords    = Lang::get('global.T.keywords');
    $image       = '/assets/img/apple-icon.png';
    $canonical   = config('app.url').'admin/client';
@endphp
@extends('admin.layouts.app')
@section('content')
    @include('admin.layouts.content.client.index')
@endsection
@section('modal')
    @include('modal.client.index')
@endsection
