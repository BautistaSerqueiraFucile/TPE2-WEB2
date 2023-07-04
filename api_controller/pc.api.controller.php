<?php
require_once 'api_model/pc.api.model.php';
require_once 'api_controller/api.controller.php';
require_once 'api_view/api.view.php';

class pcApiController extends apiController
 {

    private $modelo;
    private $atributes;
    private $order;

    function __construct()
 {

        parent::__construct();
        $this->modelo = new pc_model();

        $this->atributes = array ( 'id_pc', 'motherboard', 'processor', 'disco', 'RAM', 'video', 'description_pc', 'id_gama' );
        $this->order = array ( 'asc', 'ASC', 'desc', 'DESC' );
    }

    public function getPc( $params = null ) {
        if ( empty( $params ) ) {
            if ( isset( $_REQUEST[ 'limit' ], $_REQUEST[ 'page' ] ) ) {
                $page = $this->calcularPagina( $_REQUEST[ 'limit' ], $_REQUEST[ 'page' ] );
                $pc = $this->modelo->getPaginado( $_REQUEST[ 'limit' ], $page );
                if ( !empty($pc) ) {
                    $this->vista->response( $pc, 200 );
                } else $this->vista->response( 'Error en la consulta/fuera de rango', 404 );
            } 
            elseif ( !isset( $_REQUEST[ 'limit' ] ) && isset( $_REQUEST[ 'page' ] ) ) {
                $this->vista->response( 'Falta el query param: limit', 400 );
            } elseif ( !isset( $_REQUEST[ 'page' ] ) && isset( $_REQUEST[ 'limit' ] ) ) {
                $this->vista->response( 'Falta el query param: page', 400 );
            }
            else {
                $pc = $this->modelo->GetAllPc();
                if ( !empty($pc) ) {
                    $this->vista->response( $pc, 200 );
                } else $this->vista->response( 'Error en el servidor', 500 );
            }

        } else {
            $pc = $this->modelo->getPcbyId( $params[ ':ID' ] );
            if ( !empty( $pc ) ) {
                $this->vista->response( $pc, 200 );
            } else {
                $this->vista->response( 'No se encontro pc', 404 );
            }
        }
    }

    function calcularPagina( $limit, $page ) {
        return ( ( $page-1 )*$limit );
    }

    function getPcByOrder( $params = null )
 {

        if ( isset( $_REQUEST[ 'sort' ], $_REQUEST[ 'order' ] ) ) {

            if ( in_array( $_REQUEST[ 'sort' ], $this->atributes ) ) {
                if ( in_array( $_REQUEST[ 'order' ], $this->order ) ) {
                    $pc = $this->modelo->getPcByOrder( $_REQUEST[ 'sort' ], $_REQUEST[ 'order' ] );
                    if ( !empty($pc) ) {
                        $this->vista->response( $pc, 200 );
                    } else $this->vista->response( 'Error en el servidor', 500 );

                } else $this->vista->response( 'Orden Invalido', 400 );

            } else $this->vista->response( 'Parametro inexistente', 404 );
        } elseif ( !isset( $_REQUEST[ 'sort' ] ) && isset( $_REQUEST[ 'order' ] ) ) {
            $this->vista->response( 'Falta el query param: sort', 400 );
        } elseif ( !isset( $_REQUEST[ 'order' ] ) && isset( $_REQUEST[ 'sort' ] ) ) {
            $this->vista->response( 'Falta el query param: order', 400 );
        } else {
            $pc = $this->modelo->getPcByOrder( 'motherboard', 'DESC' );
            if ( !empty($pc) ) {
                $this->vista->response( $pc, 200 );
            } else
            $this->vista->response( 'Error del lado del servidor', 500 );
        }
    }

    function getPcFilter()// implementar aributos validos 
 {

        if ( isset( $_REQUEST[ 'filter' ], $_REQUEST[ 'value' ] ) ) {
            if ( in_array( $_REQUEST[ 'filter' ], $this->atributes ) ) {
                $pc = $this->modelo->getPcFilter( $_REQUEST[ 'filter' ], $_REQUEST[ 'value' ] );
                if ( !empty($pc) ) {
                    $this->vista->response( $pc, 200 );
                } else $this->vista->response( 'sin elementos', 404 );

            } else $this->vista->response( 'Parametro de filtro inexistente', 404 );
        } else $this->vista->response( 'No se completaron los campos requeridos para el filtro', 400 );

    }

    //creacion de una pc

    function postPC( $params = null )
 {
        $body = $this->obtenerDatos();                        
    
            if ( $this->verificarToken() ) {                
                if ( isset( $body[ 'motherboard' ], $body[ 'processor' ], $body[ 'disco' ], $body[ 'RAM' ], $body[ 'video' ], $body[ 'description_pc' ], $body[ 'id_gama' ] ) ) {
                    if ( $this->modelo->postPc( $body ) ) {
                        $this->vista->response( 'La PC se creo correctamente', 201 );
                    } else $this->vista->response( 'Error en la creacion de PC', 500 );
                } else $this->vista->response( 'Faltan setear algunos atributos para la creaccion de PC', 400 );

            } else $this->vista->response( 'El token ingresado es invalido/vencido', 400 );        
    }

    //modificacion de una pc

    function putPc( $params = null )
 {
        $body = $this->obtenerDatos();        

            if ( $this->verificarToken() ) {

                if ( $this->modelo->searchPc( $params[ ':ID' ] ) ) {
                    if ( isset( $body[ 'motherboard' ], $body[ 'processor' ], $body[ 'disco' ], $body[ 'RAM' ], $body[ 'video' ], $body[ 'description_pc' ], $body[ 'id_gama' ] ) ) {
                        if ( $this->modelo->putPc( $params[ ':ID' ], $body ) ) {
                            $this->vista->response( 'La edicion se realizo correctamente', 200 );
                        } else $this->vista->response( 'Error en la edicion de la PC', 500 );
                    } else $this->vista->response( 'Faltan setear algunos atributos para la edicion de PC', 400 );
                } else $this->vista->response( 'La PC a modificar no existe', 404 );

            } else $this->vista->response( 'El token ingresado es invalido/vencido', 400 ); 
    }

}