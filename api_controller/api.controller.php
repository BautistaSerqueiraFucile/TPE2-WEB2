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
        $token = null;                       
        
        if(isset($authHeader)){
            $authHeaderParts = explode(' ', $authHeader);
            if(count($authHeaderParts) === 2 && $authHeaderParts[0] === 'Bearer'){
                $token = $authHeaderParts[1];
            }
        }

        if($this->user->getToken($token) && $this->verificarTime($token)){
            return true;
        } else return false;
    }

    function verificarTime($token){
        $time = $this->user->getTimeByToken($token);
        $timeActual = time();
        
        if (($timeActual - $time->time) <= 10 ) {
            return true;
        }
        else return false;
    }
    
}