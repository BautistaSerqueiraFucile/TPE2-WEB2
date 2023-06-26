<?php
require_once 'api_view/api.view.php';
abstract class apiController {
    
    protected $vista;
    protected $data;

    public function __construct() {        
        $this->vista = new vista();
        $this->data = file_get_contents("php://input");
    }

    function obtenerDatos($params=null){
        return json_decode( $this->data,true);
    }
}