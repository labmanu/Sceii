@extends('templates.registro')
@section('title', 'Tipo de Registro')

@section('headers')

<!-- Icono de la página -->
<link rel="icon" href="../public/assets/logo.png">
<!--<link rel="stylesheet" type="text/css" href="../public/css/registro.css">-->
<link rel="stylesheet" href="../public/css/registro.css?v=<?php rand(); ?>">
<!-- REGISTRO JS-->
<script  type="text/javascript" src="{{ asset('public/js/registro.js')}}"></script>

@endsection

@section('content')
<div class="formulario">
	<div class="wrapper">
		<div class="text-center form-lg">
			<?php
			/*if (isset($_GET['jefe'])) {
				echo '<h3 class="titulo text-center">Registro</h3>';
				echo '<i class="fa-solid fa-code fa-5x"></i>';
			} else*/ 
			if (isset($_GET['docente'])) {
				echo '<h3 class="titulo text-center">Registro Docente</h3>';
				echo '<i class="fa-solid fa-chalkboard-user fa-5x"></i>';
			} else if (isset($_GET['alumno'])) {
				echo '<h3 class="titulo text-center">Registro Alumno</h3>';
				echo '<i class="fa-solid fa-graduation-cap fa-5x"></i>';
			} else if (isset($_GET['visitante'])) {
				echo '<h3 class="titulo text-center">Registro Visitante</h3>';
				echo '<i class="fa-solid fa-rocket fa-5x"></i>';
			} else {
				header('location: tipoRegistro.php?e=tr'); // Tipo de Registro
			}
			?> 
		</div>
		<form class="form-registro reg">
			<input type="hidden" name="operacion" value="registro" />
			<h3 class="titulo py-2">Registrarse</h3>
			<div class="inputContainer">
				<input name="nombre" type="text" class="input-registro" id="nombre" placeholder="a" required />
				<label class="labelform">
					<i class="fa-solid fa-circle-user"></i> Nombre:
				</label>
			</div>
			<p class="labelformErrorAct" id="lblNombre">Llene este campo</p>
			<div class="inputContainer">
				<input name="apellidos" type="text" class="input-registro" id="apellidos" placeholder="a" required />
				<label class="labelform">
					<i class="fa-solid fa-circle-user"></i> Apellidos:
				</label>
			</div>
			<p class="labelformErrorAct" id="lblApellidos">Llene este campo</p>
			<div class="inputContainer">
				<input name="correo" type="email" class="input-registro" id="correo" placeholder="a" required />
				<label class="labelform">
					<i class="fa-solid fa-envelope"></i> Correo:
				</label>
			</div>
			<p class="labelformErrorAct" id="lblCorreo"> El correo ya se encuentra registrado</p>

			<div class="inputContainer">
				<input name="clave" type="password" class="input-registro" id="clave" placeholder="a" required />
				<label class="labelform">
					<i class="fa-solid fa-key"></i> Contraseña:
				</label>
			</div>
			<p class="labelformErrorAct" id="lblClave">Llene este campo</p>


			<select name="genero" id="genero">
				<option value="f">Femenino</option>
				<option value="m">Masculino</option>
				<option value="o">Otro</option>
			</select>
			<div class="inputContainer">
				<input name="fecha_nacimiento" type="date" class="input-registro" id="date" placeholder="a" required />
				<label class="labelform">
					<i class="fa-solid fa-calendar-days"></i> Fecha de Nacimiento:
				</label>
			</div>
			<p class="labelformErrorAct" id="lblDate">Llene este campo</p>
			<!-- Clasificación del tipo de registro -->
			<?php
				if (isset($_GET['jefeLab'])) {
					echo '<input name="metodo" type="hidden" id="tipo" value="insertarJefe" />';
				} elseif (isset($_GET['docente'])) {
					echo '<input name="metodo" type="hidden" id="tipo" value="insertarDocente" />';
				} elseif (isset($_GET['alumno'])) {
					echo '<input name="metodo" type="hidden" id="tipo" value="insertarAlumno" />';
					echo '
							<div class="inputContainer">
								<input name="no_control" type="text" id="noControl" class="input-registro" placeholder="a" />
								<label id="lblnc" class="labelform">
								<i class="fa-solid fa-id-card"></i> No. Control:
								</label>
							</div>
							<p class="labelformErrorAct" id="lblnoControl">El no. Control ya se encuentra registrado</p>
							<select name="id_carrera" id="carrera" >
								<option value="1">Licenciatura en Administracion</option>
								<option value="2">Ingeniería Ambiental</option>
								<option value="3">Ingeniería Bioquímica</option>
								<option value="4">Ingeniería Electrónica</option>
								<option value="5">Ingeniería en Gestión Empresarial</option>
								<option value="6" selected>Ingeniería Industrial</option>
								<option value="7">Ingeniería Mecánica</option>
								<option value="8">Ingeniería Mecatrónica</option>
								<option value="9">Ingeniería en Sistemas Computacionales</option>
								<option value="10">Ingeniería Química</option>
							</select>
							<select name="id_semestre" id="semestre">
								<option value="1">1er Semestre</option>
								<option value="2">2do Semestre</option>
								<option value="3">3er Semestre</option>
								<option value="4">4to Semestre</option>
								<option value="5">5to Semestre</option>
								<option value="6">6to Semestre</option>
								<option value="7">7mo Semestre</option>
								<option value="8">8vo Semestre</option>
								<option value="9">9no Semestre</option>
								<option value="10">10mo Semestre</option>
								<option value="11">11vo Semestre</option>
								<option value="12">12vo Semestre</option>
								<option value="o">otro</option>
							</select>';
				} elseif (isset($_GET['visitante'])) {
					echo '<input name="metodo" type="hidden" id="tipo" value="insertarVisitante" />';
					echo '
							<div class="inputContainer">
								<input name="institucion" id="institucion" type="text" class="input-registro" id="visitante" placeholder="a" />
								<label id="lblin" class="labelform" >
								<i class="fa-solid fa-user"></i> Institución:
								</label>
							</div>
							<p class="labelformErrorAct" id="lblInst">Llene este campo</p>';
				} else {
					// header('location: tipoRegistro.php?e=tr'); // OBSOLETO
				}
			?>
			<!-- Botones -->
			<table align="center">
				<td>
					<a href="/SCEII/registro">
						<input type="button" class="btn-cancelar2 mx-auto" value="Cancelar" />
					</a>
				</td>
				<td>
					<input id="btn_registrar" class="btn-registrar" value="Registrar" />
				</td>
			</table>
		</form>
	</div>
</div>

@endsection
