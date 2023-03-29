<?php

$Usuario = new Usuario();

Flight::route('GET /usuario',array($Usuario,'obtenerUsuario'));

Flight::route('POST /usuario',array($Usuario,'crearUsuario'));


?>