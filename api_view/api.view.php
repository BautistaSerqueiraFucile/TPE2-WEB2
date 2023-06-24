<?php

class vista{

    function respuesta($respuesta, $error){   
        header("Content-type: application/json");
        header("HTTP/1.1" . $error . " " . $this->estado($error));
        echo json_encode($respuesta);
    }

    function estado($error){
        $estatus = array(
            200 => "salio ok",
            201 => "asd",
            400 => "asda",
            404 => "No se encontro",
            500 => "error en el servidor"
        );

        return (isset ($estatus[$error]))? $estatus[$error]: $estatus[500];
    }

}