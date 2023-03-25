<?php

$Cliente = new Cliente();

Flight::route('GET /clientes',array($Cliente,'obtenerClientes'));

Flight::route('POST /clientes',array($Cliente,'crearCliente'));

?>