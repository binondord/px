<!DOCTYPE html>
<html>
<head>
    <title>Postal Exam</title>

    <!-- Meta -->
    <meta http-equiv="Content-Type" charset="UTF-8" />

    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Styles -->
    @section('styles')
        {{--<link rel="stylesheet" type="text/css" media="screen" href="{{ asset('css/styles.css') }}">--}}
    @show

    @yield('scripts')

</head>
<body id="{{ $style }}" @yield('bodyAttr')>


    @yield('content')

    {{--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.js"></script>--}}
    <script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
    {!! Html::script('/bower_components/jquery-ui/jquery-ui.min.js')  !!}



    @section('footer')
        {{--include('layouts.partials.footer')--}}
    @show


</body>
</html>