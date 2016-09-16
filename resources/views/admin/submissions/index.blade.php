@extends('layouts.admin')

@section('header')
    @parent
@stop

@section('content')
    @yield('data')
@stop

@section('html_footer')
    @parent
@stop