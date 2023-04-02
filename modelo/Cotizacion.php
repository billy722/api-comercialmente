<?php

class Cotizacion extends Conexion{

    private $id_cotizacion;
    private $fecha_creacion;
    private $fecha_vencimiento;
    private $id_cliente;
    private $estado;
    

    public function obtenerCotizacion(){

        $resultado = $this->obtenerRegistros("select * from tb_cotizaciones");
        Flight::json($resultado);
    }

    public function crearCotizacion(){

        //se reciben los datos enviados por post
        $datos = Flight::request()->query;

        //pregunto si vienen los datos necesarios
        if($datos->fecha_creacion==null || $datos->fecha_vencimiento==null || $datos->id_cliente==null || $datos->estado==null){

            Flight::json("204"); //FALTAN DATOS

        }else{
        
             //ASIGNO LOS DATOS
             $this->setId_Cotizacion($datos['id_cotizacion']);
             $this->setFCreacion($datos['fecha_creacion']);
             $this->setFVencimiento($datos['fecha_vencimiento']);
             $this->setDescripcion($datos['descripcion']);
             $this->setId_Cliente($datos['id_cliente']);
             $this->setEstado($datos['estado']);


            if($this->crearRegistro("insert into tb_cotizaciones (`fecha_creacion`, `fecha_vencimiento`, `descripcion`, `id_cliente`, `estado`) VALUES ('.$this->fecha_creacion.', '..$this->fecha_vencimiento', '.$this->descripcion.', '.$this->id_cliente.', '.$this->estado.')")){
                Flight::json("201");//USUARIO CREADO
            }else{
                Flight::json("406");//SOLICITUD RECIBIDA P
            }   
        }  

    }

    public function modificarCotizacion(){

        //se reciben los datos enviados por put
        $datos = Flight::request()->query;

        //pregunto si vienen los datos necesarios
        if($datos->fecha_creacion==null || $datos->fecha_vencimiento==null || $datos->id_cliente==null || $datos->estado==null){

            Flight::json("204"); //FALTAN DATOS

        }else{
        
             //ASIGNO LOS DATOS
             $this->setId_Cotizacion($datos['id_cotizacion']);
             $this->setFCreacion($datos['fecha_creacion']);
             $this->setFVencimiento($datos['fecha_vencimiento']);
             $this->setDescripcion($datos['descripcion']);
             $this->setId_Cliente($datos['id_cliente']);
             $this->setEstado($datos['estado']);


            if($this->crearRegistro("update tb_cotizaciones SET `fecha_creacion` = '.$this->fecha_creacion.',
                                                                `fecha_vencimiento` = '.$this->fecha_vencimiento.', 
                                                                `descripcion` = '.$this->descripcion.', 
                                                                `id_cliente` = '.$this->id_cliente.', 
                                                                `estado` = '.$this->estado.' 
                                                                WHERE (`id_cotizacion` = '.$this->id_cotizacion.')")){
                Flight::json("201");//COTIZACION CREADA
            }else{
                Flight::json("406");//SOLICITUD RECIBIDA P
            }   
        }  

    }

    public function eliminarCotizacion(){

        //se reciben los datos enviados por DELETE
        $datos = Flight::request()->query;

        //pregunto si vienen los datos necesarios
        if($datos->fecha_creacion==null || $datos->fecha_vencimiento==null || $datos->id_cliente==null || $datos->estado==null){

            Flight::json("204"); //FALTAN DATOS

        }else{
        
             //ASIGNO LOS DATOS
             $this->setId_Cotizacion($datos['id_cotizacion']);
             $this->setFCreacion($datos['fecha_creacion']);
             $this->setFVencimiento($datos['fecha_vencimiento']);
             $this->setDescripcion($datos['descripcion']);
             $this->setId_Cliente($datos['id_cliente']);
             $this->setEstado($datos['estado']);


            if($this->crearRegistro("delete from tb_cotizaciones WHERE (`id_cotizacion` = '.$this->id_cotizacion.')")){
                Flight::json("201");//COTIZACION ELIMINADA
            }else{
                Flight::json("406");//SOLICITUD RECIBIDA P
            }   
        }  

    }


    //SETTERS
    public function setId_Cotizacion($id_cotizacion){
        $this->id_cotizacion = $id_cotizacion;
    }
    public function setFCreacion($fecha_creacion){
        $this->fecha_creacion = $fecha_creacion;
    }
    public function setFVencimiento($fecha_vencimiento){
        $this->fecha_vencimiento = $fecha_vencimiento;
    }
    public function setDescrpcion($descripcion){
        $this->descripcion = $descripcion;
    }
    public function setId_Cliente($id_cliente){
        $this->id_cliente = $id_cliente;
    }
    public function setEstado($estado){
        $this->estado = $estado;
    }

      


}

?>