<?php

$Producto = new Producto();

Flight::route('GET /productos',array($Producto,'obtenerProductos'));



?>