<?php

require 'flight/Flight.php';

//IMPORTACION DE MODELO (CLASES)
require './modelo/Conexion.php';
require './modelo/Producto.php';
require './modelo/Cliente.php';
require './modelo/Usuario.php';

//IMPORTAR CONTROLADORES
require 'controlador/productos.php';
require 'controlador/clientes.php';
require 'controlador/usuarios.php';
require 'controlador/cotizaciones.php';

header("Content-type: applocation/json");
header("Access-Control-Allow-Origin: *");
http_response_code(200);

Flight::start();
?>