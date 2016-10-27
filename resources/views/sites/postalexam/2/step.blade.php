@extends($layoutDir.'.default')

@section('styles')
    @parent
    <link rel='stylesheet' type='text/css' href='//fonts.googleapis.com/css?family=Open+Sans:400,600' />
    <link href="{{ asset($assetPath.$version.'/css/style.css', \Custom::secureUrl()) }}" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" media="screen" href="{{ asset('/slick-1.6.0/slick/slick.css') }}">
    <link rel="stylesheet" type="text/css" media="screen" href="{{ asset('/slick-1.6.0/slick/slick-theme.css') }}">

    <script type="text/javascript">

        function addEmail( event ) {

            document.getElementById('email').value = event.value;
        }


        function nextStep( event ) {

            var step = event.id.split('-');

            var form = document.getElementById('form');


            for( var i = 0; i < form.children.length; i++ ) {

                form.children[i].style.display = 'none';
            }


            if( Number(step[1]) < 4 ) {

                $('.regular').slick("slickNext");
                //form.children[Number(step[1])].style.display = 'block';

            } else {

                form.submit();
            }

            return false;
        }

    </script>
@endsection

@section('bodyAttr') class=v{{$version}} @endsection

@section('content')
    <?php
    $state_name = "California";
    ?>

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
                <h2>Did you know?</h2>
                <p>The average entry level salary for a post office job is $20 per hour. They provide great benefits that include:</p>
                <ul class="lists clear">
                    <li>Full Benefits</li>
                    <li>Paid Training</li>
                    <li>Paid Vacations</li>
                    <li>No experience is required!</li>
                </ul>
            </div>
            <div class="col right">
                <h2>Type of Jobs Available</h2>
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
            <h2>Minimum eligibility required to meet the criteria for a career with the USPS</h2>
            <ul class="lists clear">
                <li>- Must be a minimun of 18 years old</li>
                <li>- Must be a U.S Citizen or have a green card</li>
            </ul>
            <p>Do you meet the above criteria? If so, you may qualify for a position with the United States Postal Service! To check eligibility please follow the steps above.</p>
        </section>
    </main>
@endsection

@section('footer')
    @parent

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

            $('#phone').mask('(999)999-9999');

            $.validator.addMethod(
                "US_Phone",
                function(value, element){
                    value = value.replace(/_/g,"");
                    if(value.length >= 10)
                    {
                        var val = value.substring(1,2);
                        if(val != 1 && val != "_" && val > 1){
                            return true;
                        }else{
                            return false;
                        }
                    }else{
                        return false;
                    }
                },
                'Invalid US Phone'
            );

            $('form').validate({
                rules : {
                    email : {
                        email: true,
                        required: true
                    },
                    firstname: 'required',
                    lastname : 'required',
                    phone : {
                        required: true,
                        minlength: 10,
                        US_Phone: true
                    },
                    city : 'required',
                    state :'required',
                    country : 'required',
                    zip : {
                        required : true,
                        minlength: 5,
                        maxlength: 5
                    },
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
@endsection