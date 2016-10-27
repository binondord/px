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
                <li>Must be over the age of 18</li>
                <li>Must pass the USPS Exam</li>
                <li>Zero drug policy</li>
                <li>No work experience is required.</li>
                <li>Must be a U.S Citizen or have a green card</li>
                <li>Must be competent in English</li>
                <li>No GED or high school diploma is required</li>
                <li>Military service serves as prior employment</li>
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