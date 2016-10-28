

function addEmail( event ) {

    var email = document.getElementById('email');

    email.value = event.value;
}


function nextStep( event ) {

    var step = event.id.split('-');

    var form = document.getElementById('form');

    var num = Number(step[1]);
    var slickTrack = $('.slick-track');

    if( num < 4 ) {
        if(num == 3) {
            var email = $('#addemail').val();
            $('#email').val(email);

            var isValid = $('#addemail').valid();

            if(isValid)
            {
                $('.regular').slick("slickNext");
                $(window).scrollTop();
            }
        }else{
            $('.regular').slick("slickNext");
            $(window).scrollTop();
        }



        switch(num){
            case 1:
                //slickTrack.css('height','690px');
                break;
            case 2:
                slickTrack.css('height','683px');
                break;
            case 3:
                var isValid = $('#addemail').valid();
                if(!isValid){
                 slickTrack.css('height','700px');
                 }
                if(isValid) {
                    /*
                     var isFormValid = $('#form').valid();
                     if (!isFormValid) {
                     slickTrack.css('height', '785px');
                     } else {
                     slickTrack.css('height', '785px');
                     }*/
                    slickTrack.css('height', '785px');
                }
                break;
        }

        var top = ($(window).scrollTop() || $("body").scrollTop());
        $("html, body").animate({ scrollTop: 0 }, top);

    } else {

        $(form).submit();
    }
}

$(document).ready(function() {
    $('#phone').mask('(999)999-9999');

    $.validator.addMethod(
        "US_Phone",
        function(value, element){
            value = value.replace(/_/g,"");
            if(value.length >= 10)
            {
                var val = value.substring(1,2);
                if(val != 1 && val != "_" && val > 1){
                    return true;
                }else{
                    return false;
                }
            }else{
                return false;
            }
        },
        'Invalid US Phone'
    );

    $('form').validate({
        rules : {
            email1 :{
                email: true,
                required: true
            },
            email : {
                email: true,
                required: true
            },
            firstname: 'required',
            lastname : 'required',
            phone : {
                required: true,
                minlength: 10,
                US_Phone: true
            },
            city : 'required',
            state :'required',
            country : 'required',
            zip : {
                required : true,
                minlength: 3,
                maxlength: 5
            },
            birthyear : 'required'
        },
        messages : {
            email1 : 'Please enter a valid email address.',
            email : 'Please enter a valid email address.',
            firstname : 'Please enter your First Name.',
            lastname : 'Please enter your Last Name.',
            phone : 'Please enter a valid phone number.',
            city: 'Please enter your city.',
            zip: 'Please enter a valid zip code.',
            birthyear : 'Please enter your birth year.'
        }
    });
});