<?php

class Cuestionario extends Conexion{

    private $id_cuestionario;
    private $fecha_creacion;
    private $id_cliente;
    

    public function obtenerCuestionario(){

        $resultado = $this->obtenerRegistros("select * from tb_cuestionario");
        Flight::json($resultado);
    }

    public function crearCuestionario(){

        //se reciben los datos enviados por post
        $datos = Flight::request()->query;

        //pregunto si vienen los datos necesarios
        if($datos->id==null || $datos->fecha_creacion==null || $datos->id_cliente==null){

            Flight::json("204"); //FALTAN DATOS

        }else{
        
            //ASIGNO LOS DATOS
            $this->setIdCuestionario($datos['id']);
            $this->setFechaCreacion($datos['fecha_creacion']);
            $this->setIdCliente($datos['id_cliente']);


            if($this->crearRegistro("INSERT INTO tb_cuestionario (`fecha_creacion`, `id_cliente`) VALUES ('.$this->fecha_creacion.', '.$this->id_cliente.')")){
                Flight::json("201");//CUESTIONARIO CREADO
            }else{
                Flight::json("406");//SOLICITUD RECIBIDA P
            }   
        }  

    }

    public function modificarCuestionario(){

        //se reciben los datos enviados por put
        $datos = Flight::request()->query;

        //pregunto si vienen los datos necesarios
        if($datos->id==null || $datos->fecha_creacion==null || $datos->id_cliente==null){

            Flight::json("204"); //FALTAN DATOS

        }else{
        
            //ASIGNO LOS DATOS
            $this->setIdCuestionario($datos['id']);
            $this->setFechaCreacion($datos['fecha_creacion']);
            $this->setIdCliente($datos['id_cliente']);


            if($this->crearRegistro("UPDATE tb_cuestionario SET `fecha_creacion` = '.$this->fecha_creacion.', 
                                                                `id_cliente` = '.$this->id_cliente.' 
                                                            WHERE (`id_cuestionario` = '.$this->id.');")){
                Flight::json("201");//CUESTIONARIO MODIFICADO
            }else{
                Flight::json("406");//SOLICITUD RECIBIDA P
            }   
        }  

    }

 
    public function eliminarCuestionario(){

        //se reciben los datos enviados por delete
        $datos = Flight::request()->query;

        //pregunto si vienen los datos necesarios
        if($datos->id==null || $datos->fecha_creacion==null || $datos->id_cliente==null){

            Flight::json("204"); //FALTAN DATOS

        }else{
        
            //ASIGNO LOS DATOS
            $this->setIdCuestionario($datos['id']);
            $this->setFechaCreacion($datos['fecha_creacion']);
            $this->setIdCliente($datos['id_cliente']);


            if($this->crearRegistro("DELETE FROM tb_cuestionario WHERE (`id_cuestionario` = '.$this->id.')")){
                Flight::json("201");//CUESTIONARIO ELIMINADO
            }else{
                Flight::json("406");//SOLICITUD RECIBIDA P
            }   
        }  

    }




    //SETTERS
    public function setIdCuestionario($id){
        $this->id = $id;
    }
    public function setFechaCreacion($fecha_creacion){
        $this->fecha_creacion = $fecha_creacion;
    }
    public function setIdCliente($id_cliente){
        $this->id_cliente = $id_cliente;
    }
    
    





}

?>