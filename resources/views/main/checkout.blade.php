@extends('layouts.default')

@section('styles')
    <link rel="stylesheet" type="text/css" media="screen" href="{{ asset('/css/styles.css') }}">
    <link rel="stylesheet" type="text/css" media="screen" href="{{ asset('/css/font-awesome.min.css') }}">
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
                                    &nbsp;
                                </div>
                                <div class="col-xs-12 col-md-6">
                                    <div class="box-form-wrap clearfix" id="checkout-form">
                                        <form>
                                            <div class="box-form-item" id="payments-info">
                                                <div class="box-heading clearfix">
                                                    <h2>1. Amount</h2>
                                                </div>

                                                <div class="box-form-inputs padding-none clearfix">
                                                    <label class="field">
															<span class="col-xs-12 col-sm-8">
																<span class="col-radio">
																	<input type="radio" name="package" value="1" id="recommended">
																</span>
																<span class="col-label">
																	<strong>RECOMMENDED</strong>
																	<small>1 month of UNLIMITED access</small>
																</span>
															</span>
															<span class="col-xs-12 col-sm-4 price">
																<strong>$22.95/mo</strong>
																<small class="popular">Most Popular</small>
															</span>
                                                    </label>
                                                    <label class="field">
															<span class="col-xs-12 col-sm-8">
																<span class="col-radio">
																	<input type="radio" name="package" value="1" id="recommended">
																</span>
																<span class="col-label">
																	<strong>MODERATE USERS</strong>
																	<small>3 months of UNLIMITED access</small>
																</span>
															</span>
															<span class="col-xs-12 col-sm-4 price">
																<strong>$14.95/mo</strong>
																<small>($44.85 today)</small>
															</span>
                                                    </label>
                                                </div>

                                                <div class="box-heading clearfix">
                                                    <h2>2. Billing Information</h2>
                                                </div>

                                                <div class="box-form-inputs clearfix">
                                                    <div class="input">
                                                        <label>First Name</label>
                                                        <div class="form-group box-input-name">
                                                            <input type="text" placeholder="First Name">
                                                        </div>
                                                    </div>
                                                    <div class="input">
                                                        <label>Last Name</label>
                                                        <div class="form-group box-input-name">
                                                            <input type="text" placeholder="Last Name">
                                                        </div>
                                                    </div>
                                                    <div class="input">
                                                        <label>Email Address</label>
                                                        <div class="form-group box-input-name">
                                                            <input type="text" placeholder="Email Address">
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
                                                                        <option>09(Sep)</option>
                                                                        <option>10(Sep)</option>
                                                                        <option>11(Sep)</option>
                                                                        <option>12(Sep)</option>
                                                                        <option>13(Sep)</option>
                                                                        <option>14(Sep)</option>
                                                                        <option>15(Sep)</option>
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

                                                <div class="secured clearfix">
                                                    <input type="checkbox" />
														<span>
														By clicking “Continue,” I am providing my electronic signature authorizing PostalExam to charge my credit card as described, until I cancel. I understand that I will be charged $22.86 every month until I cancel my account, which can be done at any time, hassle free by contacting PostalExams’s US-based member care center.
														</span>
                                                </div>
                                                <div class="footer-form-group clearfix">
                                                    <input type="button" value="Click here to pay now">
                                                </div>
                                            </div><!-- end of box-form-item -->
                                        </form>
                                    </div>
                                    <div class="box-guarantee-wrap">
                                        <img src="images/guarantee.png">
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