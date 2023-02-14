@if(isset($_SESSION["id_laboratorio"]))

    @extends('templates.alumno')
    @section('title', 'Asistencia con QR o IMG')

    <!-- NO FUNCIONO EL HIDDEN AAAAAAAAA -->
    
    <!-- -->
    <script >
        var token = '<?php echo $_SESSION["data"]->token; ?>';
        var id = '<?php echo $_SESSION["id_laboratorio"] ?>';
    </script>
    <!-- -->
    
    @section('content')
        <div class="asistencia">

            <div id="qr" style="color: white">
                <div id="qr-reader"></div>
                <div id="qr-reader-results"></div>
                <div id="result"></div>
            </div>

            {{-- <script src="https://unpkg.com/html5-qrcode"></script> --}}
            <script  type="text/javascript" src="{{ asset('public/js/html5-qrcode.min.js') }}"></script>
            <script  type="text/javascript" src="{{ asset('public/js/qr.js') }}"></script>
        </div>
    @endsection

@else
    <!-- -->
@endif