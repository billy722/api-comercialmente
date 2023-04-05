<?php

class Cotizacion extends Conexion{

    private $id_cotizacion;
    private $descripcion;
    private $fecha_creacion;
    private $fecha_vencimiento;
    private $id_cliente;
    private $estado;
    

    public function obtenerCotizaciones(){

        $resultado = $this->obtenerRegistros("select * from vista_cotizaciones_cliente");
        Respuestas::devolverRegistros($resultado);
    }
    
    public function obtenerProductosCotizacion(){

        //se reciben los datos enviados
        $datos = Flight::request()->query;

        //pregunto si vienen los datos necesarios
        if($datos->id_cotizacion==null){

            Respuestas::faltanDatos();

        }else{

            $this->setId_Cotizacion($datos['id_cotizacion']);

            $resultado = $this->obtenerRegistros("SELECT * FROM vista_productos_cotizacion where id_cotizacion=".$this->id_cotizacion);
            Respuestas::devolverRegistros($resultado);
        }
    }
    public function obtenerDatosCotizacion(){

        //se reciben los datos enviados
        $datos = Flight::request()->query;

        //pregunto si vienen los datos necesarios
        if($datos->id_cotizacion==null){

            Respuestas::faltanDatos();

        }else{

            $this->setId_Cotizacion($datos['id_cotizacion']);

            $resultado = $this->obtenerRegistros("select * from tb_cotizaciones where id_cotizacion=".$this->id_cotizacion);
            Respuestas::devolverRegistros($resultado);
        }
    }
    
    public function obtenerCotizacionCliente(){

        //se reciben los datos enviados
        $datos = Flight::request()->query;

        //pregunto si vienen los datos necesarios
        if($datos->id_cliente==null){

            Respuestas::faltanDatos();

        }else{

            $this->setId_Cliente($datos['id_cliente']);

            $resultado = $this->obtenerRegistros("select * from vista_cotizaciones_cliente where id_cliente=".$this->id_cliente);
            Respuestas::devolverRegistros($resultado);
        }
    }

    public function crearCotizacion(){

        //se reciben los datos enviados por post
        $datos = Flight::request()->query;

        //pregunto si vienen los datos necesarios
        if($datos->fecha_vencimiento==null || $datos->descripcion==null || $datos->id_cliente==null){

            Respuestas::faltanDatos();

        }else{
        
            $fecha_actual = date('Y-m-d');
             //ASIGNO LOS DATOS
             $this->setFechaCreacion($fecha_actual);
             $this->setFechaVencimiento($datos['fecha_vencimiento']);
             $this->setDescripcion($datos['descripcion']);
             $this->setId_Cliente($datos['id_cliente']);
             $this->setEstado("1");


            if($this->crearRegistro("insert into tb_cotizaciones (`fecha_creacion`, `fecha_vencimiento`, `descripcion`, `id_cliente`, `estado`) VALUES ('$this->fecha_creacion', '$this->fecha_vencimiento', '$this->descripcion', '$this->id_cliente', '$this->estado')")){
                Respuestas::registroCreado();
            }else{
                Respuestas::errorInterno();
            }   
        }  

    }
    public function agregarProductoCotizacion(){

        //se reciben los datos enviados por post
        $datos = Flight::request()->query;

        //pregunto si vienen los datos necesarios
        if($datos->id_producto==null || $datos->id_cotizacion==null || $datos->valor==null){

            Respuestas::faltanDatos();

        }else{
        
             //ASIGNO LOS DATOS
              $producto = $datos['id_producto'];
              $cotizacion = $datos['id_cotizacion'];
              $valor = $datos['valor'];

              $consulta = "INSERT INTO tb_productos_cotizacion (`id_cotizacion`, `id_producto`, `cantidad`, `valor`) 
              VALUES ('$cotizacion', '$producto', '1', '$valor');";

            if($this->crearRegistro($consulta)){
                Respuestas::registroCreado();
            }else{
                Respuestas::errorInterno();
            }   
        }  

    }
    public function eliminarProductoCotizacion(){

        //se reciben los datos enviados por post
        $datos = Flight::request()->query;

        //pregunto si vienen los datos necesarios
        if($datos->id_producto==null || $datos->id_cotizacion==null){

            Respuestas::faltanDatos();

        }else{
        
             //ASIGNO LOS DATOS
              $producto = $datos['id_producto'];
              $cotizacion = $datos['id_cotizacion'];

              $consulta = "DELETE FROM tb_productos_cotizacion where id_producto=$producto and id_cotizacion=$cotizacion";

            if($this->crearRegistro($consulta)){
                Respuestas::registroEliminado();
            }else{
                Respuestas::errorInterno();
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
             $this->setFechaCreacion($datos['fecha_creacion']);
             $this->setFechaVencimiento($datos['fecha_vencimiento']);
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
        if($datos->id_cotizacion==null){

            Respuestas::faltanDatos();

        }else{
        
             //ASIGNO LOS DATOS
             $this->setId_Cotizacion($datos['id_cotizacion']);

            if($this->crearRegistro("delete from tb_cotizaciones WHERE (`id_cotizacion` = '$this->id_cotizacion')")){
                Respuestas::registroEliminado();
            }else{
                Respuestas::errorInterno();
            }   
        }  

    }


    //SETTERS
    public function setId_Cotizacion($id_cotizacion){
        $this->id_cotizacion = $id_cotizacion;
    }
    public function setFechaCreacion($fecha_creacion){
        $this->fecha_creacion = $fecha_creacion;
    }
    public function setFechaVencimiento($fecha_vencimiento){
        $this->fecha_vencimiento = $fecha_vencimiento;
    }
    public function setDescripcion($descripcion){
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