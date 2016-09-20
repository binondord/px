@section('header')
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true" data-ng-click="cancel()">&times;</button>
        <h4 class="modal-title">@yield('title')</h4>
    </div>
@show

<div class="modal-body">
    <div id="editmodal-error" class="alert alert-danger collapse"></div>
    @yield('content')
</div>

@section('footer')
    <div class="modal-footer">
        <!-- begin buttons section-->
        @yield('buttons')
        <!-- end buttons section -->
    </div>
@show