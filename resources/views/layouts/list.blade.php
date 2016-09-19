@extends('layouts.admin')

@section('header')
    @parent
    {!! HTML::style('/bower_components/ng-dialog/css/ngDialog-theme-default.min.css') !!}
@stop

@section('content')
    <section class="content-wrappper" @yield('ang-controller')>
        <section class="content-header">
            <h1>
                @yield('title')
                <small>@yield('create-link')</small>
            </h1>
        </section>
        <div class="content">

            <div class="row">
                <div class="col-md-4">
                    <div class="search_wrapper form-group has-feedback has-feedback-left">
                        @yield('search')
                        <i class="glyphicon glyphicon-search form-control-feedback"></i>
                        <br/>
                    </div><!-- end div.search_wrapper -->

                </div>
                <div class="col-md-5 pull-right">
                    <div class="span2">
                        <div class=" pull-right">
                            @yield('buttons')
                        </div>
                    </div>
                </div>
            </div><!-- end .row -->
            <br/>

            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title pull-left">@yield('topleft')<div growl></div></h3>
                    <h3 class="box-title pull-right"><small class="hidden">@yield('advancesearch')</small>&nbsp;</h3>
                </div>
                <div class="box-body">
                    @yield('data')
                </div>
            </div>

            <div class="paging row">
                <div class="col-md-9 paging-left">
                    <dir-pagination-controls @yield('paginate')></dir-pagination-controls>
                </div>
                <div class="col-md-3 hidden">
                    @yield('pagesize')
                    <label for="search">items per page:</label>
                </div>
            </div><!-- end .paging -->
            <!-- /.box-body -->
        </div><!-- end angular controller -->

    </section><!-- end .container -->
@stop