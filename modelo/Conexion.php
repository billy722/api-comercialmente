<?php

class Conexion{

    private $servidor = "35.208.73.113";
    private $usuario = "ufh6rigx0v7nd";
    private $database = "db5v2ka8ugxghx";
    private $password = "comercialmente.2023";

    public function conectar(){

        try{

            $conexion =  new PDO("mysql:host=$this->servidor;dbname=$this->database",$this->usuario,$this->password);
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
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

        return $datos;

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
    
}
?>