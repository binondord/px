<div class="form-cotent-wrapper" id="step-1">
    <div class="form-content-headeer">
        <h1>Good News! The USPS is Hiring in {{$state_name}}.</h1>
    </div>
    <div class="form-inner-wrap clearfix">
        <div class="col-xs-12 col-md-push-1 col-md-10">
            <p>A basic eligibility is expected from all applicants by the United States Postal Service. Please fill the required information truthfully.</p>
            <div class="form-group">
                <h3>Are you 18 years of age or older?</h3>
                <div class="radio-inputs-wrap">
                    <input type="radio" name="age" checked >
                    <label for="c1"><span></span></label>
                    <span>Yes</span>
                </div>
                <div class="radio-inputs-wrap">
                    <input type="radio" name="age" value="no">
                    <label for="c2"><span></span></label>
                    <span>No</span>
                </div>
            </div>
            <div class="form-group">
                <h3>Are you a high school graduate or have you completed a GED equivalent?</h3>
                <div class="radio-inputs-wrap">
                    <input type="radio" name="completed" checked>
                    <label for="c3"><span></span></label>
                    <span>Yes</span>
                </div>
                <div class="radio-inputs-wrap">
                    <input type="radio" name="completed" value="no">
                    <label for="c4"><span></span></label>
                    <span>No</span>
                </div>
            </div>
            <div class="form-group">
                <h3>Are you a citizen of U.S. or a green card holder?</h3>
                <div class="radio-inputs-wrap">
                    <input type="radio" name="holder" checked>
                    <label for="c5"><span></span></label>
                    <span>Yes</span>
                </div>
                <div class="radio-inputs-wrap">
                    <input type="radio" name="holder" value="no">
                    <label for="c6"><span></span></label>
                    <span>No</span>
                </div>
            </div>
            <div class="form-group form-footer-group text-center">
                <div class="button" id="step-1" onclick="nextStep(this)"><span class="btn-arrow">Confirm Eligibility</span></div>
            </div>
        </div>
    </div>
</div><!-- end of form-cotent-wrapper -->