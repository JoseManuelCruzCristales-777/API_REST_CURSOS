<?php

class ControladorClientes
{


    public function create()
    {
        $json = array("detalle" => "Estas en la vista  de registros ");
        echo json_encode($json, true);


    }


}



?>