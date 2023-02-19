@extends('templates.recuperar')

@section('content')

    <!-- Formulario de sesión -->
    <div class="form-recuperar">
        <h3 class="titulo text-start" style="margin-bottom: 1% !important;margin-top: 1% !important;">
            Recuperar contraseña
        </h3>
        <p class="desc text-start">
            Escriba su nueva contraseña para {{$_POST['correo']}}
        </p>
        <div class="inputContainer">
            <input name="clave" type="password" class="input-recuperar" id= "clave" placeholder="a" required/>
            <label class="labelform">
                <i class="fa-solid fa-envelope"></i> Contraseña:
            </label>
        </div>
        <input type="hidden" id="correo" name="correo" value="{{ $_POST['correo'] }}" /> 
        <input type="button" id="btnConfirmar" class="submitBtn mx-auto" value="Enviar" />
        <a href="/SCEII">
            <input type="button" class="cancelBtn mx-auto" value="Regresar al inicio"/>
        </a>
    </div>
    <!-- FIN de Formulario de sesión -->

@endsection