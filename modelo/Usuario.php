<?php

class Usuario extends Conexion{

    private $id;
    private $correo;
    private $clave;
    private $estado;
    private $perfil;
    

    public function obtenerUsuario(){

        $resultado = $this->obtenerRegistros("select * from tb_usuarios");
        Flight::json($resultado);
    }

    public function crearUsuario(){

        //se reciben los datos enviados por post
        $datos = Flight::request()->query;

        //pregunto si vienen los datos necesarios
        if($datos->correo==null || $datos->clave==null || $datos->estado==null || $datos->perfil==null){

            Flight::json("204"); //FALTAN DATOS

        }else{
        
            //ASIGNO LOS DATOS
            $this->setCorreo($datos['correo']);
            $this->setClave($datos['clave']);
            $this->setEstado($datos['estado']);
            $this->setPerfil($datos['perfil']);


            if($this->crearRegistro("insert into tb_usuarios (correo, clave, estado, perfil) values('$this->correo','$this->clave','$this->estado','$this->perfil');")){
                Flight::json("201");//USUARIO CREADO
            }else{
                Flight::json("406");//SOLICITUD RECIBIDA P
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
    public function setClave($clave){
        $this->clave = $clave;
    }
    public function setEstado($estado){
        $this->estado = $estado;
    }
    public function setPerfil($perfil){
        $this->perfil = $perfil;
    }

    





}

?>