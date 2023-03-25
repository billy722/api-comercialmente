<?php

require 'flight/Flight.php';

//IMPORTACION DE MODELO (CLASES)
require './modelo/Conexion.php';
require './modelo/Producto.php';
require './modelo/Cliente.php';

//IMPORTAR CONTROLADORES
require 'controlador/productos.php';
require 'controlador/clientes.php';
require 'controlador/usuarios.php';
require 'controlador/cotizaciones.php';

Flight::start();
?>