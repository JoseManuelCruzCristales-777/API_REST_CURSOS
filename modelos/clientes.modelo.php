<?php

require_once "conexion.php";

class ModeloClientes
{

    // Mostrar todos los registros de la tabla clientes 

    static public function index($tabla)
    {

        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
        $stmt->execute();

        return $stmt->fetchAll();
        $stmt->close();
        $stmt = null;

    }

}




?>