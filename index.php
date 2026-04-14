<?php

require_once "controladores/rutas.controlador.php";
require_once "controladores/cursos.controlador.php";
require_once "controladores/clientes.controlador.php";


$rutas = new ControladorRutas();
$rutas->inicio();

// $cursos = new ControladorCursosr();
// $cursos->index();

?>