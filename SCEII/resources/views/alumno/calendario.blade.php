@if(isset($_SESSION["data"]) && isset($_GET["anio"]))

    @extends('templates.alumno')
    @section('title', 'Asistencias en '.$_SESSION["laboratorio"]->nombre)
    
    <!-- NO FUNCIONO EL HIDDEN AAAAAAAAA -->
    <!-- -->
    <script >
        var asistencias = '<?php echo json_encode($_SESSION["asistencias"]) ?>';
        var id = '<?php echo $_SESSION["id_laboratorio"] ?>';
        var url = '/SCEII/alumno/laboratorio/'+id+'/calendario?anio=';
    </script>
    <!-- -->
    @section('content')
        <div class="cal">
            {{-- filtro --}}
            <div class="text-center mt-2">
                Año: 
                <select name="anio" id="anio" style="height: auto; width: auto;">
                    {{-- Rango de 2023 - 2030 --}}
                    @for ($i = 2023; $i <= 2030; $i++)
                        <option value="{{$i}}" onclick="window.location.href=url+anio.value" {{ $_GET['anio'] == $i ? "selected" : "" }} >{{$i}}</option>
                    @endfor
                </select>
                {{-- Por algun motivo en celular no redirecciona automaticamente --}}
                <button onclick="window.location.href=url+anio.value">
                    Filtrar
                </button>
            </div>
            {{-- Aquí esta toda la magia uwu --}}
            <div class="cal1"></div>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.8.3/underscore-min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.6/moment.min.js"></script>
            <script  type="text/javascript" src="{{ asset('public/js/clndr.js') }}"></script>
            <script  type="text/javascript" src="{{ asset('public/js/calendar.js') }}"></script>
        </div>
    @endsection

@else
    <!-- REDIRECT -->
@endif