<?php
header('Content-Type: application/json');
include("../controllers/laboratorioController.php");
    
    


    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $laboratorio = new laboratorioController();
        $data = (json_decode(file_get_contents('php://input'),true));
        $laboratorio->crea_laboratorio($data);
        exit;
    }

    if($_SERVER['REQUEST_METHOD'] == "GET"){
        $laboratorio = new laboratorioController();
      

        if(isset($_REQUEST['id'])){
            $id = $_REQUEST['id'];
            $laboratorio->get_laboratorio($id);
            exit;
        }

        if(isset($_REQUEST['codigo_acceso'])){
            $codigo_acceso = $_REQUEST['codigo_acceso'];
            $laboratorio->get_laboratorio_cod_acc($codigo_acceso);
            exit;
        }

        if(isset($_REQUEST['id_lab'])){//muestra los alumno inscritos en el laboratorio
            $id = $_REQUEST['id_lab'];
            $laboratorio->get_all_alumno($id);
            exit;
        }
        
        
    }
    
   
?>