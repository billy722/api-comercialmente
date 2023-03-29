<?php

$Usuario = new Usuario();

Flight::route('GET /usuario',array($Usuario,'obtenerUsuario'));

Flight::route('POST /usuario',array($Usuario,'crearUsuario'));

Flight::route('POST /usuario/login',array($Usuario,'LoginUsuario'));

Flight::route('PUT /usuario',array($Usuario,'modificarUsuario'));

Flight::route('DELETE /usuario',array($Usuario,'eliminarUsuario'));


?>