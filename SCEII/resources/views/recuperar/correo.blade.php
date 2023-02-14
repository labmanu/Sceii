@extends('templates.recuperar')

@section('content')

    <div class="container">
        <div class="formulario">
            <img src="{{ asset('public/assets/recuperar.png') }}" alt="logo" class="mx-auto d-block mb-3 icon-logo">
            <!-- Formulario de sesión -->
            <form method="post" action="recuperar/validar" class="form-recuperar">
                @csrf
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

                <input type="submit" class="submitBtn mx-auto" value="Enviar" />

                <a href="/SCEII">
                    <input type="button" class="cancelBtn mx-auto" value="Regresar al inicio"/>
                </a>

            </form>
        </div>
    </div>

@endsection