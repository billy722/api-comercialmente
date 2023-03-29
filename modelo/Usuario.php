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

     public function modificarUsuario(){

        //se reciben los datos enviados por post
        $datos = Flight::request()->query;

        //pregunto si vienen los datos necesarios
        if($datos->correo==null || $datos->clave==null || $datos->estado==null || $datos->perfil==null){

            Flight::json("204"); //FALTAN DATOS

        }else{
        
            //ASIGNO LOS DATOS
            $this->setId($datos['id']);
            $this->setCorreo($datos['correo']);
            $this->setClave($datos['clave']);
            $this->setEstado($datos['estado']);
            $this->setPerfil($datos['perfil']);

    

           if($this->crearRegistro ("update tb_usuarios SET correo = ".$this->correo.",     
                                                           clave = '.$this->clave.', 
                                                           estado = '".$this->estado."',
                                                           perfil = '".$this->perfil."'
             WHERE (id_usuario = '".$this->id."')")){
                Flight::json("201");//USUARIO ACTUALIZADO
            }else{
                Flight::json("406");//SOLICITUD RECIBIDA 
            }   
        }  

    } 


    public function eliminarUsuario(){

        //se reciben los datos enviados por post
        $datos = Flight::request()->query;

        //pregunto si vienen los datos necesarios
        if($datos->correo==null || $datos->clave==null || $datos->estado==null || $datos->perfil==null){

            Flight::json("204"); //FALTAN DATOS

        }else{
        
            //ASIGNO LOS DATOS
            $this->setId($datos['id']);
            $this->setCorreo($datos['correo']);
            $this->setClave($datos['clave']);
            $this->setEstado($datos['estado']);
            $this->setPerfil($datos['perfil']);
 

           if($this->crearRegistro ("delete from tb_usuarios WHERE id_usuario = '".$this->id."'")){
                Flight::json("201");//USUARIO ELIMINADO
            }else{
                Flight::json("406");//SOLICITUD RECIBIDA 
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