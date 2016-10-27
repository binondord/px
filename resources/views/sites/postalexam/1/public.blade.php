@extends($layoutDir.'.default')

@section('styles')
    @parent
    <link rel='stylesheet' type='text/css' href='//fonts.googleapis.com/css?family=Open+Sans:400,600' />
    <link href="{{ asset($assetPath.$version.'/css/style.css', \Custom::secureUrl()) }}" rel="stylesheet" />
@endsection

@section('content')
    @include($layoutDir.'.'.$version.'.header')
    <main id="content">
        <section class="row-1">
            <div class="inner clear">
                <h2>To Get Started Please Click Your State on the Map Below
                    @if (session('status'))
                        <small>
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        </small>
                    @endif
                </h2>
                {{--<figure class="map"></figure>--}}
                <div id="map"></div>
            </div>
        </section>
        <section class="row-2">
            <div class="inner clear">
                <h2>Prepare Yourself for a Career with the U.S. Postal Service</h2>
                <div class="col left">
                    <h4>Take the Postal Exam</h4>
                    <p>The Postal Exam is the most commonly used exam for USPS careers.</p>
                </div>
                <div class="col right">
                    <h4>Why Work for the USPS?</h4>
                    <p>Receive full benefits, paid training and paid vacations.</p>
                </div>
            </div>
        </section>
        <section class="row-3">
            <div class="inner clear">
                <h2>Eligibility Requirements of U.S. Postal Service Jobs</h2>
                <ul class="lists">
                    <li>Must be over the age of 18</li>
                    <li>Must pass the USPS Exam</li>
                    <li>Zero drug policy</li>
                    <li>No work experience is required.</li>
                    <li>Must be a U.S Citizen or have a green card</li>
                    <li>Must be competent in English</li>
                    <li>No GED or high school diploma is required</li>
                    <li>Military service serves as prior employment</li>
                </ul>
            </div>
        </section>

    </main>
@endsection

@section('footer')
    @parent

    <div id="alert"></div>
    <script src="{{ asset('/js/lib/raphael.js') }}"></script>
    <script src="{{ asset('/js/lib/color.jquery.js') }}"></script>
    <script src="{{ asset('/js/lib/jquery.usmap.js') }}"></script>
    <script src="{{ asset('/js/web.js') }}"></script>
@endsection