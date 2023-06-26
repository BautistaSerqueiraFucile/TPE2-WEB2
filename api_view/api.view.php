<?php

class vista{
 
    public function response($data, $status) {
        header("Content-Type: application/json");
        header("HTTP/1.1 " . $status . " " . $this->_requestStatus($status));
        echo json_encode($data);
    }

     private function _requestStatus($code){
        $status = array(
            200 => "La solicitud se realizo exitosamente",
            201 => "La solicitud se realizo exitosamente y el servidor creó un nuevo recurso",
            400 => "Ocurrio un error del lado del cliente",
            404 => "La URL a la que intentas acceder no existe",
            500 => "Ocurrio un problema en el servidor del sitio web"
          );

        return (isset($status[$code]))? $status[$code] : $status[500];
    }
}