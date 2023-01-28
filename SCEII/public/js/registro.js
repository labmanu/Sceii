$(document).ready(function() {

    const url = "https://labmanufactura.net/api-sceii/v1/routes/registro.php?tipo=";
    const btnRegistrar = document.getElementById('btn_registrar');
    const tipo = document.getElementById('tipo').value;
    // inputs text 
    const nombre = document.getElementById('nombre');
    const apellidos = document.getElementById('apellidos');
    const correo = document.getElementById('correo');
    const clave = document.getElementById('clave');
    const genero = document.getElementById('genero');
    const date = document.getElementById('date');

    //label
    const lblNombre = document.getElementById("lblNombre");
    const lblApellidos = document.getElementById("lblApellidos");
    const lblClave = document.getElementById("lblClave");
    const lblDate = document.getElementById("lblDate");
    const lblCorreo = document.getElementById("lblCorreo");

    //.addEventListener('click', show);

    correo.addEventListener('keyup', updateCorreo);
    nombre.addEventListener('keyup', updateNombre);
    apellidos.addEventListener('keyup', updateApellidos);
    clave.addEventListener('keyup', updateClave);
    date.addEventListener('change', updateDate);

    if (tipo == "insertarAlumno")
        btnRegistrar.addEventListener('click', alumRegistrar)
    else
    if (tipo == "insertarDocente") {
        btnRegistrar.addEventListener('click', docenteRegistrar)
    } else
        btnRegistrar.addEventListener('click', visitanteRegistrar)


    function alumRegistrar() {
        const noControl = document.getElementById("noControl");
        const carrera = document.getElementById("carrera");
        const semestre = document.getElementById("semestre");
        const lblnoControl = document.getElementById("lblnoControl");
        noControl.addEventListener('keyup', updateNoControl);
        var formData = {
            nombre: nombre.value,
            apellidos: apellidos.value,
            correo: correo.value,
            clave: clave.value,
            genero: genero.options[genero.selectedIndex].value,
            fecha_nacimiento: date.value,
            id_carrera: carrera.options[carrera.selectedIndex].value,
            no_control: noControl.value,
            id_semestre: semestre.options[semestre.selectedIndex].value
        };
        //console.log(formData);
        if (vali() && valiNoControl())
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
        else {
            Swal.fire({
                position: 'top-end',
                icon: 'error',
                title: 'Llena todos los campos',
                showConfirmButton: false,
                timer: 3000,
                toast: true,
                color: 'white',
                background: '#131414',
            })
        }

        function updateNoControl() {
            noControl.style.borderColor = "white";
            lblnoControl.style.display = "none"
        }

        function valiNoControl() {
            if (noControl.value === "") {
                noControl.style.borderColor = "red";
                lblnoControl.style.display = "flex"
                lblnoControl.innerHTML = "Llene este campo"
                return false;
            }
            return true;
        }
    }



    function docenteRegistrar() {
        var formData = {
            nombre: nombre.value,
            apellidos: apellidos.value,
            correo: correo.value,
            clave: clave.value,
            genero: genero.options[genero.selectedIndex].value,
            fecha_nacimiento: date.value,
        };
        //console.log(formData);
        if (vali())
            $.ajax({
                url: url + "docente",
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
            });
        else {
            Swal.fire({
                position: 'top-end',
                icon: 'error',
                title: 'Llena todos los campos',
                showConfirmButton: false,
                timer: 3000,
                toast: true,
                color: 'white',
                background: '#131414',
            })
        }
    }


    function visitanteRegistrar() {
        const inst = document.getElementById("institucion")
        const lblInst = document.getElementById("lblInst")
        inst.addEventListener('keyup', updateInst);
        var formData = {
            nombre: nombre.value,
            apellidos: apellidos.value,
            correo: correo.value,
            clave: clave.value,
            genero: genero.options[genero.selectedIndex].value,
            fecha_nacimiento: date.value,
            institucion: inst.value
        };
        //console.log(formData);
        if (vali() && valiInst())
            $.ajax({
                url: url + "visitante",
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
            });
        else {
            Swal.fire({
                position: 'top-end',
                icon: 'error',
                title: 'Llena todos los campos',
                showConfirmButton: false,
                timer: 3000,
                toast: true,
                color: 'white',
                background: '#131414',
            })
        }


        function updateInst() {
            inst.style.borderColor = "white";
            lblInst.style.display = "none"
        }

        function valiInst() {
            if (inst.value === "") {
                inst.style.borderColor = "red";
                lblInst.style.display = "flex"
                return false;
            }
            return true;
        }
    }


    function vali() {
        if (nombre.value === "") {
            nombre.style.borderColor = "red";
            lblNombre.style.display = "flex"
            return false;
        }

        if (apellidos.value === "") {
            apellidos.style.borderColor = "red";
            lblApellidos.style.display = "flex"
            return false;
        }

        if (correo.value === "") {
            correo.style.borderColor = "red";
            lblCorreo.style.display = "flex"
            lblCorreo.innerHTML = "Llene este campo"
            return false;
        }

        if (clave.value === "") {
            clave.style.borderColor = "red";
            lblClave.style.display = "flex"
            return false;
        }

        if (date.value === "") {
            date.style.borderColor = "red";
            lblDate.style.display = "flex"
            return false;
        }
        return true;
    }

    function updateCorreo() {
        correo.style.borderColor = "white";
        lblCorreo.style.display = "none"
    }

    function updateNombre() {
        nombre.style.borderColor = "white";
        lblNombre.style.display = "none"
    }

    function updateApellidos() {
        apellidos.style.borderColor = "white";
        lblApellidos.style.display = "none"
    }

    function updateClave() {
        clave.style.borderColor = "white";
        lblClave.style.display = "none"
    }

    function updateDate() {
        date.style.borderColor = "white";
        lblDate.style.display = "none"
    }

    async function alertSuccess() {
        let confirm = true;
        Swal.fire({
            icon: 'success',
            title: 'Registro exitoso',
            text: 'Se ha enviado un enlace de confirmación a su correo',
            footer: '<a href="https://mail.google.com/mail/u/0/#inbox">Ir a bandeja de mensajes</a>',
            color: 'white',
            background: '#131414',
            confirmButtonColor: '#46a525'
        }).then((result) => {
            if (result.isConfirmed)
                window.location.href = 'https://labmanufactura.net/SCEII/'
            else
                window.location.href = 'https://labmanufactura.net/SCEII/'

        });
        return confirm;
    }

});