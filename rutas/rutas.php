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

            if (isset($_SERVER['REQUEST_METHOD']) && ($_SERVER['REQUEST_METHOD'] == "POST")) {

                $datos = array("nombre" => $_POST["nombre"], 
                "apellido" => $_POST["apellido"], 
                "email" => $_POST["email"]);

                // echo "<pre>";
                // print_r($datos);
                // "<pre>";

                 $clietes = new ControladorClientes();
                 $clietes->create($datos);
                 return;

            }
        }




    } else {

        if (array_filter($arrayRutas)[3] == "cursos" && is_numeric(array_filter($arrayRutas)[4])) {

            if (isset($_SERVER['REQUEST_METHOD']) && ($_SERVER['REQUEST_METHOD'] == "GET")) {

                $cursos = new ControladorCursos();
                $cursos->show(array_filter($arrayRutas)[4]);
                return;


            }
            // PETICION PUT PARA CURSOS

            if (isset($_SERVER['REQUEST_METHOD']) && ($_SERVER['REQUEST_METHOD'] == "PUT")) {

                $editarCurso = new ControladorCursos();
                $editarCurso->update(array_filter($arrayRutas)[4]);
                return;

            }
            // PETICION DELETE PARA CURSOS

            if (isset($_SERVER['REQUEST_METHOD']) && ($_SERVER['REQUEST_METHOD'] == "DELETE")) {

                $borrarCurso = new ControladorCursos();
                $borrarCurso->delete(array_filter($arrayRutas)[4]);
                return;

            }


        }

    }
}


?>