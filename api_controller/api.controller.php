<?php

require_once 'api_model/api.model.php';
require_once 'api_view/api.view.php';

class apiController {

    private $modelo;
    private $vista;

    public function __construct(){
        $this->modelo = new pc_model();
        $this->vista = new vista();
    }
        
     public function getPc ( $params = null ) {
    
        if ( empty( $params ) ) {
            $articulo = $this->modelo->GetAllPc();            
            $this->vista->respuesta( $articulo, 200 );
        } else {
            $articulo = $this->modelo->getPcbyId( $params[ ':ID' ] );
            if ( !empty( $articulo ) ) {
                $this->vista->respuesta( $articulo, 200 );

            } else {
                $this->vista->respuesta( 'No se encontro tarea', 404 );
            }
        }
    }

    function postPC() {

    }

    function putPc() {

    }

    function depetePc() {

    }
}