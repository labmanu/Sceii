<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use App\Http\Requests;
//use Session;

class Controller extends BaseController {
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function signin(Request $request){
        $body = [
            "correo" => $request->get("correo"),
            "clave" => $request->get("clave")
        ];
        $responde = Http::post('https://labmanufactura.net/api-sceii/v1/routes/login.php', $body);
        if($responde->successful()){
            /*
            OJO CON EL TIPO DE SESSION
             Session::put                     mantiene la session abierta         (temporal)
             redirect()->route()->with()      desaparece al recargar la pagina    (uso unico)
            */

            $obj = $responde->Object();
            $message = $obj->message[0];
            $data = $obj->data[0];
            //Session::put('data', $data);
            session_start();
            $_SESSION["data"]= $data;
            //$_SESSION["newsession"]=$value;
            return redirect()->route('redireccion')->with('message', $message);
        }else {
            //return redirect()->route('/')->with('error', 'Datos incorrectos');
            //return view('login', ['e'=>'Datos incorrectos']);
            //return view('login', ['error', 'Datos incorrectos']);
        }
    }

    public function redireccion(){
        session_start();
        //  if(session()->exists('data'))
        if(isset($_SESSION["data"])){
            if($_SESSION["data"]->tipoUsuario === "alumno"){
                $this->getLaboratorios($_SESSION["data"]->token);
                return view('alumno.home');
            }else if($_SESSION["data"]->tipoUsuario === "docente"){
                return view('docente.home');
            }else if($_SESSION["data"]->tipoUsuario === "visitante"){
                return view('visitante.home');
            }else{
                echo "Tipo de usuario NO valido";
                //header("location: /SCEII");
            }
        }else{
            //echo "No existe la session";
            header("location: /SCEII");
        }
    }

    public function nuevoRegistro(Request $request){
        $metodo = $request->get("metodo");
        if($metodo == "insertarAlumno"){
            $body = [
                "nombre" => $request->get("nombre"),
                "apellidos" => $request->get("apellidos"),
                "correo" => $request->get("correo"),
                "clave" => $request->get("clave"),
                "genero" => $request->get("genero"),
                "fecha_nacimiento" => $request->get("fecha_nacimiento"),
                "no_control" => $request->get("no_control"),
                "id_carrera" => $request->get("id_carrera"),
                "id_semestre" => $request->get("id_semestre")
            ];
            //var_dump($body);
            $responde = Http::post('https://labmanufactura.net/api-sceii/v1/routes/registro.php?tipo=alumno', $body);
            if($responde->successful()){
                //var_dump($responde);
                $obj = $responde->Object();
                if(property_exists($obj, 'code')){
                    return redirect()->route('registrado')->with('error', $obj->message[0]);
                }else if(property_exists($obj, 'data')){
                    return redirect()->route('registrado')->with('registrado', 'Alumno Registrado');
                }else{
                    return redirect()->route('registrado')->with('error', 'No se reconocen los datos de la petición');
                }
            }else{
                return redirect()->route('registrado')->with('error', 'No se pudo procesar la petición');
            }
        }else if($metodo == "insertarDocente"){
            $body = [
                "nombre" => $request->get("nombre"),
                "apellidos" => $request->get("apellidos"),
                "correo" => $request->get("correo"),
                "clave" => $request->get("clave"),
                "genero" => $request->get("genero"),
                "fecha_nacimiento" => $request->get("fecha_nacimiento")
            ];
            //var_dump($body);
            $responde = Http::post('https://labmanufactura.net/api-sceii/v1/routes/registro.php?tipo=docente', $body);
            if($responde->successful()){
                //var_dump($responde);
                $obj = $responde->Object();
                if(property_exists($obj, 'code')){
                    return redirect()->route('registrado')->with('error', $obj->message[0]);
                }else if(property_exists($obj, 'data')){
                    return redirect()->route('registrado')->with('registrado', 'Docente Registrado');
                }else{
                    return redirect()->route('registrado')->with('error', 'No se reconocen los datos de la petición');
                }
            }else{
                return redirect()->route('registrado')->with('error', 'No se pudo procesar la petición');
            }
        }else if($metodo == "insertarVisitante"){
            $body = [
                "nombre" => $request->get("nombre"),
                "apellidos" => $request->get("apellidos"),
                "correo" => $request->get("correo"),
                "clave" => $request->get("clave"),
                "genero" => $request->get("genero"),
                "fecha_nacimiento" => $request->get("fecha_nacimiento"),
                "institucion" => $request->get("institucion")
            ];
            //var_dump($body);
            $responde = Http::post('https://labmanufactura.net/api-sceii/v1/routes/registro.php?tipo=visitante', $body);
            if($responde->successful()){
                //var_dump($responde);
                $obj = $responde->Object();
                if(property_exists($obj, 'code')){
                    return redirect()->route('registrado')->with('error', $obj->message[0]);
                }else if(property_exists($obj, 'data')){
                    return redirect()->route('registrado')->with('registrado', 'Visitante Registrado');
                }else{
                    return redirect()->route('registrado')->with('error', 'No se reconocen los datos de la petición');
                }
            }else{
                return redirect()->route('registrado')->with('error', 'No se pudo procesar la petición');
            }
        }
    }

    public function getLogin(){
        
    }

    public function logOut(){
        //Session::forget('data');
        session_start();
        session_destroy();
        //echo "CERRADAAAAAAAAAAAAAAAA";
        header("location: https://labmanufactura.net/SCEII/");
        exit;
    }

    public function getLaboratorios($token) {
        //session_start();
        if (isset($_SESSION["data"])) {
            $responde = Http::withHeaders([
                'Authorization' => $token,
                'Content-Type' => 'application/json'
            ])->get('https://labmanufactura.net/api-sceii/v1/routes/alumno_laboratorio.php');
            if ($responde->successful()) {
                $obj = $responde->Object();
                $data = $obj->data;
                //Session::put('laboratorios', $obj);
                $_SESSION["laboratorios"]= $data;
            } else {
                //echo "ERROR al buscar laboratorios";
                header("location: /SCEII");
            }
        }else{
            //echo "ERROR no existe el token";
            header("location: /SCEII");
        }
    }

    public function laboratorio($id) {
        session_start();
        //if (session()->exists('data'))
        if (isset($_SESSION["data"])) {
            //echo $id;
            $token = $_SESSION["data"]->token;
            $responde = Http::withHeaders([
                'Authorization' => $token,
                'Content-Type' => 'application/json'
            ])->get('https://labmanufactura.net/api-sceii/v1/routes/laboratorio.php?id='.$id);
            if ($responde->successful()) {
                $obj = $responde->Object();
                $lab = $obj->data[0];
                //var_dump($obj);
                //Session::put('laboratorio', $lab);
                $_SESSION["laboratorio"] = $lab;
                //var_dump($_SESSION["laboratorio"]);
                return view('alumno.laboratorio');
            } else {
                echo "ERROR al buscar laboratorios";
                //header("location: /SCEII");
            }
        }else{
            //echo "ERROR no existe el token";
            header("location: /SCEII");
        }
    }

}
