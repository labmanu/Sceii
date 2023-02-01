<?php
header('Content-Type: application/json');
include("../controllers/enlacesController.php");
    
    


    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $enlaces = new enlacesController();
        $data = (json_decode(file_get_contents('php://input'),true));
        $enlaces->crea_enlace($data);
        exit;
    }

    if($_SERVER['REQUEST_METHOD'] == "GET"){
        $id = $_REQUEST['id'];
        $enlaces = new enlacesController();
        $enlaces->get_enlace($id);
        exit;
    }

    
   
?>