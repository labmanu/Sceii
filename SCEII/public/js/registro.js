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

    btnRegistrar.addEventListener('click', show);

    if (tipo === "insertarAlumno") {
        const noControl = document.getElementById("noControl");
        const carrera = document.getElementById("carrera");
        const semestre = document.getElementById("semestre");

    }







    function alumRegistrar(noControl, carrera, semestre) {
        var formData = {
            nombre: nombre.value,
            apellidos: apellidos.value,
            correo: correo.value,
            clave: clave.value,
            genero: genero.options[genero.selectedIndex].value,
            fecha_nacimiento: date.value,
            id_carrera: carrera,
            no_control: noControl,
            id_semestre: semestre
        };
    }

});