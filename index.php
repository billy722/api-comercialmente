<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header("Access-Control-Allow-Methods: GET");
header("Allow: GET, POST, OPTIONS, PUT, DELETE");
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method, Access-Control-Allow-Origin");


require 'flight/Flight.php';
require 'clases/Respuestas.php';

//IMPORTACION DE MODELO (CLASES)
require './modelo/Conexion.php';

require './modelo/Producto.php';
require './modelo/Cliente.php';
require './modelo/Usuario.php';
require './modelo/Cotizacion.php';
require './modelo/Colaborador.php';
require './modelo/Pregunta.php';
require './modelo/Problematica.php';
require './modelo/Cuestionario.php';
require './modelo/Alternativa.php';

//IMPORTAR CONTROLADORES
require 'controlador/productos.php';
require 'controlador/clientes.php';
require 'controlador/usuarios.php';
require 'controlador/cotizaciones.php';
require 'controlador/colaboradores.php';
require 'controlador/preguntas.php';
require 'controlador/problematicas.php';
require 'controlador/cuestionarios.php';
require 'controlador/alternativas.php';

Flight::start();
?>