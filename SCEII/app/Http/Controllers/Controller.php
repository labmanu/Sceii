<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use App\Http\Requests;
use Session;

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
            Session::put('data', $data);
            return redirect()->route('redireccion')->with('message', $message);
        }else {
            return redirect()->route('redireccion')->with('error', 'No se pudo iniciar la sesión, verifique sus datos');
        }
    }

    public function redireccion(){
        if(session()->exists('data')){
            if(session()->get('data')->tipoUsuario === "alumno"){
                return view('alumno.home');
            }else if(session()->get('data')->tipoUsuario === "docente"){
                return view('docente.home');
            }else if(session()->get('data')->tipoUsuario === "visitante"){
                return view('visitante.home');
            }else{
                return view('login'); // Tipo de usuario NO valido
            }
        }else{
            return view('login'); // No existe la session
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
        return view('login');
    }

}
