<?php

class userModel{

    private $db;

    function __construct()
    {
        $this->db = new PDO('mysql:host=localhost;' . 'dbname=db_pcshop;charset:utf8', 'root', '');
    }

    function getToken($token){
        $respuesta = $this->db->prepare('SELECT token FROM user WHERE (token = ?)');
        $respuesta->execute(array($token));
        return $respuesta->fetch(PDO::FETCH_OBJ);
    }

    function getTimeByToken($token){
        $respuesta = $this->db->prepare('SELECT time FROM user WHERE (token = ?)');
        $respuesta->execute(array($token));
        return $respuesta->fetch(PDO::FETCH_OBJ);
    }

    function getUser($username){
        $respuesta = $this->db->prepare('SELECT * FROM user WHERE (username = ?)');
        $respuesta->execute(array($username));
        return $respuesta->fetch(PDO::FETCH_OBJ);
    }

    function putToken($username, $token, $time){        
        $respuesta = $this->db->prepare('UPDATE user SET token = ?, time = ? WHERE (username = ?)');
        return $respuesta->execute(array ($token,$time, $username));
    }
}