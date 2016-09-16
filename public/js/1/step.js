function addEmail( event ) {

    var email = document.getElementById('email');

    email.value = event.value;
}


function nextStep( event ) {

    var step = event.id.split('-');

    var form = document.getElementById('form');


    for( var i = 0; i < form.children.length; i++ ) {

        form.children[i].style.display = 'none';
    }

    var nextstep = (step[1]*1) +1;
    document.location.href = '/v1/step'+nextstep;


    if( Number(step[1]) < 4 ) {

    //    form.children[Number(step[1])].style.display = 'block';

    } else {

        form.submit();
    }
}