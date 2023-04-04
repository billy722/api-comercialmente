<?php 

class Producto extends Conexion{

    private $id;
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
        
        if($resultado==false){
            Respuestas::sinRegistros();
        }else{
            Respuestas::devolverRegistros($resultado);
        }
    }

    public function crearProducto(){

        //se reciben los datos enviados por post
        $datos = Flight::request()->query;

        //pregunto si vienen los datos necesarios
        if($datos->nombre==null || $datos->descripcion==null || $datos->precio==null || $datos->estado==null || $datos->categoria==null){

            Respuestas::faltanDatos();

        }else{
        
            //ASIGNO LOS DATOS
            $this->setNombre($datos['nombre']);
            $this->setDescripcion($datos['descripcion']);
            $this->setPrecio($datos['precio']);
            $this->setEstado($datos['estado']);
            $this->setCategoria($datos['categoria']);

           
            if($this->crearRegistro("INSERT INTO tb_productos (nombre, descripcion, precio, estado, categoria) values('$this->nombre','$this->descripcion','$this->precio','$this->estado','$this->categoria');")){
                Respuestas::registroCreado();
            }else{
                Respuestas::errorInterno();
            }   
        }  

    }

    
     public function modificarProducto(){

        //se reciben los datos enviados por post
       $datos = Flight::request()->query;

       //pregunto si vienen los datos necesarios
        if($datos->id==null || $datos->nombre==null || $datos->descripcion==null || $datos->precio==null || $datos->estado==null || $datos->categoria==null){

            Respuestas::faltanDatos();

        }else{
       
            //ASIGNO LOS DATOS
            $this->setId($datos['id']);
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
              WHERE (id_producto = '".$this->id."')")){
                 Respuestas::registroModificado();
             }else{
                 Respuestas::errorInterno();
             }   
         }  

     }


     public function eliminarProducto(){

                //se reciben los datos enviados por post
                $datos = Flight::request()->query;

                //pregunto si vienen los datos necesarios
                if($datos->id==null){
                    Respuestas::faltanDatos();
                }else{
                
                    //ASIGNO LOS DATOS
                    $this->setId($datos['id']);
                   
                    if($this->crearRegistro("DELETE from tb_productos where id_producto = $this->id")){
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