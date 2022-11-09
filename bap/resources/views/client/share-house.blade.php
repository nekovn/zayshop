@php
    $screenName  = Lang::get('global.M.menu.share-house');
    $functionId  = 'share-house-page';
    $description = Lang::get('global.T.description');
    $title       = Lang::get('global.T.title');
    $keywords    = Lang::get('global.T.keywords');
    $image       = '/assets/img/apple-icon.png';
    $canonical   = config('app.url').'/share-house';
@endphp
@extends('client.layouts.app')
@section('content')
    <!-- Start Content -->
    @include('client.layouts.content.share-house.content')
    <!-- End Content -->
@endsection

