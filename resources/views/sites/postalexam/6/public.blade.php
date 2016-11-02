@extends($layoutDir.'.default')

@section('styles')
    @parent
    <link rel='stylesheet' type='text/css' href='//fonts.googleapis.com/css?family=Open+Sans:400,600' />
    <link href="{{ asset($assetPath.'6/css/style.css', \Custom::secureUrl()) }}" rel="stylesheet" />
    {!! Html::style('/bower_components/bootstrap/dist/css/bootstrap.min.css')  !!}
@endsection

@section('bodyAttr') class=v{{$version}} @endsection

@section('content')
    @include($layoutDir.'.'.$version.'.header')

    <main id="container">
        <section class="row-1 clear">
            <h4>To Get Started Please Click Your State on the Map Below.</h4>
            {{--<a href="steps.html">
                <img src="{{ asset($assetPath.'6/images/map.png', \Custom::secureUrl()) }}">
            </a>--}}
            <div id="map"></div>
        </section>
        <section class="row-2 clear">
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
        <section class="row-3 clear">
            <h4>Minimum Requirements To Qualify For Post Office Jobs:</h4>
            <ul class="requirements">
                <li>Must be at least 18 years of age.</li>
                <li>Must be a U.S Citizen or have a Green Card.</li>
            </ul>
            <p>If you have met these minimum requirements, that’s great. You may be eligible for positions with the U.S. Postal Service. To verify full eligibility, please complete the steps above.</p>
        </section>
    </main>

@endsection

@section('footer')

    <style type="text/css">
        #map {
            width: 800px;
            height: 480px;
            margin: 0 auto;
        }
    </style>
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
    <script src="{{ asset($assetPath.'6/js/map.js', \Custom::secureUrl()) }}" ></script>
    <script type="text/javascript" src="{{ asset('/lib/js/jquery.autocomplete.js', \Custom::secureUrl()) }}"></script>
    {!! Html::script('/bower_components/bootstrap/dist/js/bootstrap.min.js')  !!}
@endsection