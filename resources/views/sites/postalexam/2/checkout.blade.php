@extends($layoutDir.'.default')

@section('styles')
    @parent
    <link rel='stylesheet' type='text/css' href='//fonts.googleapis.com/css?family=Open+Sans:400,600' />
    <link href="{{ asset($assetPath.$version.'/css/style.css', \Custom::secureUrl()) }}" rel="stylesheet" />
@endsection

@section('bodyAttr') class=v{{$version}} @endsection

@section('content')
    <?php
    $state_name = "California";
    ?>

    @include($layoutDir.'.'.$version.'.header')

    <main id="content">
        <section class="row-1 clear">
            <form action="" method="POST" id="form">

                <h2>Let’s continue and register here for the Postal Exam Success Kit</h2>
                <p><strong><span class="red">Note:</span> A deposit of $39.99 is needed for Postal Exam Success Kit which is fully refundable.</strong></p>

                <p>If you are not able to clear the exam, we will refund the complete deposit.</p>

                <fieldset id="payment">
                    <h3>Payment Details</h3>

                    <div class="field cards">
                        <label>Card Accepted</label>
                        <img src="../images/cards.png">
                    </div>

                    <div class="field cardnumber">
                        <label>Name on card:</label>
                        <input type="text" name="nameOnCard" id="nameOnCard" value="">
                    </div>

                    <div class="field cardnumber">
                        <label>Card Number:</label>
                        <input type="text" name="cardnumber" id="cardnumber" value="">
                    </div>

                    <div class="field cvc">
                        <label>CVC:</label>
                        <input type="text" name="firstname" id="firstname" value="">
                    </div>

                    <div class="field expiration clear">
                        <label>Expiration (MM/YYYY):</label>

                        <div class="date">
                            <select name="month">
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
                            <select name="year" id="year">
                                <option>2017</option>
                                <option>2018</option>
                                <option>2019</option>
                                <option>2020</option>
                            </select>
                        </div>

                    </div>


                    <p>Safe and secure SSL encrypted payment.</p>
                </fieldset>
                {{ csrf_field() }}
            </form>

        </section>

        <section class="row-2 clear">
            <div class="col left">
                <h2>Are you aware of</h2>
                <p>Entry level salary for Post office jobs is $20 per hour. Unbelievable benefits are provided by USPS jobs which include.</p>
                <ul class="lists">
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

    <div id="alert"></div>
    <script src="{{ asset('/js/lib/raphael.js') }}"></script>
    <script src="{{ asset('/js/lib/color.jquery.js') }}"></script>
    <script src="{{ asset('/js/lib/jquery.usmap.js') }}"></script>
    <script src="{{ asset('/js/web.js') }}"></script>
@endsection