<?php

$Cotizacion = new Cotizacion();

Flight::route('GET /cotizaciones',array($Cotizacion,'obtenerCotizacion'));

Flight::route('POST /cotizaciones',array($Cotizacion,'crearCotizacion'));

Flight::route('PUT /cotizaciones',array($Cotizacion,'modificarCotizacion'));

Flight::route('DELETE /cotizaciones',array($Cotizacion,'eliminarCotizacion'));


?>