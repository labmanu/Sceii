@extends('templates.registro')
@section('title', 'Tipo de Registro')

@section('content')

	<div class="formulario text-center">
		<h3 class="titulo py-2 mt-3">Registro</h3>
		<!-- Formulario de sesión -->
		<div class="form-registro py-3">
			<h4 class="py-2">Registrarme como:</h3>
			<a href="registro/docente">
				<input type="submit" name="docente" class="btn-aceptar mx-auto form-lg" value="Docente" />
			</a>
			<a href="registro/alumno">
				<input type="submit" name="alumno" class="btn-aceptar mx-auto form-lg" value="Alumno" />
			</a>
			<a href="registro/visitante">
				<input type="submit" name="visitante" class="btn-aceptar mx-auto form-lg" value="Visitante" />
			</a>
			<a href="/SCEII">
				<input type="submit" name="visitante" class="btn-cancelar mx-auto form-lg" value="Cancelar" />
			</a>
		</div>
	</div>

@endsection