<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use App\Http\Requests;

class Controller extends BaseController {
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function raiz(Request $request){
        session_start();
        if(isset($_SESSION["data"])){
            return redirect()->route($_SESSION["data"]->tipoUsuario);
        }else
            return view('login');
    }

    public function login(Request $request){
        $body = [
            "correo" => $request->get("correo"),
            "clave" => $request->get("clave")
        ];
        $responde = Http::post('https://labmanufactura.net/api-sceii/v1/routes/login.php', $body);
        if($responde->successful()){
            /*
            OJO CON EL TIPO DE SESSION
             Session::put                  mantiene la session de laravel abierta   (temporal)
             redirect()->route()->with()   desaparece al recargar la pagina         (uso unico)
            */
            $obj = $responde->Object();
            $data = $obj->data[0];
            //Session::put('data', $data);
            session_start();
            $_SESSION["data"] = $data;
            return redirect()->route('redireccion');
        }else {
            return redirect()->route('/')->with('error', 'Usuario o contraseña incorrecta');
        }
    }

    public function redireccion(){
        session_start();
        //  if(session()->exists('data'))
        if(isset($_SESSION["data"])){
            if($_SESSION["data"]->tipoUsuario === "alumno"){
                //$this->getLaboratorios($_SESSION["data"]->token);
                return redirect()->route('alumno');
            }else if($_SESSION["data"]->tipoUsuario === "docente"){
                return view('docente.home');
            }else if($_SESSION["data"]->tipoUsuario === "visitante"){
                return view('visitante.home');
            }else{
                //echo "Tipo de usuario NO valido";
                return redirect()->route('/');
            }
        }else{
            //echo "No existe la session";
            return redirect()->route('/');
        }
    }

    public function alumno(){
        session_start();
        if(isset($_SESSION["data"])){
            $this->getLaboratorios($_SESSION["data"]->token);
            return view('alumno.home');
        }else{
            return redirect()->route('/');
        }
    }

    public function logOut(){
        //Session::forget('data');
        //Session::flush();
        session_start();
        session_destroy();
        return redirect()->route('/');
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
                //var_dump($_SESSION["laboratorios"]);
            } else {
                //echo "ERROR al buscar laboratorios";
                return redirect()->route('/');
            }
        }else{
            //echo "ERROR no existe el token en laboratorios";
            return redirect()->route('/');
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
                $_SESSION["id_laboratorio"] = $id;
                //var_dump($_SESSION["laboratorio"]);
                return view('alumno.laboratorio');
            } else {
                //echo "ERROR al buscar laboratorio";
                return redirect()->route('/');
            }
        }else{
            //echo "ERROR no existe el token en laboratorio";
            return redirect()->route('/');
        }
    }

    public function asistencia(){
        session_start();
        if(isset($_SESSION["data"]) && isset($_SESSION["id_laboratorio"])){
            return view('alumno.asistencia');
        }else{
            return redirect()->route('/');
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
                return redirect()->route('/');
            }

        }else{
            return redirect()->route('/');
        }
    }

    public function editar(){
        session_start();
        if(isset($_SESSION["data"])){
            return view('alumno.editar');
        }else{
            return redirect()->route('/');
        }
    }

    public function compas(){
        session_start();
        if(isset($_SESSION["data"])){
            return view('alumno.compas');
        }else{
            return redirect()->route('/');
        }
    }

    public function calendario(){
        session_start();
        if(isset($_SESSION["data"])){
            $body = [
                "id_laboratorio" => $_SESSION["id_laboratorio"],
                "annio" => date("Y")
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
                return redirect()->route('/');
            }
            
        }else{
            return redirect()->route('/');
        }
    }

}
