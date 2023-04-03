<?php

class Pregunta extends Conexion{

    private $id;
    private $pregunta;
    private $estado;
    

    public function obtenerPregunta(){

        $resultado = $this->obtenerRegistros("select * from tb_pregunta");
        Flight::json($resultado);
    }

    public function crearPregunta(){

        //se reciben los datos enviados por post
        $datos = Flight::request()->query;

        //pregunto si vienen los datos necesarios
        if($datos->id==null || $datos->pregunta==null || $datos->estado==null){

            Flight::json("204"); //FALTAN DATOS

        }else{
        
            //ASIGNO LOS DATOS
            $this->setId($datos['id']);
            $this->setPregunta($datos['pregunta']);
            $this->setEstado($datos['estado']);


            if($this->crearRegistro("insert into tb_pregunta (`pregunta`, `estado`) VALUES ('.$this->pregunta.', '.$this->estado.')")){
                Flight::json("201");//PREGUNTA CREADA
            }else{
                Flight::json("406");//SOLICITUD RECIBIDA P
            }   
        }  

    }

    public function modificarPregunta(){

        //se reciben los datos enviados por put
        $datos = Flight::request()->query;

        //pregunto si vienen los datos necesarios
        if($datos->id==null || $datos->pregunta==null || $datos->estado==null){

            Flight::json("204"); //FALTAN DATOS

        }else{
        
            //ASIGNO LOS DATOS
            $this->setId($datos['id']);
            $this->setPregunta($datos['pregunta']);
            $this->setEstado($datos['estado']);


            if($this->crearRegistro("UPDATE tb_pregunta SET `pregunta` = '.$this->pregunta.', `estado` = '.$this->estado.' WHERE (`id_pregunta` = '.$this->id.')")){
                Flight::json("201");//COLABORADOR MODIFICADO
            }else{
                Flight::json("406");//SOLICITUD RECIBIDA P
            }   
        }  

    }

 
    public function eliminarPregunta(){

        //se reciben los datos enviados por delete
        $datos = Flight::request()->query;

        //pregunto si vienen los datos necesarios
        if($datos->id==null || $datos->pregunta==null || $datos->estado==null){

            Flight::json("204"); //FALTAN DATOS

        }else{
        
            //ASIGNO LOS DATOS
            $this->setId($datos['id']);
            $this->setPregunta($datos['pregunta']);
            $this->setEstado($datos['estado']);


            if($this->crearRegistro("DELETE FROM tb_pregunta WHERE (`id_pregunta` = '.$this->id.')")){
                Flight::json("201");//COLABORADOR ELIMINADO
            }else{
                Flight::json("406");//SOLICITUD RECIBIDA P
            }   
        }  

    }




    //SETTERS
    public function setId($id){
        $this->id = $id;
    }
    public function setPregunta($pregunta){
        $this->pregunta = $pregunta;
    }
    public function setEstado($estado){
        $this->estado = $estado;
    }
    
    





}

?>