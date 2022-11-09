@php
    $screenName  = "Trang Lỗi $status_code";
    $functionId  = "error-page-$status_code";
    $description = Lang::get('global.T.description');
    $title       = Lang::get('global.T.title');
    $keywords    = Lang::get('global.T.keywords');
    $image       = '/assets/img/apple-icon.png';
    $canonical   = config('app.url');
@endphp
@extends('client.layouts.app')
@section('content')
    <div class="page page-center">
        <div class="container-tight py-4">
            <div class="empty">
                <div class="empty-header">{{ $status_code }}</div>
                <p class="empty-title">{{ $message }}</p>
                <p class="empty-subtitle text-muted">
                    {{ $sub_message }}
                </p>
            </div>
        </div>
    </div>
@endsection




