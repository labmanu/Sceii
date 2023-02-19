<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class Controller extends BaseController {
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function raiz(){
        session_start();
        if(isset($_SESSION["data"])){
            return redirect()->route($_SESSION["data"]->tipoUsuario);
        }else
            return view('login');
    }

    public function recuperar(){
        return view('recuperar.correo');
    }

    public function validar(){
        return view('recuperar.validar');
        // if(isset($_POST["correo"])){
        //     $responde = Http::get('https://labmanufactura.net/api-sceii/v1/routes/recuperacionCuenta.php?correo='.$_POST["correo"]);
        //     if ($responde->successful()) {
        //         $obj = $responde->Object();
        //         $msj = $obj->message;
        //         $code = $obj->data->codigo;
        //         //echo $msj." ".$code;
        //         //$_POST["correo"] = $_POST["correo"];
        //         $_POST["msj"] = $msj; 
        //         $_POST["code"] = $code;
        //         //echo $_POST["msj"]." ".$_POST["code"];  
        //         return view('recuperar.validar');
        //     } else {
        //         //echo "ERROR al enviar el código";
        //     }
        // }else{
        //     // echo "No existe el correo";
        //     return redirect()->route('/');
        // }
    }

    public function verificar(){
        return view('recuperar.validar');
    }

    public function confirmar(){
        return view('recuperar.confirmar');
    }

    public function login(Request $request){
        $body = [
            "correo" => $request->get("correo"),
            "clave" => $request->get("clave")
        ];
        $responde = Http::post('https://labmanufactura.net/api-sceii/v1/routes/login.php', $body);
        if($responde->successful()){
            $obj = $responde->Object();
            $data = $obj->data[0];
            session_start();
            $_SESSION["data"] = $data;
            return redirect()->route('redireccion');
        }else {
            return redirect()->route('/')->with('error', 'Usuario o contraseña incorrecta');
        }
    }

    public function redireccion(){
        session_start();
        if(isset($_SESSION["data"])){
            if($_SESSION["data"]->tipoUsuario === "alumno"){
                return redirect()->route('alumno');
            }else if($_SESSION["data"]->tipoUsuario === "docente"){
                //return view('docente.home');
            }else if($_SESSION["data"]->tipoUsuario === "visitante"){
                //return view('visitante.home');
            }else{
                //echo "Tipo de usuario NO valido";
                return redirect()->route('/')->with('msj', '');
            }
        }else{
            //echo "No existe la session";
            return redirect()->route('/')->with('msj', '');
        }
    }

    public function logOut(){
        session_start();
        session_destroy();
        return redirect()->route('/');
    }

    public function alumno(){
        session_start();
        if(isset($_SESSION["data"])){
            $this->alumno_laboratorios($_SESSION["data"]->token);
            return view('alumno.home');
        }else{
            return redirect()->route('/')->with('msj', '');
        }
    }

    public function alumno_laboratorios($token) {
        if (isset($_SESSION["data"])) {
            $responde = Http::withHeaders([
                'Authorization' => $token,
                'Content-Type' => 'application/json'
            ])->get('https://labmanufactura.net/api-sceii/v1/routes/alumno_laboratorio.php');
            if ($responde->successful()) {
                $obj = $responde->Object();
                $data = $obj->data;
                $_SESSION["laboratorios"] = $data;
                //var_dump($_SESSION["laboratorios"]);
            } else {
                //echo "ERROR al buscar laboratorios";
                return redirect()->route('/')->with('msj', '');
            }
        }else{
            //echo "ERROR no existe el token en laboratorios";
            return redirect()->route('/')->with('msj', '');
        }
    }

    public function perfil(){
        session_start();
        if(isset($_SESSION["data"])){
            $token = $_SESSION["data"]->token;
            $responde = Http::withHeaders([
                'Authorization' => $token,
                'Content-Type' => 'application/json'
            ])->get('https://labmanufactura.net/api-sceii/v1/routes/usuario.php');
            if ($responde->successful()) {
                $obj = $responde->Object();
                $perfil = $obj->data[0];
                $_SESSION["perfil"] = $perfil;
                return view('alumno.perfil');
            } else {
                //echo "ERROR al buscar perfil";
                return redirect()->route('/')->with('msj', '');
            }
        }else{
            return redirect()->route('/')->with('msj', '');
        }
    }

    public function editar(){
        session_start();
        if(isset($_SESSION["data"])){
            $token = $_SESSION["data"]->token;
            $responde = Http::withHeaders([
                'Authorization' => $token,
                'Content-Type' => 'application/json'
            ])->get('https://labmanufactura.net/api-sceii/v1/routes/usuario.php');
            if ($responde->successful()) {
                $obj = $responde->Object();
                $perfil = $obj->data[0];
                $_SESSION["perfil"] = $perfil;
                return view('alumno.editar');
            } else {
                //echo "ERROR al buscar perfil";
                return redirect()->route('/')->with('msj', '');
            }
        }else{
            return redirect()->route('/')->with('msj', '');
        }
    }

    public function laboratorio($id) {
        session_start();
        if (isset($_SESSION["data"]) && isset($_SESSION["laboratorios"])) {
            //echo $id;
            $token = $_SESSION["data"]->token;
            $responde = Http::withHeaders([
                'Authorization' => $token,
                'Content-Type' => 'application/json'
            ])->get('https://labmanufactura.net/api-sceii/v1/routes/laboratorio.php?id='.$id);
            if ($responde->successful()) {
                $obj = $responde->Object();
                //var_dump($obj);
                $lab = $obj->data[0];

                /* 
                    Creo que se debe validar que el laboratorio no este vacio
                    En caso que se manipule el id del url
                */

                $_SESSION["laboratorio"] = $lab;
                $_SESSION["id_laboratorio"] = $id;
                return view('alumno.laboratorio');
            } else {
                //echo "ERROR al buscar laboratorio";
                return redirect()->route('/')->with('msj', '');
            }
        }else{
            //echo "ERROR no existe el token en laboratorio";
            return redirect()->route('/')->with('msj', '');
        }
    }

    public function asistencia(){
        session_start();
        if(isset($_SESSION["data"]) && isset($_SESSION["laboratorios"]) 
        && isset($_SESSION["laboratorio"]) && isset($_SESSION["id_laboratorio"])){
            return view('alumno.asistencia');
        }else{
            return redirect()->route('/')->with('msj', '');
        }
    }

    public function calendario(){
        session_start();
        if(isset($_SESSION["data"]) && isset($_GET["anio"]) && isset($_SESSION["laboratorios"]) 
        && isset($_SESSION["laboratorio"]) && isset($_SESSION["id_laboratorio"])){
            $body = [
                "id_laboratorio" => $_SESSION["id_laboratorio"],
                "annio" => $_GET["anio"]
            ];
            $token = $_SESSION["data"]->token;
            $responde = Http::withHeaders([
                'Authorization' => $token,
                'Content-Type' => 'application/json'
            ])->post('https://labmanufactura.net/api-sceii/v1/routes/bitacora_calendar.php', $body);
            if ($responde->successful()) {

                $obj = $responde->Object();
                $dias = $obj->data;
                $_SESSION["asistencias"] = $dias;
                return view('alumno.calendario');
            } else {
                //echo "ERROR al buscar asistencias";
                return redirect()->route('/')->with('msj', '');
            }
        }else{
            return redirect()->route('/')->with('msj', '');
        }
    }

    public function compas(){
        session_start();
        if(isset($_SESSION["data"]) && isset($_SESSION["laboratorios"]) 
        && isset($_SESSION["laboratorio"]) && isset($_SESSION["id_laboratorio"])){
            $responde = Http::get('https://labmanufactura.net/api-sceii/v1/routes/laboratorio.php?id_lab='.$_SESSION["id_laboratorio"]);
            if ($responde->successful()) {
                $obj = $responde->Object();
                $compas = $obj->data;
                $_SESSION["compas"] = $compas;
                return view('alumno.compas');
            } else {
                //echo "ERROR al buscar compañeros";
                return redirect()->route('/')->with('msj', '');
            }
        }else{
            return redirect()->route('/')->with('msj', '');
        }
    }

}
