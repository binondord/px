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
                            <h3>Take the Postal Exam</h3>
                            <p>The Postal Exam is the most <br class="visible-md visible-lg" />common exam to get a job at the USPS.</p>
                        </div>
                        <div class="faq-item col-xs-12 col-sm-6" id="faq-item-2">
                            <h3>Why Work for the USPS?</h3>
                            <p>Receive full benefits, paid training <br class="visible-md visible-lg"/>and paid vacations.</p>
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
                            <li>Must be over the age of 18</li>
                            <li>Must pass the USPS Exam</li>
                            <li>Zero drug policy</li>
                            <li>No work experience is required.</li>
                        </ul>
                        <ul class="bullet-check-bg col-xs-12 col-md-6">
                            <li>Must be a U.S Citizen or have a green card</li>
                            <li>Must be competent in English</li>
                            <li>No GED or high school diploma is required</li>
                            <li>Military service serves as prior employment</li>
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