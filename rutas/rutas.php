<?php


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

    if (count(array_filter($arrayRutas)) == 3) {
        // cuando se pasa un indice de cursos 

        if (array_filter($arrayRutas)[3] == "cursos") {
            $json = array(

                "detalle" => "Estas en la vista cursos "
            );
            echo json_encode($json, true);

            return;
        }

        if (array_filter($arrayRutas)[3] == "registros") {
            $json = array(

                "detalle" => "Estas en la vista  de registros "
            );
            echo json_encode($json, true);

            return;
        }




    }


}


?>