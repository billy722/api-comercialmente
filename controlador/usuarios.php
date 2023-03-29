<?php

$Usuario = new Usuario();

Flight::route('GET /usuario',array($Usuario,'obtenerUsuario'));

Flight::route('POST /usuario',array($Usuario,'crearUsuario'));

//Flight::route('PUT /usuario',array($Usuario,'modificarUsuario'));


?>