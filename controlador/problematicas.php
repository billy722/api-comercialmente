<?php

$Problematica = new Problematica();

Flight::route('GET /problematica',array($Problematica,'obtenerProblematica'));

Flight::route('POST /problematica',array($Problematica,'crearProblematica'));

Flight::route('PUT /problematica',array($Problematica,'modificarProblematica'));

Flight::route('DELETE /problematica',array($Problematica,'eliminarProblematica'));


?>