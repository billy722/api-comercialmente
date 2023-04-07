<?php

class Alternativa extends Conexion{

    private $id_alternativa;
    private $id_pregunta;
    private $texto_alternativa;


    public function obtenerAlternativas(){
        $datos = Flight::request()->query;

        //pregunto si vienen los datos necesarios
        if($datos->id_pregunta==null){

            Respuestas::faltanDatos();

        }else{
            $this->setIdPregunta($datos['id_pregunta']);

            $resultado = $this->obtenerRegistros("select * from tb_alternativas where id_pregunta=".$this->id_pregunta);
            if($resultado){
                Respuestas::devolverRegistros($resultado);
            }else{
                Respuestas::sinRegistros();
            }
        }    
    }
    public function crearAlternativa(){
        $datos = Flight::request()->query;

        //pregunto si vienen los datos necesarios
        if($datos->id_pregunta==null){

            Respuestas::faltanDatos();

        }else{
            $this->setIdPregunta($datos['id_pregunta']);

            $resultado = $this->obtenerRegistros("select * from tb_alternativas where id_pregunta=".$this->id_pregunta);
            if($resultado){
                Respuestas::devolverRegistros($resultado);
            }else{
                Respuestas::sinRegistros();
            }
        }    
    }
    public function modificarAlternativa(){
        $datos = Flight::request()->query;

        //pregunto si vienen los datos necesarios
        if($datos->id_pregunta==null){

            Respuestas::faltanDatos();

        }else{
            $this->setIdPregunta($datos['id_pregunta']);

            $resultado = $this->obtenerRegistros("select * from tb_alternativas where id_pregunta=".$this->id_pregunta);
            if($resultado){
                Respuestas::devolverRegistros($resultado);
            }else{
                Respuestas::sinRegistros();
            }
        }    
    }
    public function eliminarAlternativa(){
        $datos = Flight::request()->query;

        //pregunto si vienen los datos necesarios
        if($datos->id_pregunta==null){

            Respuestas::faltanDatos();

        }else{
            $this->setIdPregunta($datos['id_pregunta']);

            $resultado = $this->obtenerRegistros("select * from tb_alternativas where id_pregunta=".$this->id_pregunta);
            if($resultado){
                Respuestas::devolverRegistros($resultado);
            }else{
                Respuestas::sinRegistros();
            }
        }    
    }

    

    //SETTERS
    public function setIdPregunta($id_pregunta){
        $this->id_pregunta = $id_pregunta;
    }
    public function setIdAlternativa($id_alternativa){
        $this->id_alternativa = $id_alternativa;
    }
    public function setTextoAlternativa($texto_alternativa){
        $this->texto_alternativa = $texto_alternativa;
    }
    


}

?>