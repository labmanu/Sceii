var barra = false;
var res = screen.width;

var ms = document.getElementById("mySidebar");
var mn = document.getElementById("main");
var lb = document.getElementById("lab");

const baseUrl = "https://labmanufactura.net/api-sceii/v1/routes/laboratorio.php"
// Si la resolucion es mas que la de un celular, se abre la navbar
if (res > 767) {
    side()
}

function side() {
    if (barra) {
        closeNav();
        barra = false;
    } else {
        openNav();
        barra = true;
    }
}


function openNav() {
    if (ms) {
        ms.classList.add("openside");
    }
    if (mn) {
        mn.classList.add("openmain");
    }
    /*if (il) {
        il.style.paddingTop = "5%";
    }*/
}

function closeNav() {
    if (ms) {
        ms.classList.remove("openside");
    }
    if (mn) {
        mn.classList.remove("openmain");
    }
    /*if (il) {
        il.style.paddingTop = "0%";
    }*/
}

$('.logout').on('click', function() {
    if (res < 767)
        side()
    Swal.fire({
        background: '#131414',
        color: 'white',
        title: 'Cerrar Sesión',
        icon: 'info',
        text: "¿Seguro que quieres cerrar sesión?",
        showCancelButton: true,
        showCloseButton: true,
        confirmButtonColor: '#46a525',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ok',
        showClass: {
            popup: 'animate__animated animate__bounceInUp'
        },
        hideClass: {
            popup: 'animate__animated animate__bounceOutDown'
        },
    }).then((result) => {
        if (result.isConfirmed) {
            //alert("<?php echo 'Session::flush();' ?>");
            //document.body.innerHTML = "{{Session::flush();}}";
            window.location.href = "https://labmanufactura.net/SCEII/logOut";
        }
    })
});

$('.config').on('click', function() {
    if (res < 767)
        side();
    Swal.fire({
        background: '#131414',
        color: 'white',
        title: 'Ajustes',
        html: '<div style="text-align: left;">' +
            '<a class=""><i class="fa-solid fa-pen"></i> Editar perfil</a><br><hr class="separador">' +
            '<a class=""><i class="fas fa-bell fa-1x"></i> Ver notificaciones</a><br><hr class="separador">' +
            '<a class=""><i class="fa-solid fa-sun"></i> Tema</a><br><hr class="separador">' +
            '<a class="text-danger"><i class="fa-solid fa-trash"></i> Eliminar cuenta</a><hr class="separador">' +
            '</div>',
        showCloseButton: true,
        showConfirmButton: false,
        showClass: {
            popup: 'animate__animated animate__bounceInUp'
        },
        hideClass: {
            popup: 'animate__animated animate__bounceOutDown'
        },
    })
});

$('.addlab').on('click', async function() {
    var aux = false;
    const { value: code } = await Swal.fire({
        background: '#131414',
        color: 'white',
        title: 'Inscribir Laboratorio',
        input: 'text',
        inputLabel: 'Escribe el código de acceso',
        inputPlaceholder: 'Código',
        showCancelButton: true,
        confirmButtonColor: '#46a525',
        cancelButtonColor: '#d33',
    })

    if(code){
        $.ajax({
            url: baseUrl + "?codigo_acceso="+code,
            type: 'GET',
            dataType: 'JSON',
            async: true,
            success: function(response) {
                Swal.fire({
                    background: '#131414',
                    color: 'white',
                    title: 'Información de laboratorio',
                    html: "<p>Nombre: " + response.data[0].nombre + "<br> Encargado: " + response.data[0].encargado +"</p>",
                    imageUrl: response.data[0].imagen,
                    imageWidth: 400,
                    imageHeight: 200,
                    showCancelButton: true,
                    confirmButtonColor: '#46a525',
                    cancelButtonColor: '#d33',
                    cancelButtonText: "Cancelar",
                    confirmButtonText: 'Inscribir',
                    imageAlt: 'Custom image',
                    }).then((result) => {
                        if (result.isConfirmed) {
                            Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                            )
                        }
                    })
            },
            error: function(error) {
                //const response = error.responseJSON;
                //window.alert("error")
                console.log(error);
                Swal.fire({
                    background: '#131414',
                    color: 'white',
                    title: 'No existe el laboratorio',
                })
            }
        });
    }else{
        Swal.fire({
            background: '#131414',
            color: 'white',
            title: 'No existe el laboratorio',
        })
    }



    /*
    $.ajax({
        url: url + "alumno",
        type: 'POST',
        dataType: 'JSON',
        data: JSON.stringify(formData),
        headers: { 'Content-Type': 'application/json' },
        success: async function(response) {
            await alertSuccess()
        },
        error: function(error) {
            const response = error.responseJSON;
            if (response.message === 'El correo ya se encuentra registrado') {
                Swal.fire({
                    position: 'top-end',
                    icon: 'error',
                    title: response.message,
                    showConfirmButton: false,
                    timer: 3000,
                    toast: true,
                    color: 'white',
                    background: '#131414',
                })
                correo.style.borderColor = "red";
                lblCorreo.style.display = "flex";
                lblCorreo.innerHTML = response.message;
            } else {
                if (response.message === 'El no. Control ya se encuentra registrado') {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'error',
                        title: response.message,
                        showConfirmButton: false,
                        timer: 3000,
                        toast: true,
                        color: 'white',
                        background: '#131414',
                    })
                    noControl.style.borderColor = "red";
                    lblnoControl.style.display = "flex"
                    lblnoControl.innerHTML = response.message;
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Lo sentimos',
                        text: 'Ha ocurrido un error inesperado',
                        color: 'white',
                        background: '#131414',
                        confirmButtonColor: '#46a525'
                    });
                }
            }
        }
    });
    */
});

async function alertSuccess() {
    Swal.fire({
        icon: 'success',
        title: 'Registro exitoso',
        text: 'Se ha enviado un enlace de confirmación a su correo',
        color: 'white',
        background: '#131414',
        confirmButtonColor: '#46a525'
    });
}