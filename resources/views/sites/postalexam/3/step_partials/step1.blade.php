<fieldset class="step-1">
    <header>
        <h3>Good News! The USPS is Hiring in {{$state_name}}.</h3>
        <p>A basic eligibility is expected from all applicants by the United States Postal Service. Please fill the required information truthfully:</p>
    </header>
    <div class="fields">
        <div class="field">
            <label>Are you 18 years of age or older?</label>
            <select name="age">
                <option>Yes</option>
                <option>No</option>
            </select>
        </div>

        <div class="field">
            <label>Are you a high school graduate or have you completed a GED equivalent?</label>
            <select name="completed">
                <option>Yes</option>
                <option>No</option>
            </select>
        </div>

        <div class="field">
            <label>Are you a citizen of U.S. or a green card holder?</label>
            <select name="holder">
                <option>Yes</option>
                <option>No</option>
            </select>
        </div>
    </div>

    <div class="button" id="step-1" onclick="nextStep(this)"><span class="span">Confirm Your Eligibility Continue Now</span></div>
</fieldset>