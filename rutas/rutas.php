<?php


$arrayRutas = explode("/", $_SERVER['REQUEST_URI']);

echo "<pre>";
print_r($arrayRutas);
echo "</pre>";

if (count(array_filter($arrayRutas)) == 2) {

    // cuando no se hace ninguna petición
    $json = array(
        "detalle" => "no encontrado"
    );
    echo json_encode($json, true);
    return;

} elseif (count(array_filter($arrayRutas)) == 3) {

    // cuando se pasa un indice

    if (array_filter($arrayRutas)[3] == "cursos") {

        if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == "POST") {

            $cursos = new ControladorCursos();
            $cursos->index();
            return;

        }

    } elseif (array_filter($arrayRutas)[3] == "registros") {

        $json = array(
            "detalle" => "Estas en la vista de registros"
        );
        echo json_encode($json, true);
        return;

    }

}

?>