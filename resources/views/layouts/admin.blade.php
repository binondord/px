<!DOCTYPE html>
<html ng-app='myApp' lang="en">
<head>
    @section('header')
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>@yield('title')</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.5 -->
        {!! Html::style('/bower_components/AdminLTE/bootstrap/css/bootstrap.min.css') !!}
        <!-- Font Awesome -->
        {!! Html::style('/bower_components/font-awesome/css/font-awesome.min.css') !!}
        <!-- Ionicons -->
        {!! Html::style('/bower_components/Ionicons/css/ionicons.min.css') !!}


        <!-- Theme style -->
        {!! Html::style('/bower_components/AdminLTE/dist/css/AdminLTE.min.css') !!}
        <!-- AdminLTE Skins. Choose a skin from the css/skins
             folder instead of downloading all of them to reduce the load. -->
        {!! Html::style('/bower_components/AdminLTE/dist/css/skins/_all-skins.min.css') !!}
        <!-- iCheck -->
        {!! Html::style('/bower_components/AdminLTE/plugins/iCheck/flat/blue.css') !!}
        <!-- Morris chart -->
        {{-- Html::style('/bower_components/AdminLTE/plugins/morris/morris.css') --}}
        <!-- jvectormap -->
        {!! Html::style('/bower_components/AdminLTE/plugins/jvectormap/jquery-jvectormap-1.2.2.css') !!}
        <!-- Date Picker -->
        {!! Html::style('/bower_components/AdminLTE/plugins/datepicker/datepicker3.css') !!}
        <!-- Daterange picker -->
        {!! Html::style('/bower_components/AdminLTE/plugins/daterangepicker/daterangepicker-bs3.css') !!}
        <!-- bootstrap wysihtml5 - text editor -->
        {!! Html::style('/bower_components/AdminLTE/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') !!}
        <!-- Google Fonts -->
        {!! Html::style('//fonts.googleapis.com/css?family=Open+Sans:400,700,800,300') !!}
        {!! Html::style('//fonts.googleapis.com/css?family=Oswald:400,300,700') !!}

        {!! Html::style('/bower_components/angular-xeditable/dist/css/xeditable.min.css')  !!}
        <!-- Material Design Icon Font -->
        {!! Html::style('/bower_components/material-design-iconic-font/dist/css/material-design-iconic-font.min.css')  !!}
        <!-- Datepicker -->
        {!! Html::style('/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker3.min.css')  !!}
        <!-- Sweet Alert -->
        {!! Html::style('/bower_components/sweetalert/dist/sweetalert.css')  !!}

        {!! Html::style('/bower_components/ng-tags-input/ng-tags-input.bootstrap.min.css')  !!}
        {!! Html::style('/bower_components/ng-tags-input/ng-tags-input.min.css')  !!}
        {!! Html::style('/bower_components/angular-growl-v2/build/angular-growl.min.css')  !!}
        {!! Html::style('/bower_components/bootstrap-toggle/css/bootstrap-toggle.min.css')  !!}
        {{-- Html::style('/css/index.css') --}}
        
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <link rel="icon" type="/image/png" href="/img/favicon.ico" />

    @show
</head>
<body class="hold-transition skin-blue fixed sidebar-mini">
<div class="wrapper">
    @include('layouts.admin_partials.header')

    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">

        <!-- sidebar menu: : style can be found in sidebar.less -->
        @include('layouts.admin_partials.sidebar')
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @yield('content')

        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
        @include('layouts.admin_partials.footer')
    </footer>

    @if(!Auth::guest())
        <aside class="alerts">
        </aside>
    @endif

    @include('layouts.admin_partials.control-sidebar')
</div>

<!-- ./wrapper -->
@section('html_footer')
    <!-- jQuery 2.1.4 -->
    {!! Html::script('/bower_components/jquery/dist/jquery.min.js')  !!}
    <!-- jQuery UI 1.11.4 -->
    {!! Html::script('/bower_components/jquery-ui/jquery-ui.min.js')  !!}

    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.5 -->
    {!! Html::script('/bower_components/AdminLTE/bootstrap/js/bootstrap.min.js')  !!}
    {!! Html::script('/bower_components/tinymce/tinymce.js')  !!}

    {!! Html::script('/bower_components/angular/angular.js')  !!}
    {!! Html::script('/bower_components/angular-sanitize/angular-sanitize.min.js')  !!}

    {!! Html::script('/bower_components/angular-bootstrap/ui-bootstrap-tpls.js')  !!}
    {!! Html::script('/bower_components/ng-tags-input/ng-tags-input.js')  !!}

    {!! Html::script('/bower_components/angular-ui-tinymce/src/tinymce.js')  !!}
    {!! Html::script('/bower_components/angular-xeditable/dist/js/xeditable.min.js')  !!}
    {!! Html::script('/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')  !!}


    {!! Html::script('/bower_components/alasql/dist/alasql.min.js') !!}

    {!! Html::script('/bower_components/angularUtils-pagination/dirPagination.js')  !!}
    {!! Html::script('/bower_components/angular-growl-v2/build/angular-growl.min.js')  !!}
    {{-- Html::script('/angular/ngTagsInput.tpls.js')  --}}

    {!! Html::script('/angular/app.js')  !!}

    {!! Html::script('/angular/controllers/navCtrl.js')  !!}

    <!-- Morris.js charts -->
    {!! Html::script('/bower_components/raphael/raphael-min.js')  !!}
    {{-- Html::script('/bower_components/AdminLTE/plugins/morris/morris.min.js')  --}}
    <!-- Sparkline -->
    {!! Html::script('/bower_components/AdminLTE/plugins/sparkline/jquery.sparkline.min.js')  !!}

    <!-- jvectormap -->
    {!! Html::script('/bower_components/AdminLTE/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')  !!}

    {!! Html::script('/bower_components/AdminLTE/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')  !!}

    <!-- jQuery Knob Chart -->
    {!! Html::script('/bower_components/AdminLTE/plugins/knob/jquery.knob.js')  !!}

    <!-- daterangepicker -->
    {!! Html::script('/bower_components/moment/min/moment.min.js')  !!}

    {!! Html::script('/bower_components/AdminLTE/plugins/daterangepicker/daterangepicker.js')  !!}

    <!-- Bootstrap WYSIHTML5 -->
    {!! Html::script('/bower_components/AdminLTE/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')  !!}

    <!-- Slimscroll -->
    {!! Html::script('/bower_components/AdminLTE/plugins/slimScroll/jquery.slimscroll.min.js')  !!}

    <!-- FastClick -->
    {!! Html::script('/bower_components/AdminLTE/plugins/fastclick/fastclick.js')  !!}

    <!-- AdminLTE App -->
    {!! Html::script('/bower_components/AdminLTE/dist/js/app.min.js') !!}

    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    {{-- Html::script('/bower_components/AdminLTE/dist/js/pages/dashboard.js')  --}}

    <!-- AdminLTE for demo purposes -->
    {!! Html::script('/bower_components/AdminLTE/dist/js/demo.js')  !!}

    <!-- Bootstrap Toggle -->
    {!! Html::script('/bower_components/bootstrap-toggle/js/bootstrap-toggle.min.js')  !!}

    @yield('script')
@show

<div growl></div>
</body>
</html>
