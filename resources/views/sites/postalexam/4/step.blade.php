@extends($layoutDir.'.default')

@section('styles')
    @parent
    <link rel='stylesheet' type='text/css' href='//fonts.googleapis.com/css?family=Open+Sans:400,600' />
    <link href="{{ asset($assetPath.$version.'/css/style.css', \Custom::secureUrl()) }}" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" media="screen" href="{{ asset('/slick-1.6.0/slick/slick.css') }}">
    <link rel="stylesheet" type="text/css" media="screen" href="{{ asset('/slick-1.6.0/slick/slick-theme.css') }}">
    {{-- Html::style('/bower_components/bootstrap/dist/css/bootstrap.min.css')  --}}
    {!! Html::style(asset($assetPath.$version.'/css/bootstrap.min.css'))  !!}

@endsection

@section('bodyAttr') class=v{{$version}} @endsection

@section('content')

    @include($layoutDir.'.'.$version.'.header')
    <div class="container">
        <form action="/v{{$version}}/checkout" method="POST" id="form">
            <section class="regular slider">
                <div>
                    @include($layoutDir.'.'.$version.'.step_partials.step1')
                </div>
                <div>
                    @include($layoutDir.'.'.$version.'.step_partials.step2')
                </div>
                <div>
                    @include($layoutDir.'.'.$version.'.step_partials.step3')
                </div>
                <div>
                    @include($layoutDir.'.'.$version.'.step_partials.step4')
                </div>
            </section>

            {{ csrf_field() }}
        </form>
        <div class="bullets-info-wrap clearfix">
            <div class="col-xs-12 col-md-push-1 col-md-10">
                <div class="row" id="bullets-row-1">
                    <div class="bullet-left-info col-xs-12 col-md-6">
                        <h2 class="heading-title">Are you aware of</h2>
                        <p>Entry level salary for Post Office jobs is $20 per hour. Unbelievable benefits are provided by USPS jobs which include:</p>
                        <ul class="bullet-check-bg">
                            <li>Full Centralized Benefits</li>
                            <li>Training with Pay</li>
                            <li>Vacations with Pay</li>
                            <li>Experience is not mandatory</li>
                        </ul>
                    </div>
                    <div class="bullet-right-info col-xs-12 col-md-6">
                        <h2 class="heading-title">Types of Post Offered</h2>
                        <div class="row">
                            <div class="col-xs-12 col-md-6">
                                <ul class="bullet-check-bg">
                                    <li>Mail Carrier</li>
                                    <li>Mail Processor</li>
                                    <li>Clerk Typist</li>
                                    <li>Garageman</li>
                                    <li>Corporate Positions</li>
                                </ul>
                            </div>
                            <div class="col-xs-12 col-md-6">
                                <ul class="bullet-check-bg">
                                    <li>Mail Handler</li>
                                    <li>Window Clerk</li>
                                    <li>Custodian</li>
                                    <li>Tractor Driver</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row" id="bullets-row-2">
                    <div class="col-xs-12">

                        <h2 class="heading-title">Minimum eligibility required are:</h2>
                        <ul class="bullet-check-bg">
                            <li>Should be minimum 18 years old.</li>
                            <li>Only a U.S. citizen or a green card holder can apply.</li>
                        </ul>
                        <p>Do you meet the above two criteria? Wow! You may qualify for the positions with the United States Postal Service. To check complete eligibility, please follow the above steps.</p>
                    </div>
                </div>
            </div>
        </div><!-- end of bullets-info-wrap -->
        @include($layoutDir.'.'.$version.'.footer')
    </div><!-- end of container -->

@endsection

@section('footer')

    <div id="alert"></div>
    <script src="{{ asset($assetPath.$version.'/js/step.js') }}"></script>

    {{-- Html::script('/bower_components/slick-carousel/slick/slick.js')  --}}
    {!! Html::script('/slick-1.6.0/slick/slick.js')  !!}

    <script type="text/javascript">
        $(document).ready(function() {
            $(".regular").slick({
                arrows: false,
                infinite: false,
                rtl : false
            });

            $('form').validate({
                rules : {
                    email : {
                        email: true,
                        required: true
                    },
                    firstname: 'required',
                    lastname : 'required',
                    phone : 'required',
                    city : 'required',
                    state :'required',
                    country : 'required',
                    zip : 'required',
                    birthyear : 'required'
                },
                messages : {
                    email : 'Please enter a valid email address'
                }
            });
        });
    </script>
    <script src="{{ asset('/js/lib/raphael.js') }}"></script>
    <script src="{{ asset('/js/lib/color.jquery.js') }}"></script>
    <script src="{{ asset('/js/lib/jquery.usmap.js') }}"></script>
    <script src="{{ asset('/js/web.js') }}"></script>
    {!! Html::script('/bower_components/bootstrap/dist/js/bootstrap.min.js')  !!}
@endsection