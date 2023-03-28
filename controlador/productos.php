<?php

$Producto = new Producto();

Flight::route('GET /productos',array($Producto,'obtenerProductos'));
Flight::route('POST /productos',array($Producto,'obtenerProductos'));




?>