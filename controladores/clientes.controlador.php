<?php

class ControladorClientes
{

    public function index()
    {
        $clientes = Modeloclientes::index("clientes");
        $json = array("detalle" => $clientes);
        header('Content-Type: application/json');
        echo json_encode($json, JSON_PRETTY_PRINT);


    }


    public function create($datos)
    {

        // $json = array("detalle" => "Estas en la vista  de registros ");
        // echo json_encode($json, true);
        echo "<pre>";
        print_r($datos);
        echo "<pre>";

        // VALIDAR NOMBRE
        if (isset($datos["nombre"]) && !preg_match('/^[a-zA-ZáéíóúÁÉÍÓÚñÑ ]+$/', $datos["nombre"])) {
            $json = array(
                "detalle => error en el campo solo se  permiten letras"
            );
            echo json_encode($json, JSON_PRETTY_PRINT);
            return;

        }

        // VALIDAR APELLIDO
        if (isset($datos["apellido"]) && !preg_match('/^[a-zA-ZáéíóúÁÉÍÓÚñÑ]+$/u', $datos["apellido"])) {
            $json = array(
                "detalle => error en el campo solo se  permiten letras en el apellido"
            );
            echo json_encode($json, JSON_PRETTY_PRINT);
            return;

        }

        // valdiar correo

        if (isset($datos["email"]) && !preg_match('/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/', $datos["email"])) {

            $json = array(
                "detalle => Correo inválido"
            );

            echo json_encode($json, true);
            return;
        }


        $clientes = ModeloClientes::index("clientes");

        foreach ($clientes as $key => $value) {
            if ($value["email"] == $datos["email"]) {
                $json = array(
                    "detalle => Correo inválido ya existe "
                );


            }



        }

        echo json_encode($json, true);
        return;
    }


}





?>