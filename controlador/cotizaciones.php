<?php

$Cotizacion = new Cotizacion();

Flight::route('GET /cotizaciones',array($Cotizacion,'obtenerCotizaciones'));

Flight::route('GET /cotizacion',array($Cotizacion,'obtenerDatosCotizacion'));

Flight::route('GET /cotizacion_detalle',array($Cotizacion,'obtenerProductosCotizacion'));

Flight::route('POST /producto_cotizacion',array($Cotizacion,'agregarProductoCotizacion'));

Flight::route('GET /cotizaciones_cliente',array($Cotizacion,'obtenerCotizacionCliente'));

Flight::route('POST /cotizaciones',array($Cotizacion,'crearCotizacion'));

Flight::route('PUT /cotizaciones',array($Cotizacion,'modificarCotizacion'));

Flight::route('DELETE /cotizaciones',array($Cotizacion,'eliminarCotizacion'));

Flight::route('DELETE /producto_cotizacion',array($Cotizacion,'eliminarProductoCotizacion'));


?>