$('#pin').keyup(function(){
    let pin = $('#pin').val();
    if(pin.match(/^[0-9]+$/)){
        $.ajax({
            url: 'packages/events/login.php',
            type: 'POST',
            data: {
                pin2: pin
            },
            success: function(data){
                if(data == 'success'){
                    window.location.href = 'ingresos.php';
                }
            }
        });

    } else {
        $('#pin').val(pin.replace(/[^0-9]/g, ''));
    }
});