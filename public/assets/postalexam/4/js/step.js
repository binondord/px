function addEmail( event ) {

    var email = document.getElementById('email');

    email.value = event.value;
}


function nextStep( event ) {

    var step = event.id.split('-');

    var form = document.getElementById('form');


    if( Number(step[1]) < 4 ) {

        if(step[1] == 3) {
            var email = $('#addemail').val();
            $('#email').val(email);
            if(email == '') {

                $.growl.error({message: "Please enter your email address."});
            }else {
                $('.regular').slick("slickNext");
            }
        }else{
            $('.regular').slick("slickNext");
        }

        //$(".step-"+num).hide('slide',{direction:'right'},1000);

        //form.children[(num*1)].style.display = 'block';

        //$(".step-"+num +1).show('slide',{direction:'right'},1000);
        /*
        $( ".step-"+num +1).slideDown( "slow", function() {
            // Animation complete.
            console.log(' Animation complete.');
        });*/
        /*$( ".step-"+num ).slideUp( "slow", function() {

        });
        */
    } else {

        $(form).submit();
    }
}