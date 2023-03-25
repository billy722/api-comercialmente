<?php

$Cliente = new Cliente();

Flight::route('GET /clientes',array($Cliente,'obtenerClientes'));

?>