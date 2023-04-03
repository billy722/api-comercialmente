<?php

$Cuestionario = new Cuestionario();

Flight::route('GET /cuestionario',array($Cuestionario,'obtenerCuestionario'));

Flight::route('POST /cuestionario',array($Cuestionario,'crearCuestionario'));

Flight::route('PUT /cuestionario',array($Cuestionario,'modificarCuestionario'));

Flight::route('DELETE /cuestionario',array($Cuestionario,'eliminarCuestionario'));


?>