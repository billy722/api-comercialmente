<?php

class Colaborador extends Conexion{

    private $id;
    private $correo;
    private $telefono;
    private $estado;
    

    public function obtenerColaborador(){

        $resultado = $this->obtenerRegistros("select * from tb_colaboradores");
        Flight::json($resultado);
    }

    public function crearColaborador(){

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


            if($this->crearRegistro("INSERT INTO tb_colaboradores (`id_colaborador`, `correo`, `telefono`, `estado`) VALUES ('.$this->id.', '.$this->correo.', '$this->telefono', '$this->estado')")){
                Flight::json("201");//COLABORADOR CREADO
            }else{
                Flight::json("406");//SOLICITUD RECIBIDA P
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
        if($datos->id==null){

            Respuestas::faltanDatos();

        }else{
            $this->setId($datos['id']);

            if($this->crearRegistro("DELETE FROM tb_colaboradores WHERE (`id_colaborador` = '.$this->id.')")){
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
    public function setCorreo($correo){
        $this->correo = $correo;
    }
    public function setTelefono($telefono){
        $this->telefono = $telefono;
    }
    public function setEstado($estado){
        $this->estado = $estado;
    }
    
    





}

?>