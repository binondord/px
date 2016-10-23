@extends($layoutDir.'.default')

@section('styles')
    @parent
    <link rel='stylesheet' type='text/css' href='//fonts.googleapis.com/css?family=Open+Sans:400,600' />
    <link href="{{ asset($assetPath.$version.'/css/style.css', \Custom::secureUrl()) }}" rel="stylesheet" />
    <link href="{{ asset($assetPath.$version.'/css/loclookups.css', \Custom::secureUrl()) }}" rel="stylesheet" />
    {!! Html::style('/bower_components/bootstrap/dist/css/bootstrap.min.css')  !!}
@endsection

@section('bodyAttr') class=v{{$version}} @endsection

@section('content')
    @include($layoutDir.'.'.$version.'.header')

    <div class="container">
        <div class="main-cotent-wrapper" id="main-1">
            <div class="main-inner-wrap clearfix">
                <h1>Prepare Yourself for a Career with the U.S. Postal Service</h1>
                <div class="col-xs-12 col-md-8 col-md-push-2 col-lg-6 col-lg-push-3">
                    <form action="/v{{$version.'/step'}}">
                        <h2>Start Here, It’s Free!</h2>
                        <p>Enter your Zip Code to start.</p>
                        @if (session('status'))
                            <div class="alert alert-danger">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="form-group clearfix">
                            <div class="col-xs-12 col-md-7">
                                <input type="text" id="location" name="location"/>
                            </div>
                            <div class="col-xs-12 col-md-5">
                                <button>Search</button>
                            </div>
                        </div>
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

    <script>
        $(document).ready(function(){
            var lookup = 'http://lookups.adbrilliant.com/loc/';

            $('#location').autocomplete({
                serviceUrl: lookup
            });
        });
    </script>
    <div id="alert"></div>
    <script src="{{ asset('/js/lib/raphael.js') }}"></script>
    <script src="{{ asset('/js/lib/color.jquery.js') }}"></script>
    <script src="{{ asset('/js/lib/jquery.usmap.js') }}"></script>
    <script src="{{ asset('/js/web.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/lib/js/jquery.autocomplete.js', \Custom::secureUrl()) }}"></script>
    {!! Html::script('/bower_components/bootstrap/dist/js/bootstrap.min.js')  !!}
@endsection