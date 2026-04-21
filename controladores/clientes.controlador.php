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
        // echo "<pre>";
        // print_r($datos);
        // echo "<pre>";

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

        // validar correo existente
        $clientes = ModeloClientes::index("clientes");

        foreach ($clientes as $key => $value) {
            if ($value["email"] == $datos["email"]) {
                $json = array(
                    "detalle => Correo inválido ya existe "
                );
                echo json_encode($json, true);
                return;

            }
        }

        // echo "<pre>";
        // print_r($datos);
        // echo "<pre>";


        // generar las credenciales del cliente 
        $id_cliente = str_replace("$", "c", crypt(
            $datos["nombre"] . $datos["apellido"] . $datos["email"],
            '$2y$10$abcdefghijklmnopqrstuv'
        ));
        echo "<pre>";
        print_r($id_cliente);
        echo "<pre>";

        $llave_secreta = str_replace("$", "c", crypt(
            $datos["nombre"] . $datos["apellido"] . $datos["email"],
            '$2y$10$abcdefghijklmnopqrstuv'
        ));
        echo "<pre>";
        print_r($llave_secreta);
        echo "<pre>";


        $datos = array(
            "nombre" => $datos["nombre"],
            "apellido" => $datos["apellido"],
            "email" => $datos["email"],
            "id_cliente" => $id_cliente,
            "llave_secreta" => $llave_secreta,
            "created_at" => date('Y-m-d H:i:s'),
            "updated_at" => date('Y-m-d H:i:s'),

        );

        $create = ModeloClientes::create("clientes", $datos);

        if ($create == "ok") {
            $json = array(

                "status" => 404,
                "detalle" => "Se genero de manera correcta"
            );

            echo json_encode($json, true);
            return;


        }




    }


}





?>