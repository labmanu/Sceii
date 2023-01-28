var barra = false;
var res = screen.width;

var ms = document.getElementById("mySidebar");
var mn = document.getElementById("main");
var lb = document.getElementById("lab");

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

            window.location.href = "/SCEII";
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
    if (res < 767)
        side();
    const { value: code } = await 
    Swal.fire({
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
        Swal.fire({
            background: '#131414',
            color: 'white',
            title: `Your code is ${code}`,
            text: 'uwu',
            imageUrl: 'https://unsplash.it/400/200',
            imageWidth: 400,
            imageHeight: 200,
            imageAlt: 'Custom image',
        })
    }
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