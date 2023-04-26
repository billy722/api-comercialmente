<?php

class Conexion{

    private $servidor = "localhost";
    private $usuario = "com830cl_cotizador";
    private $database = "com830cl_cotizador";
    private $password = "Cotizador8253";

    public function conectar(){

        try{

            $conexion =  new PDO("mysql:host=$this->servidor;dbname=$this->database",$this->usuario,$this->password);
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "conexion exitosa";
            return $conexion;

        }catch(PDOException $excepcion){
            //error de conexion
            echo $excepcion->getMessage();
        }
    }

    public function obtenerRegistros($sentencia){

        $conexion = $this->conectar();
        $sentencia = $conexion->prepare($sentencia);
        $sentencia->execute();
        $datos = $sentencia->fetchAll(PDO::FETCH_ASSOC);

        $this->cerrarConexion($conexion);

        if($sentencia->rowCount()==0){
            return false; //si filas vacias devuelve false 
        }else{
            return $datos; 
        }

    }

    public function crearRegistro($sentencia){

        $conexion = $this->conectar();
        $sentencia = $conexion->prepare($sentencia);
        if($sentencia->execute()){
            $this->cerrarConexion($conexion);
            return true;
        }else{
            return false;
        }

    }

    public function cerrarConexion(PDO $conexion){
        $conexion = null;
    }

    protected function encriptar($dato){
        return md5($dato);
    }
    
}
?>