@extends('layouts.default')

@section('content')
    <main id="content">
        <section class="row-1">
            <div class="inner clear">
                <form>
                    <h2>
                        <span class="bold">FINAL STEP</span> - Activate Your Account Below.
                    </h2>

                    <div class="col left">
                        <div class="fields">
                            <div class="field input">
                                <span>1. Amount</span>
                                <label>Amount (USD $)</label>
                                <input type="text"/>
                            </div>
                        </div>
                        <div class="fields">
                            <span>2. Billing Information</span>
                            <div class="field input">
                                <label>Amount (USD $)</label>
                                <input type="text"/>
                            </div>
                        </div>
                        <div class="fields">
                            <span>3. Payment Information</span>
                            <div class="field input">
                                <input type="text" name="cardnumber"/>
                            </div>
                            <div class="field input">
                                <input type="text" name="cardnumber"/>
                            </div>
                        </div>
                    </div>

                    <div class="col right">
                        <h3>Terms of Purchase</h3>
                        <p>
                            <ol>
                                <li>Your purchase will appear on your bank statement under the name "POSTALEXAM.US</li>

                                <li>Your current IP Address and other information has been recorded. All attempts at fraud will be prosecuted.</li>

                                <li>Postal Exam is provided by United States Postal Service.</li>

                                <li>Postal Exam reserves all rights.</li>

                                <li>All information submitted here is subjected to <a href="https://www.postalexam.us.com">Postal Exam</a> privacy policy</li>
                            </ol>
                        </p>
                        <div>
                            <div class="note"><span class="icon">To avoid being charged twice, only click the button once.</span></div>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </main>
@endsection