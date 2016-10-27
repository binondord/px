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

                <div class="state-form-wrap clearfix">
                    @if (session('status'))
                        <div class="col-xs-offset-4 col-xs-8">
                            <span class="col-xs-4 alert alert-danger">{{ session('status') }}</span>

                        </div>
                    @endif
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