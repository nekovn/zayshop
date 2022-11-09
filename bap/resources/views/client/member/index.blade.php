@php
    $screenName  = $contentTitle;
    $functionId  = 'members-account';
    $description = Lang::get('global.T.description');
    $title       = $contentTitle;
    $keywords    = Lang::get('global.T.keywords');
    $image       = '/assets/img/apple-icon.png';
    $canonical   = config('app.url');
@endphp
@extends('client.layouts.app')
@section('content')
    <div class="page-body">
        <div class="container-xl">
            <div class="row">
                @include('client.member.left.index')
                @include('client.member.right.index')
            </div>
        </div>
    </div>
@endsection
