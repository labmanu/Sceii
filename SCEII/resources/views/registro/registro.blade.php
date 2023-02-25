@if(isset($_GET['tipo']))

	@extends('templates.registro')
	@section('title', 'Tipo de Registro')

	@section('headers')
	<!-- REGISTRO JS-->
	<script  type="text/javascript" src="{{ asset('public/js/registro.js?v='.rand()) }}"></script>
	@endsection

	@section('content')
		<div class="formulario">
			<div class="wrapper">

				<!-- Iconos del tipo de registro -->
				<div class="text-center form-lg">
					@if ($_GET['tipo'] == "alumno")
						<h3 class="titulo text-center">Registro Alumno</h3>
						<i class="fa-solid fa-graduation-cap fa-5x"></i>
					@elseif ($_GET['tipo'] == "docente")
						<h3 class="titulo text-center">Registro Docente</h3>
						<i class="fa-solid fa-chalkboard-user fa-5x"></i>
					@elseif ($_GET['tipo'] == "visitante")
						<h3 class="titulo text-center">Registro Visitante</h3>
						<i class="fa-solid fa-rocket fa-5x"></i>
					@endif
				</div>

				{{-- Formulario estático --}}
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
					<select name="genero" id="genero" class="fullselect">
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

					{{-- Formulario según la clasificación del tipo de registro --}}
					@if ($_GET['tipo'] == "alumno")
						<div class="inputContainer">
							<input name="no_control" type="text" id="noControl" class="input-registro" placeholder="a" />
							<label id="lblnc" class="labelform">
							<i class="fa-solid fa-id-card"></i> No. Control:
							</label>
						</div>
						<p class="labelformErrorAct" id="lblnoControl">El no. Control ya se encuentra registrado</p>
						<select name="id_carrera" id="carrera" class="fullselect">
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
						<select name="id_semestre" id="semestre" class="fullselect">
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
						</select>
					@elseif ($_GET['tipo'] == "visitante")
						<div class="inputContainer">
							<input name="institucion" id="institucion" type="text" class="input-registro" id="visitante" placeholder="a" />
							<label id="lblin" class="labelform" >
							<i class="fa-solid fa-user"></i> Institución:
							</label>
						</div>
						<p class="labelformErrorAct" id="lblInst">Llene este campo</p>
					@endif

					{{-- Botones --}}
					<table align="center">
						<td>
							<a href="/SCEII/registro">
								<input type="button" class="btn-cancelar2 mx-auto" value="Cancelar" />
							</a>
						</td>
						<td>
							<input type="button" id="btn_registrar" class="btn-registrar" value="Registrar"/>
						</td>
					</table>
				</form>
			</div>
		</div>
	@endsection

@endif