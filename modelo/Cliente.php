<?php

class Cliente extends Conexion{

    private $id;
    private $rut;
    private $nombre;
    private $telefono;
    private $correo;

    public function obtenerClientes(){

        $resultado = $this->obtenerRegistros("select * from tb_clientes");
        Flight::json($resultado);
    }

    public function crearCliente(){

        //se reciben los datos enviados por post
        $datos = Flight::request()->query;

        //pregunto si vienen los datos necesarios
        if($datos->rut==null || $datos->nombre==null || $datos->telefono==null || $datos->correo==null){

            Flight::json("204"); //FALTAN DATOS

        }else{
        
            //ASIGNO LOS DATOS
            $this->setRut($datos['rut']);
            $this->setNombre($datos['nombre']);
            $this->setTelefono($datos['telefono']);
            $this->setCorreo($datos['correo']);


            if($this->crearRegistro("INSERT INTO tb_clientes (rut_cliente, nombre, telefono, correo) values('$this->rut','$this->nombre','$this->telefono','$$this->correo');")){
                Flight::json("201");//REGISTRO CREADO
            }else{
                Flight::json("406");//SOLICITUD RECIBIDA P
            }   
        }  

    }


    //SETTERS
    public function setId($id){
        $this->id = $id;
    }
    public function setRut($rut){
        $this->rut = $rut;
    }
    public function setNombre($nombre){
        $this->nombre = $nombre;
    }
    public function setTelefono($telefono){
        $this->telefono = $telefono;
    }
    public function setCorreo($correo){
        $this->correo = $correo;
    }

    





}

?>