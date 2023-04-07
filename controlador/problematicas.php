<?php

$Problematica = new Problematica();

Flight::route('GET /problematicas',array($Problematica,'obtenerProblematica'));

Flight::route('POST /problematicas',array($Problematica,'crearProblematica'));

Flight::route('PUT /problematicas',array($Problematica,'modificarProblematica'));

Flight::route('DELETE /problematicas',array($Problematica,'eliminarProblematica'));


?>