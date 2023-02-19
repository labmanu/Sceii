@extends('templates.recuperar')

@section('content')

    <!-- Formulario de sesión -->
    <div class="form-recuperar">
        <h3 class="titulo text-start" style="margin-bottom: 1% !important;margin-top: 1% !important;">
            Recuperar
        </h3>
        <p class="desc text-start">
            Se enviará un código de verificación a tu correo
        </p>
        <div class="inputContainer">
            <input name="correo" type="email" class="input-recuperar" id= "correo" placeholder="a" required/>
            <label class="labelform">
                <i class="fa-solid fa-envelope"></i> Correo:
            </label>
        </div>
        <input type="button" id="btnCorreo" class="submitBtn mx-auto" value="Enviar" />
        <a href="/SCEII">
            <input type="button" class="cancelBtn mx-auto" value="Regresar al inicio"/>
        </a>
    </div>
    <!-- FIN de Formulario de sesión -->

@endsection