<?php

class Problematica extends Conexion{

    private $id;
    private $nombre;
    private $descripcion;
    

    public function obtenerProblematica(){

        $resultado = $this->obtenerRegistros("select * from tb_problematica");
        Flight::json($resultado);
    }

    public function crearProblematica(){

        //se reciben los datos enviados por post
        $datos = Flight::request()->query;

        //pregunto si vienen los datos necesarios
        if($datos->id==null || $datos->nombre==null || $datos->descripcion==null){

            Flight::json("204"); //FALTAN DATOS

        }else{
        
            //ASIGNO LOS DATOS
            $this->setId($datos['id']);
            $this->setPregunta($datos['nombre']);
            $this->setEstado($datos['descripcion']);


            if($this->crearRegistro("INSERT INTO tb_problematica (`nombre`, `descripcion`) VALUES ('.$this->nombre.', '.$this->descripcion.')")){
                Flight::json("201");//PROBLEMATICA CREADA
            }else{
                Flight::json("406");//SOLICITUD RECIBIDA P
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
            $this->setPregunta($datos['nombre']);
            $this->setEstado($datos['descripcion']);


            if($this->crearRegistro("UPDATE tb_problematica SET `nombre` = '.$this->nombre.', 
                                                                `descripcion` = '.$this->descripcion.' 
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
        if($datos->id==null || $datos->nombre==null || $datos->descripcion==null){

            Flight::json("204"); //FALTAN DATOS

        }else{
        
            //ASIGNO LOS DATOS
            $this->setId($datos['id']);
            $this->setPregunta($datos['nombre']);
            $this->setEstado($datos['descripcion']);


            if($this->crearRegistro("DELETE FROM tb_problematica WHERE (`id_problematica` = '.$this->id.')")){
                Flight::json("201");//PROBLEMATICA ELIMINADO
            }else{
                Flight::json("406");//SOLICITUD RECIBIDA P
            }   
        }  

    }




    //SETTERS
    public function setId($id){
        $this->id = $id;
    }
    public function setNombre($nombre){
        $this->nombre = $nombre;
    }
    public function setDescripcion($descripcion){
        $this->descripcion = $descripcion;
    }
    
    





}

?>