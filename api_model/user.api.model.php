<?php

class userModel{

    private $db;

    function __construct()
    {
        $this->db = new PDO('mysql:host=localhost;' . 'dbname=db_pcshop;charset:utf8', 'root', '');
    }

    function getToken($username){
        $respuesta = $this->db->prepare('SELECT token FROM user WHERE (username = ?)');
        $respuesta->execute(array($username));
        return $respuesta->fetch(PDO::FETCH_OBJ);
    }

    function getUser($username){
        $respuesta = $this->db->prepare('SELECT * FROM user WHERE (username = ?)');
        $respuesta->execute(array($username));
        return $respuesta->fetch(PDO::FETCH_OBJ);
    }

    function putToken($username, $token){        
        $respuesta = $this->db->prepare('UPDATE user SET token = ? WHERE (username = ?)');
        return $respuesta->execute(array ($token, $username));
    }
}