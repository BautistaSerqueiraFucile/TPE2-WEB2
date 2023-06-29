<?php
require_once 'api_view/api.view.php';
require_once 'api_controller/user.api.controller.php';

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

    
    function verificarToken($params=null){
        $headers = getallheaders();
        if(isset($headers['Authorization'])){
        $authHeader = $headers['Authorization'];
        }
        $key = null;        
        $token = $params->token;        
        
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