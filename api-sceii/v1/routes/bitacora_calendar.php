<?php
header('Content-Type: application/json');
include("../controllers/bitacoraController.php");
    
    


    if($_SERVER['REQUEST_METHOD'] == "POST"){
        //$tipoUsuario = $_REQUEST['tipo'];
        if(isset($_REQUEST['date'])){
            $date = $_REQUEST['date'];
            $bitacora = new bitacoraController();
            $data = (json_decode(file_get_contents('php://input'),true));
            $bitacora->bitacora_by_one_date($data, $date);
            exit;
        }else{
            $bitacora = new bitacoraController();
            $data = (json_decode(file_get_contents('php://input'),true));
            $bitacora->bitacora_by_usuario($data);
            exit;
        }
        
    }

   
?>