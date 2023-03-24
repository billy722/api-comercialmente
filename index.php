<?php

require 'flight/Flight.php';
require './modelo/Conexion.php';
require './modelo/Producto.php';

//IMPORTAR LOS ARCHIVOS DE CADA MANTENEDOR
require 'controlador/productos.php';
require 'controlador/clientes.php';
require 'controlador/usuarios.php';
require 'controlador/cotizaciones.php';

Flight::start();
?>