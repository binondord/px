function addEmail( event ) {

    var email = document.getElementById('email');

    email.value = event.value;
}


function nextStep( event ) {
    console.log('nextstep');

    var step = event.id.split('-');

    var form = document.getElementById('form');


    if( Number(step[1]) < 4 ) {

        //form.children[Number(step[1])].style.display = 'block';
        var num = Number(step[1]);
        console.log('num: '+ num);

        /*$( ".step-"+num ).slideUp( "slow", function() {
            // Animation complete.

        });*/

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

        form.submit();
    }
}