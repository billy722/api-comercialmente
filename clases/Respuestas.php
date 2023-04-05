<?php

 class Respuestas{
    

    public static function registroCreado(){
        Respuestas::responder("ok", "Registro creado");
    }
    public static function registroModificado(){
        Respuestas::responder("ok", "Registro modificado");
    }
    public static function registroEliminado(){
        Respuestas::responder("ok", "Registro eliminado");
    }
    public static function devolverRegistros($registros){
        Respuestas::responder("ok", array("data" => $registros ));
    }

    public static function errorInterno(){
        Respuestas::responder("error", array( "error_id" => 500, "error_msg" => "Error interno del servidor"));
    }

    public static function datosIncorrectos(){
        Respuestas::responder("error", array("error_id" => 204, "error_msg" => "Datos Incorrectos"));
    }

    public static function noAutorizado(){
        Respuestas::responder("error", array("error_id" => 203, "error_msg" => "Datos Incorrectos"));
    }

    public static function faltanDatos(){
        Respuestas::responder("error", array("error_id" => 204, "error_msg" => "Faltan datos en la solicitud"));
    }

    public static function sinRegistros(){
        Respuestas::responder("error", array("error_id" => 201, "error_msg" => "No hay registros"));
    }


    private static function responder($tipo_respuesta,$mensaje){
        
        $respuesta = array (
            "status" => $tipo_respuesta,
            "result" => $mensaje
        );

        return Flight::json($respuesta);
    }

 }

?>