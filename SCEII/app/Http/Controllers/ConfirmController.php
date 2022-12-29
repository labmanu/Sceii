<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ConfirmController extends Controller
{
    public function start($token)
    {
        $responde = Http::withHeaders([
            'Authorization' => $token,
            'Content-Type' => 'application/json'
        ])->post('https://labmanufactura.net/api-sceii/v1/routes/registro.php?tipo=alta');
        if ($responde->successful()) {
            $obj = $responde->Object();
            $message = $obj->message;
            if ($message == 'Su cuenta ha sido dada de alta exitosamente')
                return view("registro.confirmar")->with('nombre', $obj->data->nombre);
            else {
                    return view("registro.confirmar")->with('error', 'error');
            }
        } else {
            $obj = $responde->Object();
            $message = $obj->message;
            if ($message == 'La cuenta ya se encuentra dada de alta')
                return view("registro.confirmar")->with('anterior', $message);
            else {
                return view("registro.confirmar")->with('error', 'error');
            }

        }
    }
}