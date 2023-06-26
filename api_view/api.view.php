<?php

class vista{

    function respuesta($respuesta, $error){   
        header("Content-type: application/json");
        header("HTTP/1.1" . $error . " " . $this->estado($error));
        echo json_encode($respuesta);
    }

    function estado($error){
        $estatus = array(
            200 => "La solicitud se realizo exitosamente",
            201 => "La solicitud se realizo exitosamente y el servidor creó un nuevo recurso",
            400 => "Ocurrio un error del lado del cliente",
            404 => "La URL a la que intentas acceder no existe",
            500 => "Ocurrio un problema en el servidor del sitio web"
        );

        return (isset ($estatus[$error]))? $estatus[$error]: $estatus[500];
    }

}