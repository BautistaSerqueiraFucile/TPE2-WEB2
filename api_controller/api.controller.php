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
            $pc = $this->modelo->GetAllPc();            
            $this->vista->respuesta( $pc, 200 );
        } else {
            $pc = $this->modelo->getPcbyId( $params[ ':ID' ] );
            if ( !empty( $pc ) ) {
                $this->vista->respuesta( $pc, 200 );

            } else {
                $this->vista->respuesta( 'No se encontro pc', 404 );
            }
        }
    }

    function getPcByOrder(){
        $pc= $this->modelo->getPcByOrder($_GET['sort'],$_GET['order']);
        $this->vista->respuesta( $pc, 200 );
    }



    function postPC() {

    }

    function putPc() {

    }

    function depetePc() {

    }
}