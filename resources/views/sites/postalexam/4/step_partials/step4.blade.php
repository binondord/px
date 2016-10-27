<div class="form-cotent-wrapper" id="step-4">
    <div class="form-content-headeer">
        <h1>Please fill out your information to complete your entrance.</h1>
    </div>
    <div class="form-inner-wrap clearfix">
        <div class="col-xs-12 col-md-push-1 col-md-10">
            <div class="form-group">
                <div class="row">
                    <div class="col-md-3">
                        <label>Email Address</label>
                    </div>
                    <div class="col-md-7">
                        <input id="email" name="email" type="text"/>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-3">
                        <label>First Name</label>
                    </div>
                    <div class="col-md-7">
                        <input name="firstname" type="text"/>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-3">
                        <label>Last Name</label>
                    </div>
                    <div class="col-md-7">
                        <input name="lastname" type="text"/>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-3">
                        <label>Phone Number</label>
                    </div>
                    <div class="col-md-7">
                        <input type="text" name="phone" id="phone" placeholder="(555)555-5555">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-3">
                        <label>City</label>
                    </div>
                    <div class="col-md-7">
                        <input name="city" type="text"/>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-3">
                        <label>State</label>
                    </div>
                    <div class="col-md-7">
                        <select name="state">
                            @foreach($states as $abbrev => $state_raw)
                                <option @if(strtoupper($state) == $abbrev) selected="selected" @endif value="{{ $abbrev }}">{{ $state_raw }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-3">
                        <label>Country</label>
                    </div>
                    <div class="col-md-7">
                        <select name="country" id="country">
                            <option value="USA">United States</option>
                            @foreach($countries as $abbrev => $country)
                                <option value="{{ $abbrev }}">{{ $country }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-3">
                        <label>Zip Code</label>
                    </div>
                    <div class="col-md-7">
                        <input type="text" name="zip" id="zip" value="">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-3">
                        <label>Birth Year</label>
                    </div>
                    <div class="col-md-7">
                        <select name="birthyear" id="birthyear">
                            <option value="">- Select -</option>
                            @for($i=1911; $i<= date('Y')-18; $i++)
                                <option>{{ $i }}</option>
                            @endfor
                        </select>
                    </div>
                </div>
            </div>

            <div class="form-group form-footer-group text-center">
                <div class="col-md-7 col-md-push-3">
                    <div class="button" id="step-4" onclick="nextStep(this)"><span class="btn-arrow">Send My Exam Kit</span></div>
                </div>
            </div>
        </div>
    </div>
</div><!-- end of form-cotent-wrapper -->