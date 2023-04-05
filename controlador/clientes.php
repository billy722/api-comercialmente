<?php

$Cliente = new Cliente();

Flight::route('GET /clientes',array($Cliente,'obtenerClientes'));
Flight::route('GET /cliente',array($Cliente,'obtenerCliente'));

Flight::route('POST /clientes',array($Cliente,'crearCliente'));

Flight::route('PUT /clientes',array($Cliente,'modificarCliente'));

Flight::route('DELETE /clientes',array($Cliente,'eliminarCliente'));

?>