'use strict';

;( function ( document, window, index ) {
	var inputs = document.querySelectorAll( '.inputfile' );
	Array.prototype.forEach.call( inputs, function( input ) {
		var label	 = input.nextElementSibling,
			labelVal = label.innerHTML;

		input.addEventListener( 'change', function( e )
		{
			var fileName = '';
			if( this.files && this.files.length > 1 )
				fileName = ( this.getAttribute( 'data-multiple-caption' ) || '' ).replace( '{count}', this.files.length );
			else
				fileName = e.target.value.split( '\\' ).pop();
			if( fileName )
				label.querySelector( 'span' ).innerHTML = fileName;
			else
				label.innerHTML = labelVal;
		});
	});
}( document, window, 0 ));

const input = document.getElementById("file-5");
const avatar = document.getElementById("imgeditar");
var strbase = "";

const convertBase64 = (file) => {
	return new Promise((resolve, reject) => {
		const fileReader = new FileReader();
		fileReader.readAsDataURL(file);

		fileReader.onload = () => {
		resolve(fileReader.result);
		};

		fileReader.onerror = (error) => {
		reject(error);
		};
	});
};

const uploadImage = async (event) => {
	const file = event.target.files[0];
	const base64 = await convertBase64(file);
	//console.log(base64);
	avatar.src = base64;
	strbase = base64;
	var aux = "";
	/* 	Se elimina el formato de la imagen
		Es necesario borra el formato o la imagen se subirá dañada si no es png 
	*/
	const arr = strbase.split(",");
	for (let index = 1; index < arr.length; index++) {
		const element = arr[index];
		aux += element;
	}
	// Omite el texto hasta la primera coma [Formato de la imagen]
	console.log(aux);
	strbase = aux;
};

input.addEventListener("change", (e) => {
	uploadImage(e);
});

// Bien guarro hehe
$('#btn-editar').on('click', function() { // . -> Llamada por id
	var vali = false;
	var ban = false;
	var err = "";
	// Validación de campos vacíos
	if(nombre.value != ""){
		if(apellidos.value != ""){
			if(nclave.value != ""){
				if(genero.value != "o" || genero.value != "f" || genero.value != "m"){
					if(fecha.value != ""){
						if(clave.value != ""){
							vali = true;
						}else{
							var vali = false;
							err = 'Por favor llene el campo Contraseña actual';
						}
					}else{
						var vali = false;
						err = 'Por favor llene el campo Fecha de Nacimiento';
					}
				}else{
					var vali = false;
					err = 'Por favor seleccione un Genero';
				}
			}else{
				var vali = false;
				err = 'Por favor llene el campo Nueva Contraseña';
			}
		}else{
			var vali = false;
			err = 'Por favor llene el campo Apellidos';
		}
	}else{
		var vali = false;
		err = 'Por favor llene el campo Nombre';
	}
	if(!vali){
		Swal.fire({
			background: '#131414',
			color: 'white',
			icon: 'error',
			title: 'Datos incompletos',
			text: err,
		});
	}else{
		var datos = JSON.parse(perfil);
		var link = "";
		if(strbase != ""){
			var formFoto = {
				imagen: strbase
			};
			$.ajax({
				url: 'https://labmanufactura.net/api-sceii/v1/public/subirImagen.php',
				type: 'POST',
				dataType: 'JSON',
				data: JSON.stringify(formFoto),
				async: false,
				headers: { 'Authorization': token },
				success: function(response) {
					ban = true;
					link = response.link;
				},
				error: function(xhr, status, error) {
					const obj = JSON.parse(xhr.responseText);
					var msj = obj.message;
					console.log(msj);
					Swal.fire({
						background: '#131414',
						color: 'white',
						icon: 'error',
						title: 'Error al cambiar la foto',
						text: 'Por favor intente seleccionar un formato de imagen valido',
					}).then((result) => {
						ban = false;
						window.location.href = window.location.href;
					});
				}
			});
		}else{
			link = datos.fotoPerfil;
			ban = true;
		}
		if(ban){
			var formUsuario = {
				nombre: nombre.value,
				apellidos: apellidos.value,
				clave: nclave.value,
				genero: genero.value,
				fecha_nacimiento: fecha.value,
				foto_perfil: link,
				claveConfirm: clave.value
			};
			$.ajax({
				url: 'https://labmanufactura.net/api-sceii/v1/routes/usuario.php',
				type: 'PATCH',
				dataType: 'JSON',
				data: JSON.stringify(formUsuario),
				async: false,
				headers: { 'Authorization': token },
				success: function(response) {
					Swal.fire({
						background: '#131414',
						color: 'white',
						icon: 'success',
						title: 'Usuario editado',
						text: response.message,
					}).then((result) => {
						window.location.href = "https://labmanufactura.net/SCEII/alumno/perfil";
					});
				},
				error: function(xhr, status, error) {
					const obj = JSON.parse(xhr.responseText);
					var msj = obj.message;
					Swal.fire({
						background: '#131414',
						color: 'white',
						icon: 'error',
						title: 'Error al editar el usuario',
						text: msj,
					}).then((result) => {
						window.location.href = window.location.href;
					});
				}
			});
		}
	}
});