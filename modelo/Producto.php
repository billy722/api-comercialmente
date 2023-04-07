<?php 

class Producto extends Conexion{

    private $id;
    private $nombre;
    private $descripcion;
    private $tareas;
    private $precio;
    private $estado;
    private $categoria;
    private $tiempo_ejecucion;

    public function obtenerProductos(){

        $resultado = $this->obtenerRegistros("SELECT * from tb_productos");
        Flight::json($resultado);
    }

    public function obtenerProducto(){
        
        $datos = Flight::request()->query;
        $this->setId($datos['id_producto']);

        $resultado = $this->obtenerRegistros("SELECT * from tb_productos where id_producto=$this->id");
        
        if($resultado==false){
            Respuestas::sinRegistros();
        }else{
            Respuestas::devolverRegistros($resultado);
        }
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
        if($datos->nombre==null || $datos->descripcion==null || $datos->tareas==null || $datos->precio==null || $datos->categoria==null || $datos->tiempo_ejecucion==null){

            Respuestas::faltanDatos();

        }else{
        
            //ASIGNO LOS DATOS
            $this->setNombre($datos['nombre']);
            $this->setDescripcion($datos['descripcion']);
            $this->setTareas($datos['tareas']);
            $this->setPrecio($datos['precio']);
            $this->setEstado("1");
            $this->setCategoria($datos['categoria']);
            $this->setTiempoEjecucion($datos['tiempo_ejecucion']);

           
            if($this->crearRegistro("INSERT INTO tb_productos (nombre, descripcion, tareas, precio, estado, categoria, tiempo_ejecucion) values('$this->nombre','$this->descripcion','$this->tareas','$this->precio','$this->estado','$this->categoria','$this->tiempo_ejecucion');")){
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
public function setTareas($tareas){
    $this->tareas = $tareas;
}
public function setTiempoEjecucion($tiempo_ejecucion){
    $this->tiempo_ejecucion = $tiempo_ejecucion;
}


}


?>