@extends($layoutDir.'.default')

@section('styles')
    @parent
    <link rel='stylesheet' type='text/css' href='//fonts.googleapis.com/css?family=Open+Sans:400,600' />
    <link href="{{ asset($assetPath.'/6/css/style.css', \Custom::secureUrl()) }}" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" media="screen" href="{{ asset('/slick-1.6.0/slick/slick.css') }}">
    <link rel="stylesheet" type="text/css" media="screen" href="{{ asset('/slick-1.6.0/slick/slick-theme.css') }}">
    {!! Html::style('/bower_components/bootstrap/dist/css/bootstrap.min.css')  !!}

@endsection

@section('bodyAttr') class=v{{$version}} @endsection

@section('content')
    @include($layoutDir.'.'.$version.'.header')


    <main id="container">
        <section class="row-1 clear">
            <div class="inner">
                <form action="/v{{$version}}/checkout" method="POST" id="form">
                    <section class="regular slider">
                        <div id="slider_1">
                            @include($layoutDir.'.'.$version.'.step_partials.step1')
                        </div>
                        <div id="slider_2">
                            @include($layoutDir.'.'.$version.'.step_partials.step2')
                        </div>
                        <div id="slider_3">
                            @include($layoutDir.'.'.$version.'.step_partials.step3')
                        </div>
                        <div id="slider_4">
                            @include($layoutDir.'.'.$version.'.step_partials.step4')
                        </div>
                    </section>
                    {{ csrf_field() }}
                </form>
            </div>
        </section>
        <section class="row-2 clear">
            <div class="inner">
                <h3>{{$state_name}} Postal District</h3>
                <div class="col left">
                    <ul class="lists clear">
                        <li><strong>No need to pay $120 and higher</strong> to prepare for the US Postal Entrance Exam. Our practice exams are equal, if not better than the higher priced copy-cat sites on the web. Our one-time fee of $39.97 covers the entire program for all three exams. Don't get scammed.</li>
                        <li>Better than any postal exam book. We update our material on a continuous basis to support the latest exams currently being used by the United States Postal Service.</li>
                        <li>Easy to follow exam test taking strategies & tips from subject matter experts.</li>
                        <li>Nearly <strong>98%</strong> (97.84) of our members pass their respective postal exams on the first try. Many of them scoring in the 90th to 95th percentile.</li>
                        <li><strong>Instant access.</strong> All study materials are conveniently available online. No need to wait to begin preparing.</li>
                    </ul>
                </div>
                <div class="col right">
                    <img src="{{ asset($assetPath.'/6/images/location-info.jpg', \Custom::secureUrl()) }}">
                </div>
            </div>
        </section>
        <section class="row-3 clear">
            <header>
                <h3>Did You Know?</h3>
                <p>Average Starting Pay for Post Office Jobs is <strong>$20/hour</strong>. US Postal Service Jobs Offer Many Fantastic Benefits, Including:</p>
            </header>
            <div class="content">
                <ul class="benefits">
                    <li>Full Federal Benefits</li>
                    <li>Paid Training</li>
                    <li>Paid Vacations</li>
                    <li>No Experience Necessary!</li>
                </ul>
                <div class="get-started">Get Started Today!</div>
                <div class="includes">
                    <p>Thousands of Positions Available, Including:</p>
                    <ul class="positions clear">
                        <li>Mail Carrier</li>
                        <li>Mail Handler</li>
                        <li>Mail Processor</li>
                        <li>Custodian</li>
                        <li>Garageman</li>
                        <li>Tractor Trailer Driver</li>
                        <li>Window Clerk</li>
                        <li>Clerk typist</li>
                        <li>Corporate Positions</li>
                    </ul>
                </div>
            </div>
        </section>
        <section class="row-4 clear">
            <h4>Minimum Requirements To Qualify For Post Office Jobs:</h4>
            <ul class="requirements">
                <li>Must be at least 18 years of age.</li>
                <li>Must be a U.S Citizen or have a Green Card.</li>
            </ul>
            <p>If you have met these minimum requirements, that’s great. You may be eligible for positions with the U.S. Postal Service. To verify full eligibility, please complete the steps above.</p>
        </section>
    </main>
    @include($layoutDir.'.'.$version.'.footer')

@endsection

@section('footer')

    <div id="alert"></div>
    <script src="{{ asset($assetPath.'/6/js/step.js') }}"></script>

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