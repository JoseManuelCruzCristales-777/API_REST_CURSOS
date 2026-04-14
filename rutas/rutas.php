<?php

use const Dom\INDEX_SIZE_ERR;


$arrayRutas = explode("/", $_SERVER['REQUEST_URI']);

echo "<pre>";
print_r($arrayRutas);
echo "</pre>";



if (count(array_filter($arrayRutas)) == 2) {

    // cuando no  se hace ninguna peticion

    $json = array(

        "detalle" => "no encontrado"
    );
    echo json_encode($json, true);

    return;
} else {
    // cuando se pasa un indice de cursos 
    if (count(array_filter($arrayRutas)) == 3) {

        if (array_filter($arrayRutas)[3] == "cursos") {

            if (isset($_SERVER['REQUEST_METHOD']) && ($_SERVER['REQUEST_METHOD'] == "POST")) {

                $cursos = new ControladorCursos();
                $cursos->create();
                return;

            } elseif (isset($_SERVER['REQUEST_METHOD']) && ($_SERVER['REQUEST_METHOD'] == "GET")) {

                $cursos = new ControladorCursos();
                $cursos->index();
                return;

            }


        }


        if (array_filter($arrayRutas)[3] == "registros") {

            if (isset($_SERVER['REQUEST_METHOD']) && ($_SERVER['REQUEST_METHOD'] == "GET")) {

                $clietes = new ControladorClientes();
                $clietes->create();
                return;



            }

            return;
        }




    }


}


?>