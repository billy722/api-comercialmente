<?php

$Colaborador = new Colaborador();

Flight::route('GET /colaboradores',array($Colaborador,'obtenerColaborador'));

Flight::route('POST /colaboradores',array($Colaborador,'crearColaborador'));

Flight::route('PUT /colaboradores',array($Colaborador,'modificarColaborador'));

Flight::route('DELETE /colaboradores',array($Colaborador,'eliminarColaborador'));


?>