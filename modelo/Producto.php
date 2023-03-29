<?php 

class Producto extends Conexion{

    private $id_producto;
    private $nombre;
    private $descripcion;
    private $valor;
    private $estado;

    public function obtenerProductos(){

        $resultado = $this->obtenerRegistros("SELECT * from tb_productos");
        Flight::json($resultado);
    }

    public function crearProducto(){

        //se reciben los datos enviados por post
        $datos = Flight::request()->query;

        //pregunto si vienen los datos necesarios
        if($datos->nombre==null || $datos->descripcion==null || $datos->valor==null || $datos->estado==null){

            Flight::json("204"); //FALTAN DATOS

        }else{
        
            //ASIGNO LOS DATOS
            $this->setNombre($datos['nombre']);
            $this->setDescripcion($datos['descripcion']);
            $this->setValor($datos['valor']);
            $this->setEstado($datos['estado']);

           
            if($this->crearRegistro("INSERT INTO tb_productos (nombre, descripcion, precio, estado) values('$this->nombre','$this->descripcion','$this->precio','$this->estado');")){
                Flight::json("201");//PRODUCTO CREADO
            }else{
                Flight::json("406");//SOLICITUD RECIBIDA P
            }   
        }  

    }

    
     public function modificarProducto(){

        //se reciben los datos enviados por post
       $datos = Flight::request()->query;

       //pregunto si vienen los datos necesarios
        if($datos->nombre==null || $datos->descripcion==null || $datos->valor==null || $datos->estado==null){

            Flight::json("204"); //FALTAN DATOS

        }else{
       
            //ASIGNO LOS DATOS
            $this->setId_Producto($datos['id_producto']);
            $this->setNombre($datos['nombre']);
            $this->setDescripcion($datos['descripcion']);
            $this->setValor($datos['valor']);
            $this->setEstado($datos['estado']);


           if($this->crearRegistro ("update tb_productos SET nombre = '".$this->nombre."',
                                                            descripcion = '".$this->descripcion."', 
                                                            valor = '".$this->valor."',
                                                            estado = '".$this->estado."'
              WHERE (id_producto = '".$this->id_producto."')")){
                 Flight::json("201");//PRODUCTO ACTUALIZADO
             }else{
                 Flight::json("406");//SOLICITUD RECIBIDA 
             }   
         }  

     }


     public function eliminarProducto(){

        //    //se reciben los datos enviados por post
           $datos = Flight::request()->query;
    
        //    //pregunto si vienen los datos necesarios
            if($datos->nombre==null || $datos->descripcion==null || $datos->valor==null || $datos->estado==null){
    
                Flight::json("204"); //FALTAN DATOS
    
            }else{
           
        //        //ASIGNO LOS DATOS
                $this->setId_Producto($datos['id_producto']);
                $this->setNombre($datos['nombre']);
                $this->setDescripcion($datos['descripcion']);
                $this->setValor($datos['valor']);
                $this->setEstado($datos['estado']);
    
               
               if($this->crearRegistro ("DELETE FROM tb_productos WHERE id_producto = '".$this->id_producto."'")){
                     Flight::json("201");//PRODUCTO ACTUALIZADO
                 }else{
                     Flight::json("406");//SOLICITUD RECIBIDA 
                 }   
             }  
    
         }

     

  //SETTERS
  public function setId_Producto($id_producto){
    $this->id_producto = $id_producto;
}
public function setNombre($nombre){
    $this->nombre = $nombre;
}
public function setDescripcion($descripcion){
    $this->descripcion = $descripcion;
}
public function setValor($valor){
    $this->valor = $valor;
}
public function setEstado($estado){
    $this->estado = $estado;
}


}


?>