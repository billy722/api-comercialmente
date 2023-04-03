<?php

$Pregunta = new Pregunta();

Flight::route('GET /pregunta',array($Pregunta,'obtenerPregunta'));

Flight::route('POST /pregunta',array($Pregunta,'crearPregunta'));

Flight::route('PUT /pregunta',array($Pregunta,'modificarPregunta'));

Flight::route('DELETE /pregunta',array($Pregunta,'eliminarPregunta'));


?>