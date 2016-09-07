<!DOCTYPE html>
<html>
<head>
    <title>Postal Exam</title>

    <!-- Meta -->
    <meta http-equiv="Content-Type" charset="UTF-8" />

    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0">


    <!-- Styles -->
    <link rel="stylesheet" type="text/css" media="screen" href="{{ asset('css/styles.css') }}">


    @yield('scripts')

</head>
<body id="{{ $style }}">
    @include('layouts.partials.header')

    @yield('content')

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.js"></script>

    @section('footer')
        @include('layouts.partials.footer')
    @show


</body>
</html>