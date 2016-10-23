@extends($layoutDir.'.default')

@section('styles')
    @parent
    <link rel='stylesheet' type='text/css' href='//fonts.googleapis.com/css?family=Open+Sans:400,600' />
    <link href="{{ asset($assetPath.$version.'/css/style.css', \Custom::secureUrl()) }}" rel="stylesheet" />
    {!! Html::style('/bower_components/bootstrap/dist/css/bootstrap.min.css')  !!}
@endsection

@section('bodyAttr') class=v{{$version}} @endsection

@section('content')
    @include($layoutDir.'.'.$version.'.header')

    <div class="container">
        <div class="main-cotent-wrapper" id="main-2">
            <div class="main-inner-wrap clearfix">
                <h1>Please Click Your State Below</h1>
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                <div class="state-form-wrap clearfix">
                    <form action="/v4/step">
                        @foreach($states as $abbrev => $state)
                            <div class="state-btn col-xs-12 col-sm-6 col-md-4 col-lg-3">
                                <button type="button" class="state" value="{{$abbrev}}">{{$state}}</button>
                            </div>
                        @endforeach

                    </form>
                </div>
            </div>
            <div class="faqs-wrap clearfix">
                <div class="col-xs-12 col-md-push-1 col-md-10">
                    <div class="row">
                        <div class="faq-item col-xs-12 col-sm-6" id="faq-item-1">
                            <h3>Take the Postal Exam 473</h3>
                            <p>The Postal Exam 473 ia the most <br class="visible-md visible-lg" />commonly used for USPS careers.</p>
                        </div>
                        <div class="faq-item col-xs-12 col-sm-6" id="faq-item-2">
                            <h3>Why Work for the USPS?</h3>
                            <p>From mail carriers to clerks to <br class="visible-md visible-lg"/>custodians, the U.S.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- end of form-cotent-wrapper -->
        <div class="bullets-info-wrap clearfix">
            <div class="col-xs-12 col-md-push-1 col-md-10">
                <div class="row" id="step-5-bullets">
                    <div class="bullet-left-info">
                        <h2 class="heading-title text-center">Eligibility Requirements of U.S. Service Jobs</h2>
                        <ul class="bullet-check-bg col-xs-12 col-md-6">
                            <li>Must be 18 years or older</li>
                            <li>Must pass USPS Exam 473</li>
                            <li>No field work experience is required!</li>
                            <li>A qualification for employment is to be drug free</li>
                        </ul>
                        <ul class="bullet-check-bg col-xs-12 col-md-6">
                            <li>Must be a US Citizen or have a Green Card</li>
                            <li>Must have basic competency in English</li>
                            <li>Must have basic competency in English</li>
                            <li>Military service is treated as prior employment.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div><!-- end of bullets-info-wrap -->
        @include($layoutDir.'.'.$version.'.footer')
    </div><!-- end of container -->

@endsection

@section('footer')

    <div id="alert"></div>
    <script>
        $(document).ready(function(){
            $('.state').click(function(){
                var value = $(this).val();
                window.location.href = '/v{{$version}}/step?state='+value;
            });
        });
    </script>
    <script src="{{ asset('/js/lib/raphael.js') }}"></script>
    <script src="{{ asset('/js/lib/color.jquery.js') }}"></script>
    <script src="{{ asset('/js/lib/jquery.usmap.js') }}"></script>
    <script src="{{ asset('/js/web.js') }}"></script>
    {!! Html::script('/bower_components/bootstrap/dist/js/bootstrap.min.js')  !!}
@endsection