<?php

require 'flight/Flight.php';

//IMPORTAR LOS ARCHIVOS DE CADA MANTENEDOR
require 'clientes.php';
require 'usuarios.php';
require 'cotizaciones.php';

Flight::start();
?>