<?php
require_once 'api_view/api.view.php';
require_once 'api_model/user.api.model.php';

abstract class apiController
{

    protected $vista;
    protected $data;
    protected $user;
    protected $key;

    public function __construct()
    {
        $this->vista = new vista();
        $this->data = file_get_contents("php://input");
        $this->user = new userModel();
    }

    function obtenerDatos($params = null)
    {
        return json_decode($this->data, true);
    }

    function generarToken( $params=null ){
        $token = 'd7a03fee5546592a37e22ff8f45bbbe45da4632dfed9a774e085d0e8b5d3fa73';
        if($token){
            $this->vista->response($token, 200);
        }
        else $this->vista->response("Error al generar token", 500);
    }

    function verificarToken(){
        $headers = getallheaders();
        if(isset($headers['Authorization'])){
        $authHeader = $headers['Authorization'];
        }
        $key = null;
        $token = 'd7a03fee5546592a37e22ff8f45bbbe45da4632dfed9a774e085d0e8b5d3fa73';   

        if(isset($authHeader)){
            $authHeaderParts = explode(' ', $authHeader);
            if(count($authHeaderParts) === 2 && $authHeaderParts[0] === 'Bearer'){
                $key = $authHeaderParts[1];
            }
        }

        if($key === $token){
            return true;
        } else return false;
    }
    
}