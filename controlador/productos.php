<?php

$Producto = new Producto();

Flight::route('GET /productos',array($Producto,'obtenerProductos'));
Flight::route('GET /productos_categoria',array($Producto,'obtenerProductosCategoria'));

Flight::route('POST /productos',array($Producto,'crearProducto'));
Flight::route('PUT /productos',array($Producto,'modificarProducto'));
Flight::route('DELETE /productos',array($Producto,'eliminarProducto'));




?>