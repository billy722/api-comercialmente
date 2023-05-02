<?php

class Cliente extends Conexion{

    private $id;
    private $rut;
    private $nombre;
    private $telefono;
    private $correo;

    public function obtenerClientes(){

        // $resultado = $this->obtenerRegistros("select * from tb_clientes");
        // Respuestas::devolverRegistros($resultado);

        $respuesta = "ahi van los clientes socio";
        Flight::json($respuesta);
    }

    public function obtenerCliente(){
        $datos = Flight::request()->query;

        //pregunto si vienen los datos necesarios
        if($datos->id_cliente==null){

            Respuestas::faltanDatos();

        }else{
            $this->setId($datos['id_cliente']);
            $resultado = $this->obtenerRegistros("select * from tb_clientes where id_cliente=".$this->id);
            Respuestas::devolverRegistros($resultado);
        }    
    }

    public function crearCliente(){

        //se reciben los datos enviados por post
        $datos = Flight::request()->query;

        //pregunto si vienen los datos necesarios
        if($datos->rut==null || $datos->nombre==null || $datos->telefono==null || $datos->correo==null){

            Respuestas::faltanDatos();

        }else{
        
            //ASIGNO LOS DATOS
            $this->setRut($datos['rut']);
            $this->setNombre($datos['nombre']);
            $this->setTelefono($datos['telefono']);
            $this->setCorreo($datos['correo']);


            if($this->crearRegistro("INSERT INTO tb_clientes (rut_cliente, nombre, telefono, correo) values('$this->rut','$this->nombre','$this->telefono','$this->correo');")){
                Respuestas::registroCreado();
            }else{
                Respuestas::errorInterno();
            }   
        }  

    }

    public function modificarCliente(){

        //se reciben los datos enviados por put
        $datos = Flight::request()->query;

        //pregunto si vienen los datos necesarios
        if($datos->rut==null || $datos->nombre==null || $datos->telefono==null || $datos->correo==null){

            Respuestas::faltanDatos();

        }else{
        
            //ASIGNO LOS DATOS
            $this->setId($datos['id']);
            $this->setRut($datos['rut']);
            $this->setNombre($datos['nombre']);
            $this->setTelefono($datos['telefono']);
            $this->setCorreo($datos['correo']);


            if($this->crearRegistro("update tb_clientes SET rut_cliente = '".$this->rut."',
                                                            nombre = '".$this->nombre."', 
                                                            telefono = '".$this->telefono."',
                                                            correo = '".$this->correo."'
                         WHERE id_cliente = '".$this->id."'")){
                
                Respuestas::registroModificado();
            }else{
                Respuestas::errorInterno();
            }   
        }  

    }

    public function eliminarCliente(){

        //se reciben los datos enviados por delete
        $datos = Flight::request()->query;

        //pregunto si vienen los datos necesarios
        if($datos->id==null){

            Respuestas::faltanDatos();

        }else{
        
            //ASIGNO LOS DATOS
            $this->setId($datos['id']);

            if($this->crearRegistro("delete from tb_clientes WHERE id_cliente = '".$this->id."'")){
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