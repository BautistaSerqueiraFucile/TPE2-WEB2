<?php
require_once 'api_model/api.model.php';
require_once 'api_controller/api.controller.php';
require_once 'api_view/api.view.php';

class tareasApiController extends apiController{    

    private $modelo;

    function __construct(){

        parent::__construct();
        $this->modelo= new pc_model();
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
                $this->vista->respuesta( 'No se encontro pc', 401 );
            }
        }
    }

    function getPcByOrder( $params = null ) {   
        
        if ( isset( $_REQUEST[ 'sort' ], $_REQUEST[ 'order' ] ) ) {
            $pc = $this->modelo->getPcByOrder( $_REQUEST[ 'sort' ], (string)$_REQUEST[ 'order' ]);
            $this->vista->respuesta( $pc, 200 );
        } else {
            $pc = $this->modelo->getPcByOrder( 'id_pc', 'DESC' );
            $this->vista->respuesta( $pc, 200 );
        }
    }

    //creacion de una pc
    function postPC($params=null) {
        $body = $this->obtenerDatos();        
        if (isset($body)) {
          $this->modelo->postPc($body);
          $this->vista->respuesta( "La PC se creo correctamente", 201 );
        }
        else {
            $this->vista->respuesta( "Faltan setear algunos atributos para la creaccion de PC", 400 );
        }
    }

    //modificacion de una pc
    function putPc($params=null) {
        $body = $this->obtenerDatos();   
        if ($this->modelo->searchPc($params[':ID']) ) {
          $this->modelo->putPc($params[':ID'],$body);
          $this->vista->respuesta( "Los edicion se realizo correctamente", 200 );
        }
        else {
            $this->vista->respuesta( "La PC a modificar no existe",  401 );
        }
    }

    function depetePc() {

    }
}