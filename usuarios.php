<?php


// OBTENER TODOS LOS REGISTROS
Flight::route('GET /usuarios','mostrarUsuarios');

//CREAR NUEVO REGISTRO
Flight::route('POST /usuarios','agregarUsuarios');

//ACTUALIZAR EL REGISTRO COMPLETO
Flight::route('PUT /usuarios','agregarUsuarios');

//ACTUALIZAR PARTE DEL REGISTRO
Flight::route('PATCH /usuarios','agregarUsuarios');

//ELIMINAR REGISTRO
Flight::route('DELETE /usuarios','borrarUsuario');


function mostrarUsuarios(){
    echo 'Esta es la lista de los usuarios';
}
function agregarUsuarios(){
    echo "usuario creado";
    Flight::json("201");
}

function borrarUsuario(){
    echo 'Usuario borrado';
}



// Flight::start();

?>