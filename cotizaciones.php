<?php


// OBTENER TODOS LOS REGISTROS
Flight::route('GET perros/','mostrarPerros');

//CREAR NUEVO REGISTRO
Flight::route('POST /perros','agregarPerros');

//ACTUALIZAR EL REGISTRO COMPLETO
Flight::route('PUT /perros','agregarPerros');

//ACTUALIZAR PARTE DEL REGISTRO
Flight::route('PATCH /perros','agregarPerros');

//ELIMINAR REGISTRO
Flight::route('DELETE /perros','borrarPerro');


function mostrarPerros(){
    echo 'Esta es la lista de los perros';
}
function agregarPerros(){
    echo 'perro agregado';
}

function borrarPerro(){
    echo 'perro borrado';
}



// Flight::start();

?>