@extends($layoutDir.'.default')

@section('styles')
    @parent
    <link rel='stylesheet' type='text/css' href='//fonts.googleapis.com/css?family=Open+Sans:400,600' />
    <link href="{{ asset($assetPath.'6/css/style.css', \Custom::secureUrl()) }}" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" media="screen" href="{{ asset('/slick-1.6.0/slick/slick.css') }}">
    <link rel="stylesheet" type="text/css" media="screen" href="{{ asset('/slick-1.6.0/slick/slick-theme.css') }}">
    {{-- Html::style('/bower_components/bootstrap/dist/css/bootstrap.min.css')  --}}
@endsection

@section('bodyAttr') class=v{{$version}} @endsection

@section('content')
    @include($layoutDir.'.'.$version.'.header')
    <main id="container">
        <section class="row-1 clear">
            <form action="/v{{$version}}/checkout" method="POST" id="form">

                <div class="fields">
                    <h3>Amount</h3>
                    <div class="field email">
                        <label>Amount (USD $)</label>
                        <input type="text" name="email" id="email" value="39.00">
                    </div>

                    <h3>Payment Information</h3>

                    <div class="field cards">
                        <label>Card Accepted</label>
                        <img src="{{ asset($assetPath.'6/images/cards.png', \Custom::secureUrl()) }}">
                    </div>

                    <div class="field nameOnCard">
                        <label>Name on card:</label>
                        <input type="text" name="nameOnCard" id="nameOnCard" value="">
                    </div>

                    <div class="field cardnumber">
                        <label>Card Number:</label>
                        <input type="text" name="cardnumber" id="cardnumber" value="">
                    </div>

                    <div class="field cvc">
                        <label>CVC:</label>
                        <input type="text" name="cvc" id="cvc" value="">
                    </div>

                    <div class="field expiration clear">
                        <label>Expiration (MM/YYYY):</label>

                        <div class="date">
                            <select name="month" required="">
                                <option value="">Month</option>
                                <option>01</option>
                                <option>02</option>
                                <option>03</option>
                                <option>04</option>
                                <option>05</option>
                                <option>06</option>
                                <option>07</option>
                                <option>08</option>
                                <option>09</option>
                                <option>10</option>
                                <option>11</option>
                                <option>12</option>
                            </select>
                            <select name="year" required="">
                                <option value="">Year</option>
                                <option>2016</option>
                                <option>2017</option>
                                <option>2018</option>
                                <option>2019</option>
                                <option>2020</option>
                                <option>2021</option>
                                <option>2022</option>
                                <option>2023</option>
                                <option>2024</option>
                                <option>2025</option>
                                <option>2026</option>
                                <option>2027</option>
                                <option>2028</option>
                                <option>2029</option>
                                <option>2030</option>
                                <option>2031</option>
                            </select>
                        </div>

                    </div>

                    <button>Click Here to Pay Now</button>

                    <p>To avoid being charged twice, only click the submit button once.</p>
                </div>

                <div class="product">
                    <h5>Postal Exam | Start Your New Career with the USPS Now</h5>
                    <img src="{{ asset($assetPath.'6/images/product.png', \Custom::secureUrl()) }}">
                </div>

                <div class="footnote">
                    <p><strong>Terms of Purchase:</strong></p>

                    <p>Your purchase will appear on your bank statement under the name “POSTALEXAM.US”.</p>
                    <p>Your current IP Address and other information has been recorded. All attempts at fraud will be prosecuted.</p>
                    <p>Postal Exam is provided by United States Postal Service.</p>
                    <p>Postal Exam reserves all rights.</p>
                    <p>All information submitted here is subject to www.postalexam.us privacy policy.</p>
                </div>

                {{ csrf_field() }}
            </form>

        </section>


    </main>
        @include($layoutDir.'.'.$version.'.footer')

@endsection

@section('footer')
    <div id="alert"></div>
    <script>
        $(document).ready(function(){
            $('.hint').popover({ trigger: "hover" });

            $('form').validate({
                rules : {
                    nameOnCard: 'required',
                    cardnumber : {
                        required: true,
                        minlength: 10,
                        number: true
                    },
                    cvc : {
                        required: true,
                        minlength: 3,
                        number: true
                    },
                    month : 'required',
                    year :'required'
                },
                messages : {
                    nameOnCard : 'Please enter the name that appears on the card.',
                    cardnumber : 'Please enter a valid card number.',
                    cvc : 'Please enter a valid CVC number.',
                    month : 'Please select month.',
                    year : 'Please select year.'
                }
            });
        });
    </script>
    <script src="{{ asset('/js/lib/raphael.js') }}"></script>
    <script src="{{ asset('/js/lib/color.jquery.js') }}"></script>
    <script src="{{ asset('/js/lib/jquery.usmap.js') }}"></script>
    <script src="{{ asset('/js/web.js') }}"></script>
@endsection