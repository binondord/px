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

    <main id="content">
        <section class="row-1 clear">
            <h2>To Get Started Please Select Your State Below</h2>
            <form action="/v{{$version}}/step" method="POST">
                <div class="field">
                    <select class="state" name="selectedstate">
                        <option value="">-- Select Your State --</option>
                        @foreach($states as $abbrev => $state)
                            <option value="{{$abbrev}}">{{$state}}</option>
                        @endforeach
                    </select>
                </div>
                @if (session('status'))
                    <div class="alert alert-danger">
                        {{ session('status') }}
                    </div>
                @endif

                <button type="button" class="button"><span class="span">Continue to Next Step</span></button>
                {{ csrf_field() }}
            </form>
        </section>
        <section class="row-2 clear">
            <h2>Prepare Yourself for a Career with the U.S. Postal Service</h2>
            <div class="col left">
                <h4>Take the Postal Exam 473</h4>
                <p>The Postal Exam 473 is the most commonly used exam for USPS careers.</p>
            </div>
            <div class="col right">
                <h4>Why Work for the USPS?</h4>
                <p>From mail carriers to clerks to custodians, the U.S.</p>
            </div>
        </section>
        <section class="row-3 clear">
            <h2>Eligibility Requirements of U.S. Postal Service Jobs</h2>
            <ul class="lists clear">
                <li>Must be 18 years or older</li>
                <li>Must be a U.S Citizen or have a Green Card.</li>
                <li>Must pass USPS Exam 473</li>
                <li>Must have basic competency in English.</li>
                <li>No field work experienceis required!</li>
                <li>No high school diploma or GED is required!</li>
                <li>A qualification for employment is to be drug free</li>
                <li>Military service is treated as prior employment.</li>
            </ul>
        </section>
    </main>


@endsection

@section('footer')
    @parent

    <script>
        $(document).ready(function(){
            $('.button').click(function(){
                var value = $(this).parent().find('.state').val();
                window.location.href = '/v{{$version}}/step?state='+value;
            });
        });
    </script>
    <div id="alert"></div>
    <script src="{{ asset('/js/lib/raphael.js') }}"></script>
    <script src="{{ asset('/js/lib/color.jquery.js') }}"></script>
    <script src="{{ asset('/js/lib/jquery.usmap.js') }}"></script>
    <script src="{{ asset('/js/web.js') }}"></script>
    {!! Html::script('/bower_components/bootstrap/dist/js/bootstrap.min.js')  !!}
@endsection