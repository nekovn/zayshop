@php
    $screenName  = 'Danh sách Log';
    $functionId  = 'log-page';
    $description = Lang::get('global.T.description');
    $title       = Lang::get('global.T.title');
    $keywords    = Lang::get('global.T.keywords');
    $image       = '/assets/img/apple-icon.png';
    $canonical   = config('app.url').'admin/log';
@endphp
@extends('admin.layouts.app')
@section('content')
    @include('admin.layouts.content.index')
@endsection
@section('modal')
    @include('modal.index')
@endsection
@push('app-script')
    <script src="{{ mix('/assets/js/admin/page/log.page.js') }}" defer></script>
@endpush

