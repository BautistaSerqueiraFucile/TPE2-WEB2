<?php

class userModel{

    private $db;

    function __construct()
    {
        $this->db = new PDO('mysql:host=localhost;' . 'dbname=db_pcshop;charset:utf8', 'root', '');
    }
}