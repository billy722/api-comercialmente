<?php

$Alternativa = new Alternativa();

Flight::route('POST /alternativas',array($Alternativa,'obtenerAlternativas'));

Flight::route('POST /alternativas',array($Alternativa,'crearAlternativa'));

Flight::route('PUT /alternativas',array($Alternativa,'modificarAlternativa'));

Flight::route('DELETE /alternativas',array($Alternativa,'eliminarAlternativa'));

?>