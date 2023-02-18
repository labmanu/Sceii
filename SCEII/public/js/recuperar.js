function autoTab(field1, len, field2) {
    if (document.getElementById(field1).value.length == len) {
        document.getElementById(field2).focus();
    }
    
}

$('#btnCorreo').on('click', function() { // . -> Llamada por id
    var email = correo.value;
    $.ajax({
        url: "https://labmanufactura.net/api-sceii/v1/routes/recuperacionCuenta.php?correo="+email,
        type: 'GET',
        dataType: 'JSON',
        async: true,
        success: function(response) {
            //alert(response.message);
            window.location.href = "recuperar/validar?correo="+email;
        },
        error: function(error) {
            console.log(error);
            Swal.fire({
                background: '#131414',
                color: 'white',
                icon: 'error',
                title: 'Error al validar el código',
                text: error.message,
            })
        }
    });
});

$('#btnConfirmar').on('click', function() { // . -> Llamada por id
    var formData = {
        correo: correo.value,
        clave: clave.value
    };
    $.ajax({
        url: "https://labmanufactura.net/api-sceii/v1/routes/recuperacionCuenta.php",
        type: 'PATCH',
        dataType: 'JSON',
        data: JSON.stringify(formData),
        async: true,
        success: function(response) {
            Swal.fire({
                background: '#131414',
                color: 'white',
                icon: 'success',
                title: 'uwu',
                text: response.message,
            }).then((result) => {
                window.location.href = "https://labmanufactura.net/SCEII";
            })
        },
        error: function(error) {
            console.log(error);
            Swal.fire({
                background: '#131414',
                color: 'white',
                icon: 'error',
                title: 'Error al cambiar la contraseña',
                text: error.message,
            })
        }
    });
});