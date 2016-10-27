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
                slickTrack.css('height','690px');
                break;
            case 2:
                slickTrack.css('height','806px');
                break;
            case 3:
                var isFormValid = $('#form').valid();
                if(!isFormValid){
                    slickTrack.css('height','1025px');
                }else {
                    slickTrack.css('height', '800px');
                }
                break;
            case 4:
                break;
        }

        var top = ($(window).scrollTop() || $("body").scrollTop());
        $("html, body").animate({ scrollTop: 0 }, top);

    } else {

        $(form).submit();
    }
}