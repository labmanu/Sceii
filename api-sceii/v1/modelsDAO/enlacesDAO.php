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

    class enlacesDAO extends baseDatos{  
        
        
        function crear($data,$id_jefe_laboratorio){
            try{
            $user = new usuarioDAO;
            $id_jefe_laboratorio = $user->getIdTypeUser($id_jefe_laboratorio);    
            $parms="";
            $parms.="'".$data['nombre']."'";
            $parms.=",'".$data['descripcion']."'";
            $parms.=",'".$data['enlace']."'";
            $parms.=",'".$data['tipo_enlace']."'";
            $parms.=",'".$data['id_laboratorio']."'";
            $parms.=",'".$id_jefe_laboratorio."'";
           
                
            $this->consulta("CALL crea_enlace(".$parms.");");
                $array = array (
                    "status" => true,
                );
                return $array;
                }
                catch (Exception $e){
                $array = [
                    "status" => false,
                    "error" => $e->getMessage(),
                    ];
                return $array;
                }
        }


        function get_enlace($id){
            try{
                $this->consulta("CALL get_enlace('".$id."');");
                $asoc = $this->get_array_query();
                $array = array (
                    "status" => true,
                    "data" => $asoc);
                return $array;
            }
            catch(Exception $e){
                $array = [
                    "status" => false,
                    "error" => $e->getMessage(),
                    ];
                return $array;
        }

       
    
        
    }
}
    
    

?>