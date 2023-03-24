<?php

require 'flight/Flight.php';


function mostrarUsuarios(){
    echo 'hola';
}

Flight::route('/usuarios','mostrarUsuarios');


Flight::start();
