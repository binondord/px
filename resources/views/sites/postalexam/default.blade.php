@extends('layouts.default')

@section('head')
    <link rel="shortcut icon" type="image/ico" href="{{ asset($assetPath.$version.'/img/favicon2.ico', \Custom::secureUrl()) }}" />
    {!! Html::style('/lib/jquery.growl/stylesheets/jquery.growl.css')  !!}
@endsection

@section('header')

@endsection

@section('footer')
    @include($layoutDir.'.'.$version.'.footer')
@endsection

@section('script')
    @parent
    {!! Html::script('/lib/jquery.growl/javascripts/jquery.growl.js')  !!}
    <script src="{{ asset('/bower_components/jquery-validation/dist/jquery.validate.min.js', \Custom::secureUrl()) }}"></script>
@endsection