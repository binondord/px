@extends($layoutDir.'.default')

@section('styles')
    @parent
    <link rel='stylesheet' type='text/css' href='//fonts.googleapis.com/css?family=Open+Sans:400,600' />
    <link href="{{ asset($assetPath.'4/css/style.css', \Custom::secureUrl()) }}" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" media="screen" href="{{ asset('/slick-1.6.0/slick/slick.css') }}">
    <link rel="stylesheet" type="text/css" media="screen" href="{{ asset('/slick-1.6.0/slick/slick-theme.css') }}">
    {{-- Html::style('/bower_components/bootstrap/dist/css/bootstrap.min.css')  --}}
    {!! Html::style(asset($assetPath.$version.'/css/bootstrap.min.css'))  !!}
@endsection

@section('bodyAttr') class=v{{$version}} @endsection

@section('content')
    <?php
    $state_name = "California";
    ?>
    @include($layoutDir.'.'.$version.'.header')

    <div class="container">
        <form action="/v{{$version}}/checkout" method="POST" id="form">
            <div class="form-cotent-wrapper" id="step-5">
                <div class="form-content-headeer">
                    <h1>Let’s continue and register here for the Postal Exam Kit</h1>
                </div>
                <div class="form-inner-wrap clearfix">
                    <div class="col-xs-12 col-md-push-1 col-md-10">
                        <p><strong>Note: A depost of $39.99 is needed for Postal Exam Kit which is fully refundable.</strong> If you are not able to clear the exam, we will refund the complete deposit.</p>

                        <div class="form-group">
                            <div class="form-group">
                                <div class="row">
                                    <h2 class="col-xs-12 col-md-10">Payment Details <span class="pull-right"><img class="img-responsive" src="{{ asset($assetPath.$version.'/images/card.png', \Custom::secureUrl()) }}"></span></h2>
                                    <div class="col-xs-12 col-md-3">
                                        <label>Name on card</label>
                                    </div>
                                    <div class="col-xs-12 col-md-7">
                                        <input type="text" name="nameOnCard"/>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-xs-12 col-md-3">
                                        <label>Card Number</label>
                                    </div>
                                    <div class="col-xs-12 col-md-7">
                                        <input name="cardnumber" type="text"/>

                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-xs-12 col-md-3">
                                        <label>CVC <a tabindex="0" aria-haspopup="true" class="hint pull-right" role="button" data-toggle="popover" data-trigger="hover" data-placement="auto right" data-container="body" data-html="true" title="" data-content="The <i>Security Code</i> is the last 3 digits on the back of the card in
                                   the signature area.<br/><br/> The <i>American Express Security Code</i> is printed on
                                   the front of the card, above and to the right of the embossed card number." data-original-title="<strong>Security Code</strong>">
                                                <i class="glyphicon glyphicon-question-sign" aria-hidden="true"></i>
                                            </a></label>
                                    </div>
                                    <div class="col-xs-12 col-md-7">
                                        <input type="text" name="cvc"/>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group expiration-date">
                                <div class="row">
                                    <div class="col-xs-12 col-md-3">
                                        <label>Expiration Date</label>
                                    </div>
                                    <div class="col-xs-12 col-md-7">
                                        <div class="row">
                                            <div class="col-xs-6">
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
                                            </div>
                                            <div class="col-xs-1 separator"><span> / </span></div>
                                            <div class="col-xs-5">
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
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group form-footer-group text-center clearfix">
                            <div class="col-md-7 col-md-push-3">
                                <button type="submit" class="button" id="step-5"/><span class="btn-arrow">Register</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- end of form-cotent-wrapper -->

            {{ csrf_field() }}
        </form>
        <div class="bullets-info-wrap clearfix">
            <div class="col-xs-12 col-md-push-1 col-md-10">
                <div class="row" id="bullets-row-1">
                    <div class="bullet-left-info col-xs-12 col-md-6">
                        <h2 class="heading-title">Are you aware of</h2>
                        <p>Entry level salary for Post Office jobs is $20 per hour. Unbelievable benefits are provided by USPS jobs which include:</p>
                        <ul class="bullet-check-bg">
                            <li>Full Centralized Benefits</li>
                            <li>Training with Pay</li>
                            <li>Vacations with Pay</li>
                            <li>Experience is not mandatory</li>
                        </ul>
                    </div>
                    <div class="bullet-right-info col-xs-12 col-md-6">
                        <h2 class="heading-title">Types of Post Offered</h2>
                        <div class="row">
                            <div class="col-xs-12 col-md-6">
                                <ul class="bullet-check-bg">
                                    <li>Mail Carrier</li>
                                    <li>Mail Processor</li>
                                    <li>Clerk Typist</li>
                                    <li>Garageman</li>
                                    <li>Corporate Positions</li>
                                </ul>
                            </div>
                            <div class="col-xs-12 col-md-6">
                                <ul class="bullet-check-bg">
                                    <li>Mail Handler</li>
                                    <li>Window Clerk</li>
                                    <li>Custodian</li>
                                    <li>Tractor Driver</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row" id="bullets-row-2">
                    <div class="col-xs-12">

                        <h2 class="heading-title">Minimum eligibility required are:</h2>
                        <ul class="bullet-check-bg">
                            <li>Should be minimum 18 years old.</li>
                            <li>Only a U.S. citizen or a green card holder can apply.</li>
                        </ul>
                        <p>Do you meet the above two criteria? Wow! You may qualify for the positions with the United States Postal Service. To check complete eligibility, please follow the above steps.</p>
                    </div>
                </div>
            </div>
        </div><!-- end of bullets-info-wrap -->
        @include($layoutDir.'.'.$version.'.footer')
    </div><!-- end of container -->
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