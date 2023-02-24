<?php
set_error_handler(function($errno, $errstr, $errfile, $errline) {
    // error was suppressed with the @-operator
    if (0 === error_reporting()) {
        return false;
    }
    
    throw new ErrorException($errstr, 0, $errno, $errfile, $errline);
});

require_once('connection.php');
require_once('usuarioDAO.php');
        try{
            $bd = new baseDatos();
            date_default_timezone_set('America/Mexico_City');
            $date_time = date("Y-m-d 19:00:00");  
            $bd->consulta("CALL registar_salidas('".$date_time."');");
            echo 'Exito';
        }
        catch (Exception $e){
            echo $e;
        }
        
?>