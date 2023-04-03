<?php 

class Producto extends Conexion{

    private $id_producto;
    private $nombre;
    private $descripcion;
    private $precio;
    private $estado;
    private $categoria;

    public function obtenerProductos(){

        $resultado = $this->obtenerRegistros("SELECT * from tb_productos");
        Flight::json($resultado);
    }

    public function obtenerProductosCategoria(){
        
        $datos = Flight::request()->query;
        $this->setCategoria($datos['categoria']);


        $resultado = $this->obtenerRegistros("SELECT * from tb_productos where categoria=$this->categoria");
        Flight::json($resultado);
    }

    public function crearProducto(){

        //se reciben los datos enviados por post
        $datos = Flight::request()->query;

        //pregunto si vienen los datos necesarios
        if($datos->nombre==null || $datos->descripcion==null || $datos->precio==null || $datos->estado==null || $datos->categoria==null){

            Flight::json("204"); //FALTAN DATOS

        }else{
        
            //ASIGNO LOS DATOS
            $this->setNombre($datos['nombre']);
            $this->setDescripcion($datos['descripcion']);
            $this->setPrecio($datos['precio']);
            $this->setEstado($datos['estado']);
            $this->setCategoria($datos['categoria']);

           
            if($this->crearRegistro("INSERT INTO tb_productos (nombre, descripcion, precio, estado, categoria) values('$this->nombre','$this->descripcion','$this->precio','$this->estado','$this->categoria');")){
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
        if($datos->nombre==null || $datos->descripcion==null || $datos->precio==null || $datos->estado==null || $datos->categoria==null){

            Flight::json("204"); //FALTAN DATOS

        }else{
       
            //ASIGNO LOS DATOS
            $this->setId_Producto($datos['id_producto']);
            $this->setNombre($datos['nombre']);
            $this->setDescripcion($datos['descripcion']);
            $this->setPrecio($datos['precio']);
            $this->setEstado($datos['estado']);
            $this->setCategoria($datos['categoria']);


           if($this->crearRegistro ("update tb_productos SET nombre = '".$this->nombre."',
                                                            descripcion = '".$this->descripcion."', 
                                                            precio = '".$this->precio."',
                                                            estado = '".$this->estado."',
                                                            categoria = '".$this->categoria."'
              WHERE (id_producto = '".$this->id_producto."')")){
                 Flight::json("201");//PRODUCTO ACTUALIZADO
             }else{
                 Flight::json("406");//SOLICITUD RECIBIDA 
             }   
         }  

     }


     public function eliminarProducto(){

     
    
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
public function setPrecio($precio){
    $this->precio = $precio;
}
public function setEstado($estado){
    $this->estado = $estado;
}
public function setCategoria($categoria){
    $this->categoria = $categoria;
}


}


?>