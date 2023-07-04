<?php

class pc_model
{

    private $db;

    function __construct()
    {

        $this->db = new PDO('mysql:host=localhost;' . 'dbname=db_pcshop;charset:utf8', 'root', '');
    }

    // funcion para obtener datos de pc en conjunto con gama

    function GetAllPc()
    {
        $sentencia = $this->db->prepare('SELECT * FROM pc join gama on pc.id_gama = gama.id_gama');
        $sentencia->execute();
        return $sentencia->fetchAll(PDO::FETCH_OBJ);

    }

    // funcion para obtener datos de una pc en conjunto con gama

    function getPcById($id)
    {
        $sentencia = $this->db->prepare('SELECT * FROM pc JOIN gama on pc.id_gama = gama.id_gama WHERE (pc.id_pc=?)');
        $sentencia->execute(array($id));
        return ($sentencia->fetch(PDO::FETCH_OBJ));
    }

    function getPcByOrder($sort, $order)
    {
        $sentencia = $this->db->prepare("SELECT * FROM pc join gama on pc.id_gama = gama.id_gama ORDER BY $sort $order");
        $sentencia->execute();        
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }

    function getPaginado( $limit, $offset)
    {
        $sentencia = $this->db->prepare("SELECT * FROM pc join gama on pc.id_gama = gama.id_gama ORDER BY pc.id_pc ASC LIMIT $limit OFFSET $offset ");
        $sentencia->execute();        
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }

    function getPcFilter($filter, $value)
    {

        $sentencia = $this->db->prepare("SELECT * FROM pc join gama on pc.id_gama = gama.id_gama where (pc.$filter = ?)");
        $sentencia->execute(array($value));
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }


    //-----------------------------------------------------------------------------

    function postPc($pc)
    {
        $respuesta = $this->db->prepare('INSERT INTO pc (id_pc, motherboard, processor, disco, RAM, video, description_pc, id_gama) value(?,?,?,?,?,?,?,?)');
        return $respuesta->execute(array('', $pc['motherboard'], $pc['processor'], $pc['disco'], $pc['RAM'], $pc['video'], $pc['description_pc'], $pc['id_gama']));
    }

    function putPc($id_pc, $pc)
    {
        $respuesta = $this->db->prepare('UPDATE pc SET motherboard=?, processor=?,disco=?, RAM=?, video=?, description_pc=?, id_gama=? WHERE (id_pc= ?)');
        return $respuesta->execute(array($pc['motherboard'], $pc['processor'], $pc['disco'], $pc['RAM'], $pc['video'], $pc['description_pc'], $pc['id_gama'], $id_pc));
    }

    function searchPc($id_pc)
    {
        $respuesta = $this->db->prepare('SELECT * FROM pc JOIN gama on pc.id_gama=gama.id_gama WHERE (id_pc=?)');
        $respuesta->execute(array($id_pc));
        return ($respuesta->fetch(PDO::FETCH_OBJ));
    }
}