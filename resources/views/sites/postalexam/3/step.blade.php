@extends($layoutDir.'.default')

@section('styles')
    @parent
    <link rel='stylesheet' type='text/css' href='//fonts.googleapis.com/css?family=Open+Sans:400,600' />
    <link href="{{ asset($assetPath.$version.'/css/style.css', \Custom::secureUrl()) }}" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" media="screen" href="{{ asset('/slick-1.6.0/slick/slick.css') }}">
    <link rel="stylesheet" type="text/css" media="screen" href="{{ asset('/slick-1.6.0/slick/slick-theme.css') }}">
@endsection

@section('bodyAttr') class=v{{$version}} @endsection

@section('content')
    @include($layoutDir.'.'.$version.'.header')

    <main id="content">
        <section class="row-1 clear">
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
        </section>
        <section class="row-2 clear">
            <div class="col left">
                <h2>Are you aware of</h2>
                <p>Entry level salary for Post office jobs is $20 per hour. Unbelievable benefits are provided by USPS jobs which include.</p>
                <ul class="lists clear">
                    <li>Full Centralized Benefits</li>
                    <li>Training With Pay</li>
                    <li>Vacations With Pay</li>
                    <li>Experience is not mandatory!</li>
                </ul>
            </div>
            <div class="col right">
                <h2>Type of Post Offered</h2>
                <ul class="lists clear">
                    <li>Mail Carrier</ll>
                    <li>Mail Handler</ll>
                    <li>Mail Processor</ll>
                    <li>Window Clerk</ll>
                    <li>Clerk Typist</ll>
                    <li>Custodian</ll>
                    <li>Garageman</ll>
                    <li>Tractor Trailer Driver</ll>
                    <li>Corporate Positions</ll>
                </ul>
            </div>
        </section>
        <section class="row-3">
            <h2>Minimum eligibility required to meet the criteria for post office career</h2>
            <ul class="lists clear">
                <li>- Should be minimum 18 years old</li>
                <li>- Only a U.S. citizen or a green card holder can apply.</li>
            </ul>
            <p>Do you meet the above two criteria? Wow!! You may qualify for the positions with the United States Postal Service. To check complete eligibility, please follow the above steps.</p>
        </section>
    </main>
@endsection

@section('footer')
    @parent

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
    <div id="alert"></div>
    <script src="{{ asset('/js/lib/raphael.js') }}"></script>
    <script src="{{ asset('/js/lib/color.jquery.js') }}"></script>
    <script src="{{ asset('/js/lib/jquery.usmap.js') }}"></script>
    <script src="{{ asset('/js/web.js') }}"></script>
@endsection