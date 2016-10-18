@extends($layoutDir.'.default')

@section('styles')
    @parent
    <link rel='stylesheet' type='text/css' href='//fonts.googleapis.com/css?family=Open+Sans:400,600' />
    <link href="{{ asset($assetPath.$version.'/css/style.css', \Custom::secureUrl()) }}" rel="stylesheet" />

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

                form.children[Number(step[1])].style.display = 'block';

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

                <fieldset class="step-1">
                    <header>
                        <h3>Good News! The USPS is Hiring in your location. Continue to next step.</h3>
                        <p>A basic eligibility is expected from all applicants by the United States Postal Service. Please fill the required information truthfully:</p>
                    </header>
                    <div class="fields">
                        <div class="field">
                            <label>Are you 18 years of age or older?</label>
                            <select name="">
                                <option>Yes</option>
                                <option>No</option>
                            </select>
                        </div>

                        <div class="field">
                            <label>Are you a high school graduate or have you completed a GED equivalent?</label>
                            <select name="">
                                <option>Yes</option>
                                <option>No</option>
                            </select>
                        </div>

                        <div class="field">
                            <label>Are you a citizen of U.S. or a green card holder?</label>
                            <select name="">
                                <option>Yes</option>
                                <option>No</option>
                            </select>
                        </div>
                    </div>

                    <div class="button" id="step-1" onclick="nextStep(this)"><span class="span">Confirm Your Eligibility Continue Now</span></div>
                </fieldset>

                <fieldset class="step-2">
                    <header>
                        <h3>Congratulations! You are eligible to work for the United States Post Office.</h3>
                        <p>Current entry level positions include window clerk, mail carrier, rural carrier, mail handler and mail processor. There is an exam that all applicants must pass before they can begin work for the USPS. It’s called the “Postal Battery Exam.”</p>
                    </header>

                    <div class="fields">
                        <div class="field">
                            <label>Have you taken 473 Battery Exam?</label>
                            <select name="">
                                <option>Yes</option>
                                <option>No</option>
                            </select>
                        </div>

                        <div class="field">
                            <label>Have you taken 473-C Exam?</label>
                            <select name="">
                                <option>Yes</option>
                                <option>No</option>
                            </select>
                        </div>

                        <div class="field">
                            <label>Have you taken 460 Battery Exam?</label>
                            <select name="">
                                <option>Yes</option>
                                <option>No</option>
                            </select>
                        </div>

                    </div>

                    <div class="button" id="step-2" onclick="nextStep(this)"><span class="span">Continue to Next Step</span></div>

                </fieldset>

                <fieldset class="step-3">
                    <h2>Some Information About the Postal Battery Exam</h2>
                    <div class="fields">
                        <p>A passing score on the Postal Battery Exam is 70 but your goal should be to score in the 90′s. There are four sections to the exam. You will be tested on memory, number sequencing, coding and verbal comprehension. Your registration package includes everything you need to get started.</p>

                        <p>This includes a 200 page exam guide and several complete practice exams. Taking the practice exams in advance will give you a real advantage in the process – so be sure to do those first. There is a one time refundable fee of $39 for your registration materials and study guide.</p>

                        <p>Typically, you are placed in a position within 30 miles of where you live and on average starting salary ranges between $18/hr – $23/hr with benefits. Your pay can be much higher because the average full time postal employee makes just over $59,000 per year with benefits and overtime included.</p>

                        <div class="field">
                            <label>Enter Your Email Below Now</label>
                            <input type="text" id="addemail" placeholder="Enter Email Address" onkeypress="addEmail(this)">
                        </div>
                    </div>

                    <div class="button" id="step-3" onclick="nextStep(this)"><span class="span">Continue to Next Step</span></div>

                </fieldset>


                <fieldset class="step-4">
                    <h2>Please fill out your information to complete your entrance.</h2>
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
                                <option>Select Your State</option>
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
                    </div>

                    <div class="button" id="step-4" onclick="nextStep(this)"><span class="span">Send My Exam Kit</span></div>

                </fieldset>

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

    <div id="alert"></div>
    <script src="{{ asset('/js/lib/raphael.js') }}"></script>
    <script src="{{ asset('/js/lib/color.jquery.js') }}"></script>
    <script src="{{ asset('/js/lib/jquery.usmap.js') }}"></script>
    <script src="{{ asset('/js/web.js') }}"></script>
@endsection