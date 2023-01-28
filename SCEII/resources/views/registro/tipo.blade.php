@extends('templates.registro')
@section('title', 'Tipo de Registro')

@section('headers')

<!-- Icono de la página -->
<link rel="icon" href="public/assets/logo.png">
<!--<link rel="stylesheet" type="text/css" href="public/css/registro.css">-->
<link href="public/css/registro.css?v=<?php rand(); ?>" rel="stylesheet">

@endsection

@section('content')

<div class="formulario text-center">
    <h3 class="titulo py-2 mt-3">Registro</h3>
		<!-- Formulario de sesión -->
		<div class="form-registro py-3">
			<h4 class="py-2">Registrarme como:</h3>
			<!--
            <br>
			<form action="registro/jefe" method="get">
			    <input type="submit" name="jefe" class="btn-aceptar mx-auto" value="Jefe de Laboratorio" />
                <label class="fs-6">Requiere verificación adicional</label>
            </form>
			-->
            <form action="registro/docente" method="get">
			    <input type="submit" name="docente" class="btn-aceptar mx-auto form-lg" value="Docente" />
            </form>
            <form action="registro/alumno" method="get">
			    <input type="submit" name="alumno" class="btn-aceptar mx-auto form-lg" value="Alumno" />
            </form>
            <form action="registro/visitante" method="get">
			    <input type="submit" name="visitante" class="btn-aceptar mx-auto form-lg" value="Visitante" />
            </form>
			<a href="/SCEII">
				<input type="submit" name="visitante" class="btn-cancelar mx-auto form-lg" value="Cancelar" />
			</a>

			<?php
				if(isset($_GET['e'])){
					if(isset($_GET['e']) == "tr"){
						echo "<div class='text-danger'><b>Selecciona el tipo de usuario para el registro</b></div>";
					}else if(isset($_GET['e']) == "va"){
						echo "<div class='text-danger'><b>Campos vacios, vuelva a intentarlo</b></div>";
					}else if(isset($_GET['e']) == "ni"){
						echo "<div class='text-danger'><b>Error, el usuario NO fue insertado</b></div>";
					}
				}
			?>
    </div>
</div>

@endsection