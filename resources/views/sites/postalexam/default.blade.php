@extends('layouts.default')

@section('head')
    <link rel="shortcut icon" type="image/ico" href="{{ asset($assetPath.$version.'/img/favicon2.ico', \Custom::secureUrl()) }}" />
@endsection

@section('header')

@endsection

@section('footer')
    @include($layoutDir.'.'.$version.'.footer')
@endsection

@section('script')
    @parent
@endsection