@extends('layouts.default')

@section('styles')
    <link rel="stylesheet" type="text/css" media="screen" href="{{ asset('/css/styles.css') }}">
    <link rel="stylesheet" type="text/css" media="screen" href="{{ asset('/css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" media="screen" href="{{ asset('/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" media="screen" href="{{ asset('/css/jquery.fancybox.css') }}">
    <link rel="stylesheet" type="text/css" media="screen" href="{{ asset('/css/style.css') }}">
@endsection

@section('content')
    <div class="outer-wrapper">
        <div class="content-sub-wrapper">
            <div class="container">
                <div class="sub-content">
                    <div class="heading-panel">
                        <div class="text-center">
                            <h2 class="sub-heading-title">
                                <span>FINAL STEP</span> - Activate Your Account Below.
                            </h2>
                        </div>
                    </div>
                    <div class="content-wraper">
                        <div class="content-inner-wrap" id="checkout">
                            <div class="row">
                                <div class="col-xs-12 col-md-6">
                                    <div class="box-form-wrap clearfix" id="checkout-form">
                                        <form>
                                            <div class="box-form-item" id="payments-info">
                                                <div class="box-heading clearfix">
                                                    <h2>1. Amount</h2>
                                                </div>

                                                <div class="box-form-inputs clearfix">
                                                    <div class="">
                                                        <span class="txtlabel col-md-4">Amount (USD $)</span>
                                                        <div class="col-md-8 form-group box-input-name">
                                                            $39.00
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="box-heading clearfix">
                                                    <h2>2. Billing Information</h2>
                                                </div>

                                                <div class="box-form-inputs clearfix">
                                                    <div class="">
                                                        <span class="txtlabel col-md-3">First Name</span>
                                                        <div class="col-md-9 form-group box-input-name">
                                                            <input type="text" placeholder="" name="first">
                                                        </div>
                                                    </div>
                                                    <div class="">
                                                        <span class="txtlabel col-md-3">Last Name</span>
                                                        <div class="col-md-9 form-group box-input-name">
                                                            <input type="text" placeholder="" name="last">
                                                        </div>
                                                    </div>
                                                    <div class="">
                                                        <span class="txtlabel col-md-3">Email Address</span>
                                                        <div class="col-md-9 form-group box-input-name">
                                                            <input type="text" placeholder="" name="email">
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="box-heading clearfix">
                                                    <h2>3. Payment Information</h2>
                                                </div>

                                                <div class="box-form-inputs clearfix">
                                                    <div class="form-group box-input-name">
                                                        <input type="text" placeholder="Card Number">
                                                    </div>
                                                    <div class="form-group box-input-name">
                                                        <input type="text" placeholder="Cardholder Name">
                                                    </div>
                                                    <div class="form-group-expiration clearfix">
															<span class="exp-label-wrap">
																<label>Expiration Date</label>

																<span class="step-card"><img src="images/card-5.png"></span>
															</span>
                                                        <div class="expiration-form-inputs clearfix">
																<span class="exp-date col-xs-12 col-sm-4">
																	<select>
                                                                        <option>01(Jan)</option>
                                                                        <option>02(Feb)</option>
                                                                        <option>03(Mar)</option>
                                                                        <option>04(Apr)</option>
                                                                        <option>05(May)</option>
                                                                        <option>06(Jun)</option>
                                                                        <option>07(Jul)</option>
                                                                        <option>08(Aug)</option>
                                                                        <option>09(Sep)</option>
                                                                        <option>10(Oct)</option>
                                                                        <option>11(Nov)</option>
                                                                        <option>12(Dec)</option>
                                                                    </select>
																</span>
																<span class="exp-yr col-xs-12 col-sm-4">
																	<select>
                                                                        <option>2016</option>
                                                                        <option>2015</option>
                                                                        <option>2014</option>
                                                                        <option>2013</option>
                                                                        <option>2012</option>
                                                                        <option>2011</option>
                                                                        <option>2010</option>
                                                                    </select>
																</span>
																<span class="exp-cvv col-xs-12 col-sm-4">
																	<input type="text" placeholder="CVV">
																</span>
                                                        </div>
                                                    </div>
                                                </div>

                                                {{--<div class="secured clearfix">
                                                    <input type="checkbox" />
														<span>
														By clicking “Continue,” I am providing my electronic signature authorizing PostalExam to charge my credit card as described, until I cancel. I understand that I will be charged $22.86 every month until I cancel my account, which can be done at any time, hassle free by contacting PostalExams’s US-based member care center.
														</span>
                                                </div>--}}
                                                <div class="footer-form-group clearfix">
                                                    <button class="button" type="button" value="">Click here to pay now</button>
                                                </div>
                                                <div class="box-guarantee-wrap">
                                                    <img src="images/guarantee.png">
                                                </div>
                                            </div><!-- end of box-form-item -->
                                        </form>
                                    </div>

                                </div>
                                <div class="col-xs-12 col-md-6">
                                    <div class="content-form-text">
                                        {{--<p>If you ever feel dissatisfied with PostalExam, simply give our Customer Support a call at 1-123-456-7890, available 24/7. We’re available seven days a week and we look forward to serving you.</p>--}}

                                        <div class="text-center">
                                            <img src="images/pe_book.png" width="200px">
                                        </div>

                                        <h3 class="content-form-title">Terms of Purchase</h3>
                                        <ol>
                                            <li>Your purchase will appear on your bank statement under the name "POSTALEXAM.US".</li>

                                            <li>Your current IP Address and other information has been recorded. All attempts at fraud will be prosecuted.</li>

                                            <li>Postal Exam is provided by United States Postal Service.</li>

                                            <li>Postal Exam reserves all rights.</li>

                                            <li>All information submitted here is subjected to <a href="https://www.postalexam.us.com">Postal Exam</a> privacy policy</li>
                                        </ol>
                                        <h2 class="content-form-title">Maybe You’ve heard of us:</h2>
                                        <p><img class="img-responsive" src="images/seen-on.png"></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- end of content-sub-wrapper -->
        <div class="footer-sub-wrap"></div><!-- end of footer -->
    </div>
@endsection


@section('footer')
    @parent

    <script src="{{ asset('/js/bootstrap.min.js') }}"></script>



@endsection