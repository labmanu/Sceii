@extends('templates.recuperar')

@section('content')

    <div class="container">
        <div class="formulario">
            <img src="{{ asset('public/assets/recuperar.png') }}" alt="logo" class="mx-auto d-block mb-3 icon-logo">
            <!-- Código de confirmación -->
            <form method="post" action="" class="form-recuperar">
                @csrf
                <input type="hidden" name="operacion" value="login" />
                <h3 class="titulo" style="margin-bottom: 1% !important;margin-top: 1% !important;">
                    Recuperar contraseña
                </h3>

                <p class="desc">
                    Se envió el código a {{$_POST["correo"]}}
                    <br><br>
                    ¿No has recibido el código?
                    <br>
                    <a href="/SCEII/recuperar">Solicitar un nuevo código</a>
                </p>
                <input class="valicode" type="text" name="c1" id="c1" size="1" maxlength="1" onkeyup="autoTab('c1', '1', 'c2')" autofocus/> 
                <input class="valicode" type="text" name="c2" id="c2" size="1" maxlength="1" onkeyup="autoTab('c2', '1', 'c3')"/> 
                <input class="valicode" type="text" name="c3" id="c3" size="1" maxlength="1" onkeyup="autoTab('c3', '1', 'c4')"/> 
                <input class="valicode" type="text" name="c4" id="c4" size="1" maxlength="1"/>

                <script>
                    function autoTab(field1, len, field2) {
                        if (document.getElementById(field1).value.length == len) {
                            document.getElementById(field2).focus();
                        }
                    }
                </script>

                <input type="submit" class="submitBtn mx-auto" value="Enviar" />

                <a href="/SCEII">
                    <input type="button" class="cancelBtn mx-auto" value="Regresar al inicio"/>
                </a>

            </form>
        </div>
    </div>

@endsection