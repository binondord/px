@extends($layoutDir.'.default')

@section('styles')
    @parent
    <link rel='stylesheet' type='text/css' href='//fonts.googleapis.com/css?family=Open+Sans:400,600' />
    <link href="{{ asset($assetPath.'/4/css/style.css', \Custom::secureUrl()) }}" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" media="screen" href="{{ asset('/slick-1.6.0/slick/slick.css') }}">
    <link rel="stylesheet" type="text/css" media="screen" href="{{ asset('/slick-1.6.0/slick/slick-theme.css') }}">
    {!! Html::style('/bower_components/bootstrap/dist/css/bootstrap.min.css')  !!}

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
                        <h2 class="heading-title">Did you know?</h2>
                        <p>The average entry level salary for a post office job is $20 per hour. They provide great benefits that include:</p>
                        <ul class="bullet-check-bg">
                            <li>Full Benefits</li>
                            <li>Paid Training</li>
                            <li>Paid Vacations</li>
                            <li>No experience is required!</li>
                        </ul>
                    </div>
                    <div class="bullet-right-info col-xs-12 col-md-6">
                        <h2 class="heading-title">Types of Jobs Available</h2>
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

                        <h2 class="heading-title">Minimum eligibility is required to meet the criteria for a career with the USPS</h2>
                        <ul class="bullet-check-bg">
                            <li>Must be a minimum of 18 years old</li>
                            <li>Must be a U.S Citizen or have a green card</li>
                        </ul>
                        <p>Do you meet the above criteria? If so, you may qualify for a position with the United States Postal Service! To check eligibility please follow the steps above.</p>
                    </div>
                </div>
            </div>
        </div><!-- end of bullets-info-wrap -->
        @include($layoutDir.'.'.$version.'.footer')
    </div><!-- end of container -->

@endsection

@section('footer')

    <div id="alert"></div>
    <script src="{{ asset($assetPath.'/4/js/step.js') }}"></script>

    {{-- Html::script('/bower_components/slick-carousel/slick/slick.js')  --}}
    {!! Html::script('/slick-1.6.0/slick/slick.js')  !!}

    <script type="text/javascript">
        $(document).ready(function() {
            $(".regular").slick({
                arrows: false,
                infinite: false,
                rtl: false
            });
        });
    </script>
    <script src="{{ asset('/js/lib/raphael.js') }}"></script>
    <script src="{{ asset('/js/lib/color.jquery.js') }}"></script>
    <script src="{{ asset('/js/lib/jquery.usmap.js') }}"></script>
    <script src="{{ asset('/js/web.js') }}"></script>
    {!! Html::script('/bower_components/bootstrap/dist/js/bootstrap.min.js')  !!}
@endsection