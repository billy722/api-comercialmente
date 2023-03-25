<?php

class Cliente extends Conexion{

    private $id_cliente;
    private $nombre;

    public function obtenerClientes(){

        $resultado = $this->obtenerRegistros("select * from tb_clientes");
        Flight::json($resultado);
    }

    


}

?>