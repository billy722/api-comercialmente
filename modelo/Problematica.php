<?php

class Problematica extends Conexion{

    private $id;
    private $descripcion;
    

    public function obtenerProblematica(){

        $resultado = $this->obtenerRegistros("select * from tb_problematica");
        if($resultado){
            Respuestas::devolverRegistros($resultado);
        }else{
            Respuestas::sinRegistros();
        }
    }

    public function crearProblematica(){

        //se reciben los datos enviados por post
        $datos = Flight::request()->query;

        //pregunto si vienen los datos necesarios
        if($datos->descripcion==null){

            Respuestas::faltanDatos();

        }else{
        
            //ASIGNO LOS DATOS
            $this->setDescripcion($datos['descripcion']);

            if($this->crearRegistro("INSERT INTO tb_problematica (descripcion) VALUES ('$this->descripcion')")){
                Respuestas::registroCreado();
            }else{
                 Respuestas::errorInterno();
            }   
        }  

    }

    public function modificarProblematica(){

        //se reciben los datos enviados por put
        $datos = Flight::request()->query;

        //pregunto si vienen los datos necesarios
        if($datos->id==null || $datos->nombre==null || $datos->descripcion==null){

            Flight::json("204"); //FALTAN DATOS

        }else{
        
            //ASIGNO LOS DATOS
            $this->setId($datos['id']);


            if($this->crearRegistro("UPDATE tb_problematica SET descripcion = '.$this->descripcion.' 
                                                            WHERE (`id_problematica` = '.$this->id.')")){
                Flight::json("201");//PROBLEMATICA MODIFICADA
            }else{
                Flight::json("406");//SOLICITUD RECIBIDA P
            }   
        }  

    }

 
    public function eliminarProblematica(){

        //se reciben los datos enviados por delete
        $datos = Flight::request()->query;

        //pregunto si vienen los datos necesarios
        if($datos->id_problematica==null){

            Respuestas::faltanDatos();

        }else{
        
            //ASIGNO LOS DATOS
            $this->setId($datos['id_problematica']);

            if($this->crearRegistro("DELETE FROM tb_problematica WHERE id_problematica = $this->id")){
                Respuestas::registroEliminado();
            }else{
                Respuestas::errorInterno();
            }   
        }  

    }




    //SETTERS
    public function setId($id){
        $this->id = $id;
    }

    public function setDescripcion($descripcion){
        $this->descripcion = $descripcion;
    }
    
    





}

?>