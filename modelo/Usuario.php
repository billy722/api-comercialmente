<?php

class Usuario extends Conexion{

    private $id;
    private $nombre;
    private $correo;
    private $clave;
    private $estado;
    private $perfil;
    

    public function obtenerUsuario(){

        $resultado = $this->obtenerRegistros("select * from tb_usuarios");
        Flight::json($resultado);
    }

    public function LoginUsuario(){
        $datos = Flight::request()->query;

            //pregunto si vienen los datos necesarios
            if($datos->correo==null || $datos->clave==null){
                // Flight::json("{204 : falta datos}"); //FALTAN DATOS
                Respuestas::faltanDatos();
            }else{
            
                //ASIGNO LOS DATOS
                $this->setCorreo($datos['correo']);
                $this->setClave(parent::encriptar($datos['clave']));
                
                $resultado = $this->obtenerRegistros("select * from tb_usuarios where correo='$this->correo'");
                if($resultado==false){
                    Respuestas::noAutorizado();
                }else{
                    //Hay registros

                    //VERIFICAR USUARIO ACTIVO
                    if($resultado[0]['estado']==1){

                        //comparar claves
                        if($resultado[0]['clave'] == $this->clave){

                            $token = $this->generarToken($resultado[0]['id_usuario']);
                            if($token != false){
                                
                                Respuestas::devolverRegistros(array("token" => $token , "usuario" => $resultado[0]['nombre']));

                            }else{
                                Respuestas::errorInterno();
                            }

                        }else{
                            Respuestas::datosIncorrectos();
                        }

                    }else{
                        Respuestas::noAutorizado();
                    }

                }
                 
            } 
    }

    private function generarToken($idUsuario){
        $val = true;
        $token = bin2hex(openssl_random_pseudo_bytes(16,$val));
        $date = date("Y-m-d H:i");
        $estado = 1;

        $query = "INSERT INTO tb_token_usuario (`id_usuario`, `token`, `estado`, `fecha`) VALUES ('1', '$token', '$estado', '$date');";

        if($this->crearRegistro($query)){
            return $token;
        }else{
            return false;
        }
    }
    public function crearUsuario(){

        //se reciben los datos enviados por post
        $datos = Flight::request()->query;

        //pregunto si vienen los datos necesarios
        if($datos->correo==null || $datos->nombre==null || $datos->clave==null || $datos->estado==null || $datos->perfil==null){

            Flight::json("204"); //FALTAN DATOS

        }else{
        
            //ASIGNO LOS DATOS
            $this->setCorreo($datos['correo']);
            $this->setNombre($datos['nombre']);
            $this->setClave(parent::encriptar($datos['clave']));
            $this->setEstado($datos['estado']);
            $this->setPerfil($datos['perfil']);


            if($this->crearRegistro("INSERT into tb_usuarios (nombre, correo, clave, estado, perfil) values('$this->nombre','$this->correo','$this->clave','$this->estado','$this->perfil');")){
                Respuestas::registroCreado();
            }else{
                Respuestas::errorInterno();
            }   
        }  

    }

     public function modificarUsuario(){

        //se reciben los datos enviados por post
        $datos = Flight::request()->query;

        //pregunto si vienen los datos necesarios
        if($datos->correo==null || $datos->nombre==null || $datos->clave==null || $datos->estado==null || $datos->perfil==null){

            Flight::json("204"); //FALTAN DATOS

        }else{
        
            //ASIGNO LOS DATOS
            $this->setId($datos['id']);
            $this->setNombre($datos['nombre']);
            $this->setCorreo($datos['correo']);
            $this->setClave($datos['clave']);
            $this->setEstado($datos['estado']);
            $this->setPerfil($datos['perfil']);

    

           if($this->crearRegistro ("update tb_usuarios SET correo = ".$this->correo.",     
                                                           nombre = '.$this->nombre.', 
                                                           clave = '.$this->clave.', 
                                                           estado = '".$this->estado."',
                                                           perfil = '".$this->perfil."'
             WHERE (id_usuario = '".$this->id."')")){
                Flight::json("201");//USUARIO ACTUALIZADO
            }else{
                Flight::json("406");//SOLICITUD RECIBIDA 
            }   
        }  

    } 


    public function eliminarUsuario(){

        //se reciben los datos enviados por post
        $datos = Flight::request()->query;

        //pregunto si vienen los datos necesarios
        if($datos->correo==null || $datos->clave==null || $datos->estado==null || $datos->perfil==null){

            Flight::json("204"); //FALTAN DATOS

        }else{
        
            //ASIGNO LOS DATOS
            $this->setId($datos['id']);
            $this->setCorreo($datos['correo']);
            $this->setClave($datos['clave']);
            $this->setEstado($datos['estado']);
            $this->setPerfil($datos['perfil']);
 

           if($this->crearRegistro ("delete from tb_usuarios WHERE id_usuario = '".$this->id."'")){
                Flight::json("201");//USUARIO ELIMINADO
            }else{
                Flight::json("406");//SOLICITUD RECIBIDA 
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
    public function setCorreo($correo){
        $this->correo = $correo;
    }
    public function setClave($clave){
        $this->clave = $clave;
    }
    public function setEstado($estado){
        $this->estado = $estado;
    }
    public function setPerfil($perfil){
        $this->perfil = $perfil;
    }

    


}

?>