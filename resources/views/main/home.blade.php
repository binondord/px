@extends('layouts.default')

@section('content')
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
                    <h4>Take the Postal Exam 473</h4>
                    <p>The Postal Exam 473 is the most commonly used exam for USPS careers.</p>
                </div>
                <div class="col right">
                    <h4>Why Work for the USPS?</h4>
                    <p>From mail carriers to clerks to custodians, the U.S.</p>
                </div>
            </div>
        </section>
        <section class="row-3">
            <div class="inner clear">
                <h2>Eligibility Requirements of U.S. Postal Service Jobs</h2>
                <ul class="lists">
                    <li>Must be 18 years or older</li>
                    <li>Must be a U.S Citizen or have a Green Card.</li>
                    <li>Must pass USPS Exam 473</li>
                    <li>Must have basic competency in English.</li>
                    <li>No field work experience is required!</li>
                    <li>No high school diploma or GED is required!</li>
                    <li>A qualification for employment is to be drug free</li>
                    <li>Military service is treated as prior employment.</li>
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