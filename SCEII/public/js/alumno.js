const baseUrl = "https://labmanufactura.net/api-sceii/v1/routes/laboratorio.php"

var barra = false;
var res = screen.width;

var ms = document.getElementById("mySidebar");
var mn = document.getElementById("main");
var menu = document.getElementById("menu");

function sidebar(){
    menu.classList.add("openmenu");
}
function closebar(){
    menu.classList.remove("openmenu");
}

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
}

function closeNav() {
    if (ms) {
        ms.classList.remove("openside");
    }
    if (mn) {
        mn.classList.remove("openmain");
    }
}

$('#logout').on('click', function() { // # -> Llamada por id
    if (res < 767)
        side()
    Swal.fire({
        background: '#131414',
        color: 'white',
        title: 'Cerrar Sesión',
        icon: 'info',
        text: "¿Seguro que quieres cerrar sesión?",
        showCancelButton: true,
        //showCloseButton: true,
        confirmButtonColor: '#46a525',
        cancelButtonColor: '#d33',
        cancelButtonText: "Cancelar",
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

$('#asistencia').on('click', function() { // . -> Llamada por class
    window.location.href = location.href= window.location+'/asistencia';
});

$('.config').on('click', function() { // . -> Llamada por class
    if (res < 767)
        side();
    Swal.fire({
        background: '#131414',
        color: 'white',
        title: 'Ajustes',
        html: '<div style="text-align: left;">' +
            '<a class="edit"><i class="fa-solid fa-pen"></i> Editar perfil</a><br><hr class="separador">' +
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
    $('.edit').on('click', async function() {
        location.href= 'https://labmanufactura.net/SCEII/alumno/editar';
    });
});

$('.encargado').click(function(){ // . -> Llamada por class
    Swal.fire({
        background: '#131414',
        color: 'white',
        imageUrl: fotoPerfil.value,
        imageWidth: 200,
        imageHeight: 200,
        html: "<p><i class='fa-solid fa-user-group'></i> Encargado: "+encargado.value+"<br> <i class='fa-solid fa-envelope'></i> Correo: "+correo.value+" </p>",     
        showClass: {
            popup: 'animate__animated animate__bounceInUp'
        },
        hideClass: {
            popup: 'animate__animated animate__bounceOutDown'
        },
    })
});

$('.perfil').on('click', function() { // . -> Llamada por class
    window.location.href = "https://labmanufactura.net/SCEII/alumno/perfil";
});

$('.compas').on('click', function() { // . -> Llamada por class
    window.location.href = location.href= window.location+'/compañeros';
});

$('.about').on('click', function() { // . -> Llamada por class
    window.location.href = "https://labmanufactura.net/#about";
});

$('.help').on('click', function() { // . -> Llamada por class
    window.location.href = "https://labmanufactura.net";
});

$('.calendario').on('click', function() { // . -> Llamada por class
    window.location.href = location.href= window.location+'/calendario';
});

async function addLab(token) {
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
        cancelButtonText: "Cancelar",
        confirmButtonText: 'Buscar',
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
/**/
                        if (result.isConfirmed) {
                            var formData = {
                                codigo: code
                            };
                            $.ajax({
                                url: 'https://labmanufactura.net/api-sceii/v1/routes/alumno_laboratorio.php',
                                type: 'POST',
                                dataType: 'JSON',
                                data: JSON.stringify(formData),
                                async: true,
                                headers: { 'Authorization': token },
                                success: function(response) {
                                    //Swal.fire(response.message);
                                    Swal.fire({
                                        background: '#131414',
                                        color: 'white',
                                        icon: 'success',
                                        title: response.message,
                                        
                                    }).then((result) => {
                                        // Recarga la ventana
                                        window.location.href = window.location.href;
                                    })
                                },
                                error: function(xhr, status, error) {
                                    const obj = JSON.parse(xhr.responseText);
                                    Swal.fire({
                                        background: '#131414',
                                        color: 'white',
                                        icon: 'error',
                                        title: obj.status,
                                        text: obj.message,
                                    })
                                }
                            });
                            
                        }
/**/
                    })
            },
            error: function(error) {
                //const response = error.responseJSON;
                //window.alert("error")
                console.log(error);
                Swal.fire({
                    background: '#131414',
                    color: 'white',
                    icon: 'error',
                    title: 'No existe el laboratorio',
                    text: 'El código ingresado no es valido',
                })
            }
        });
    }else{
        /*
        Swal.fire({
            background: '#131414',
                    color: 'white',
                    icon: 'error',
                    title: 'Ingrese un código',
                    text: 'No se ingresó ningun código',
        })
        */
    }
}
