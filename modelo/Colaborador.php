<?php

class Colaborador extends Conexion{

    private $id;
    private $nombre;
    private $correo;
    private $telefono;
    private $funciones;
    private $estado;
    

    public function obtenerColaborador(){

        $resultado = $this->obtenerRegistros("select * from tb_colaboradores");
        if($resultado){
            Respuestas::devolverRegistros($resultado);
        }else{
            Respuestas::sinRegistros();
        }
    }

    public function crearColaborador(){

        //se reciben los datos enviados por post
        $datos = Flight::request()->query;

        //pregunto si vienen los datos necesarios
        if($datos->correo==null || $datos->nombre==null || $datos->telefono==null || $datos->funciones==null){

            Respuestas::faltanDatos();

        }else{
        
            //ASIGNO LOS DATOS
            $this->setId($datos['id']);
            $this->setNombre($datos['nombre']);
            $this->setCorreo($datos['correo']);
            $this->setTelefono($datos['telefono']);
            $this->setFunciones($datos['funciones']);
            $this->setEstado(1);

            if($this->crearRegistro("INSERT INTO tb_colaboradores (nombre,correo, telefono, funciones, estado) VALUES ('$this->nombre','$this->correo', '$this->telefono', '$this->funciones', '$this->estado')")){
                Respuestas::registroCreado();
            }else{
                Respuestas::errorInterno();
            }   
        }  

    }

    public function modificarColaborador(){

        //se reciben los datos enviados por post
        $datos = Flight::request()->query;

        //pregunto si vienen los datos necesarios
        if($datos->id==null || $datos->correo==null || $datos->telefono==null || $datos->estado==null){

            Flight::json("204"); //FALTAN DATOS

        }else{
        
            //ASIGNO LOS DATOS
            $this->setId($datos['id']);
            $this->setCorreo($datos['correo']);
            $this->setTelefono($datos['telefono']);
            $this->setEstado($datos['estado']);


            if($this->crearRegistro("UPDATE tb_colaboradores SET `correo` = 'hhrh',
                                                                  `telefono` = '2133', 
                                                                  `estado` = '2'
                                                                   WHERE (`id_colaborador` = '1')")){
                Flight::json("201");//COLABORADOR MODIFICADO
            }else{
                Flight::json("406");//SOLICITUD RECIBIDA P
            }   
        }  

    }

 
    public function eliminarColaborador(){

        //se reciben los datos enviados por post
        $datos = Flight::request()->query;

        //pregunto si vienen los datos necesarios
        if($datos->id_colaborador==null){

            Respuestas::faltanDatos();

        }else{
            $this->setId($datos['id_colaborador']);

            if($this->crearRegistro("DELETE FROM tb_colaboradores WHERE id_colaborador = $this->id" )){
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
    public function setNombre($nombre){
        $this->nombre = $nombre;
    }
    public function setCorreo($correo){
        $this->correo = $correo;
    }
    public function setTelefono($telefono){
        $this->telefono = $telefono;
    }
    
    public function setFunciones($funciones){
        $this->funciones = $funciones;
    }
    public function setEstado($estado){
        $this->estado = $estado;
    }
    
    





}

?>