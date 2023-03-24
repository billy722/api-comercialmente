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


}


?>