@extends('layouts.default')

@section('styles')
    <link rel="stylesheet" type="text/css" media="screen" href="{{ asset('css/2/styles.css') }}">
    <link rel="stylesheet" type="text/css" media="screen" href="{{ asset('/slick-1.6.0/slick/slick.css') }}">
    <link rel="stylesheet" type="text/css" media="screen" href="{{ asset('/slick-1.6.0/slick/slick-theme.css') }}">
@endsection

@section('content')
    <main id="content">
        <section class="row-1">
            <div class="inner clear">
                <form id="form" action="" method="post">
                <style type="text/css">
                    html, body {
                        margin: 0;
                        padding: 0;
                    }

                    * {
                        box-sizing: border-box;
                    }

                    .slider {
                        /*width: 50%;*/
                        margin: 0px auto;
                    }

                    .slick-slide {
                        /*margin: 0px 20px;*/
                    }

                    .slick-prev:before,
                    .slick-next:before {
                        color: black;
                    }
                </style>
                <section class="regular slider">
                    <div>
                        <fieldset class="step-1 step">
                            <h3>Good News! The USPS is Hiring in {{ $state_name }}. Continue to next step.</h3>
                            <div class="fields">
                                <p>A basic eligibility is expected from all applicants by the United States Postal Service. Please fill the required information truthfully:</p>
                                <div class="field">
                                    <h5>Are you 18 years of age or older?</h5>
                                    <label>
                                        <input type="radio" name="age" value="yes" checked>
                                        Yes
                                    </label>
                                    <label>
                                        <input type="radio" name="age" value="no">
                                        No
                                    </label>
                                </div>

                                <div class="field">
                                    <h5>Are you a high school graduate or have you completed a GED equivalent?</h5>
                                    <label>
                                        <input type="radio" name="completed" value="yes" checked>
                                        Yes
                                    </label>
                                    <label>
                                        <input type="radio" name="completed" value="no">
                                        No
                                    </label>
                                </div>

                                <div class="field">
                                    <h5>Are you a citizen of U.S. or a green card holder?</h5>
                                    <label>
                                        <input type="radio" name="holder" value="yes" checked>
                                        Yes
                                    </label>
                                    <label>
                                        <input type="radio" name="holder" value="no">
                                        No
                                    </label>
                                </div>

                                <a class="button" id="step-1" onclick="nextStep(this)"><span class="icon">Confirm Your Eligibility Continue Now</span></a>
                            </div>
                        </fieldset>
                    </div>
                    <div>
                        <fieldset class="step-2 step">
                            <h3>Congratulations! You are eligible to work for the United States Post Office.</h3>
                            <div class="fields">
                                <p>Current entry level positions include window clerk, mail carrier, rural carrier, mail handler and mail processor. There is an exam that all applicants must pass before they can begin work for the USPS. It’s called the “Postal Battery Exam.”</p>
                                <div class="field">
                                    <h5>Have you taken 473 Battery Exam?</h5>
                                    <label>
                                        <input type="radio" name="battery473_done" value="yes">
                                        Yes
                                    </label>
                                    <label>
                                        <input type="radio" name="battery473_done" value="no" checked>
                                        No
                                    </label>
                                </div>

                                <div class="field">
                                    <h5>Have you taken 473-C Exam?</h5>
                                    <label>
                                        <input type="radio" name="c473_done" value="yes">
                                        Yes
                                    </label>
                                    <label>
                                        <input type="radio" name="c473_done" value="no" checked>
                                        No
                                    </label>
                                </div>

                                <div class="field">
                                    <h5>Have you taken 460 Battery Exam?</h5>
                                    <label>
                                        <input type="radio" name="battery460_done" value="yes">
                                        Yes
                                    </label>
                                    <label>
                                        <input type="radio" name="battery460_done" value="no" checked>
                                        No
                                    </label>
                                </div>

                                <a class="button" id="step-2" onclick="nextStep(this)"><span class="icon">Continue to Next Step</span></a>
                            </div>
                        </fieldset>
                    </div>
                    <div>
                        <fieldset class="step-3 step">
                            <h3>Good News! The USPS is Hiring in your location. Continue to next step.</h3>
                            <div class="fields">
                                <p>A passing score on the Postal Battery Exam is 70 but your goal should be to score in the 90′s. There are four sections to the exam. You will be tested on memory, number sequencing, coding and verbal comprehension. Your registration package includes everything you need to get started.</p>

                                <p>This includes a 200 page exam guide and several complete practice exams. Taking the practice exams in advance will give you a real advantage in the process – so be sure to do those first. There is a one time refundable fee of $39 for your registration materials and study guide.</p>

                                <p>Typically, you are placed in a position within 30 miles of where you live and on average starting salary ranges between $18/hr – $23/hr with benefits. Your pay can be much higher because the average full time postal employee makes just over $59,000 per year with benefits and overtime included.</p>

                                <div class="field">
                                    <label>Enter Your Email Below Now</label>
                                    <input type="text" id="addemail" name="email" placeholder="Enter Email Address" onkeypress="addEmail(this)">
                                </div>

                                <a class="button" id="step-3" onclick="nextStep(this)"><span class="icon">Continue to Next Step</span></a>
                            </div>
                        </fieldset>
                    </div>
                    <div>
                        <fieldset class="step-4 step">
                            <h3>Please fill out your information to complete your entrance.</h3>
                            <div class="fields">

                                <div class="field email">
                                    <label>Email Address:</label>
                                    <input type="text" name="email" id="email" value="">
                                </div>

                                <div class="field firstname">
                                    <label>First Name:</label>
                                    <input type="text" name="firstname" id="firstname" value="">
                                </div>

                                <div class="field lastname">
                                    <label>Last Name:</label>
                                    <input type="text" name="lastname" id="lastname" value="">
                                </div>

                                <div class="field phone">
                                    <label>Phone Number:</label>
                                    <input type="text" name="phone" id="phone" value="">
                                </div>

                                <div class="field city">
                                    <label>City:</label>
                                    <input type="text" name="city" id="city" value="">
                                </div>

                                <div class="field state">
                                    <label>State:</label>
                                    <select name="state">
                                        @foreach($states as $abbrev => $state)
                                            <option value="{{ $abbrev }}">{{ $state }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="field country">
                                    <label>Country:</label>
                                    <select name="country" id="country">
                                        <option value="USA">United States</option>
                                        @foreach($countries as $abbrev => $country)
                                            <option value="{{ $abbrev }}">{{ $country }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="field zip">
                                    <label>Zip:</label>
                                    <input type="text" name="zip" id="zip" value="">
                                </div>


                                <div class="field birhtyear">
                                    <label>Birth Year:</label>
                                    <select name="birthyear" id="birthyear">
                                        @for($i=1911; $i<= date('Y')-18; $i++)
                                            <option>{{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>

                                <a class="button" id="step-4" onclick="nextStep(this)"><span class="icon">Send My Exam Kit</span></a>
                            </div>
                        </fieldset>
                    </div>
                </section>

                    {{ csrf_field() }}
                </form>
            </div>
        </section>
        <section class="row-2">
            <div class="inner clear">
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
                    <ul class="lists">
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
            </div>
        </section>
        <section class="row-3">
            <div class="inner clear">
                <h2>Minimum eligibility required to meet the criteria for post office career</h2>
                <ul class="lists">
                    <li>- Should be minimum 18 years old</li>
                    <li>- Only a U.S. citizen or a green card holder can apply.</li>
                </ul>
                <p>Do you meet the above two criteria? Wow!! You may qualify for the positions with the United States Postal Service. To check complete eligibility, please follow the above steps.</p>
            </div>
        </section>

    </main>
@endsection

@section('footer')
    @parent

    <script src="{{ asset('/js/2/step.js') }}"></script>


    {{-- Html::script('/bower_components/slick-carousel/slick/slick.js')  --}}
    {!! Html::script('/slick-1.6.0/slick/slick.js')  !!}

    <script type="text/javascript">
        $(document).ready(function() {
            $(".regular").slick({
                arrows: false,
                infinite: false,
                rtl : false
            });
        });
    </script>
@endsection