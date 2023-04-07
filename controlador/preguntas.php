<?php

$Pregunta = new Pregunta();

Flight::route('GET /preguntas',array($Pregunta,'obtenerPreguntas'));

Flight::route('POST /preguntas',array($Pregunta,'crearPregunta'));

Flight::route('PUT /preguntas',array($Pregunta,'modificarPregunta'));

Flight::route('DELETE /preguntas',array($Pregunta,'eliminarPregunta'));


?>