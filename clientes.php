<?php

require 'flight/Flight.php';

Flight::register('db','PDO', array('mysql:host=35.208.73.113;dbname=db5v2ka8ugxghx',
'ufh6rigx0v7nd',
'comercialmente.2023'));

function obtenerUsuarios() {
    
    $sentencia = Flight::db()->prepare("SELECT * from tb_usuarios");
    $sentencia->execute();
    $datos = $sentencia->fetchAll();

    Flight::json($datos);
}

Flight::route('GET /usuarios','obtenerUsuarios');



Flight::start();