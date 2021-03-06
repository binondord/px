<fieldset class="step-4">
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
                <option>Select Your State</option>
                @foreach($states as $abbrev => $state_raw)
                    <option @if(strtoupper($state) == $abbrev) selected="selected" @endif value="{{ $abbrev }}">{{ $state_raw }}</option>
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
                <option value="">- Select -</option>
                @for($i=date('Y')-18; $i>= 1911  ; $i--)
                    <option>{{ $i }}</option>
                @endfor
            </select>
        </div>

        <div class="action">
            <span class="button" id="step-4" onclick="nextStep(this)">Send My Exam Kit</span>
        </div>

    </div>

</fieldset>