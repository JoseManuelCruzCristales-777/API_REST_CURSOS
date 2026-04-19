<?php


class ControladorCursos
{


    public function index()
    {
        $cursos = ModeloCursos::index("cursos");
        $json = array("detalle" => $cursos);
        header('Content-Type: application/json');
        echo json_encode($json, JSON_PRETTY_PRINT);



    }


    public function create()
    {

        $json = array("detalle" => "estas en la vista create");
        echo json_encode($json, true);

    }

    public function show($id)
    {

        $json = array("detalle" => "estas en el curso con el id... " . $id);
        echo json_encode($json, true);


    }
    public function update($id)
    {

        $json = array("detalle" => "Haz modificado el curso con exito con el id  : " . $id);
        echo json_encode($json, true);


    }

    public function delete($id)
    {

        $json = array("detalle" => "Haz eliminado con exito con el id  :" . $id);
        echo json_encode($json, true);


    }



}



?>