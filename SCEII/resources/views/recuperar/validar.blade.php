@extends('templates.recuperar')

@section('content')

    <div class="container">
        <div class="formulario">
            <img src="{{ asset('public/assets/recuperar.png') }}" alt="logo" class="mx-auto d-block mb-3 icon-rec">
            <!-- Código de confirmación -->
            <form method="post" action="validar/confirmar" class="form-recuperar">
                @csrf
                <h3 class="titulo" style="margin-bottom: 1% !important;margin-top: 1% !important;">
                    Recuperar contraseña
                </h3>
                <input type="hidden" id="correo" name="correo" value="{{ $_GET['correo'] }}" /> 
                <p class="desc">
                    Código de verificacion enviado a {{ $_GET["correo"] }}
                    <br><br>
                    ¿No has recibido el código?
                    <br>
                    <a href="/SCEII/recuperar">Solicitar un nuevo código</a>
                </p>
                <input class="valicode" type="text" name="c1" id="c1" size="1" maxlength="1" onkeyup="autoTab('c1', '1', 'c2')" autofocus/> 
                <input class="valicode" type="text" name="c2" id="c2" size="1" maxlength="1" onkeyup="autoTab('c2', '1', 'c3')"/> 
                <input class="valicode" type="text" name="c3" id="c3" size="1" maxlength="1" onkeyup="autoTab('c3', '1', 'c4')"/> 
                <input class="valicode" type="text" name="c4" id="c4" size="1" maxlength="1" onkeyup="autoTab('c4', '1', 'btnValidar')"/>
                <input type="submit" class="submitBtn mx-auto" value="Enviar" />
                <a href="/SCEII">
                    <input type="button" class="cancelBtn mx-auto" value="Regresar al inicio"/>
                </a>
            </form>
        </div>
    </div>  

@endsection