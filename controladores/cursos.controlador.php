<?php


class ControladorCursos
{


    public function index()
    {

        $json = array("detalle" => "estas en la vista cursos");
        echo json_encode($json, true);
      


    }


    public function create()
    {

        $json = array("detalle" => "estas en la vista create");
        echo json_encode($json, true);
     




    }
}



?>