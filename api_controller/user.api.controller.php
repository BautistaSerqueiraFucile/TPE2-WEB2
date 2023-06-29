<?php
require_once 'api_model/user.api.model.php';
require_once 'api_view/api.view.php';
class userController{

    private $model;
    private $vista;

    private $data;

    function __construct(){
        $this->model= new userModel();
        $this->vista= new vista();
        $this->data = file_get_contents("php://input");
    }

    function generarToken( $params=null ){
        return bin2hex(random_bytes(32));
    }

    function obtenerDatos($params = null)
    {
        return json_decode($this->data, true);
    }

    function cargarToken($params = null){
        $token = $this->generarToken();
        $username = $this->obtenerDatos();            
        if ($this->model->getUser($username['username'])) {
            if ($this->model->putToken($username['username'],$token)) {
                $this->vista->response($token, 201);
            }
            else {
                $this->vista->response("Hubo un error en la carga de token", 400);
            }
        }
        else {
            $this->vista->response("El usuario no existe", 400);
        }
    }
}
