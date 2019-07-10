<?php

class Categoria{

    private $id;
    private $nombre;
    private $db;
        
    public function __construct(){
        $this->db = Database::connect();
    }
    /**

     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id

     */ 
    public function setId($id){
        $this->id = $id;
    }

    /**
     * Get the value of nombre
     */ 
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set the value of nombre
     */ 
    public function setNombre($nombre)
    {
        $this->nombre = $this->db->real_escape_string($nombre);

        return $this;
    }

    public function getCategorias(){
        $sql = "SELECT * FROM categorias";
        $response = $this->db->query($sql);

        return $response;
    }

    public function getOne(){

        $sql = "SELECT * FROM categorias WHERE id={$this->getID()}";
        $response = $this->db->query($sql);

        return $response->fetch_object();
    }

    public function save(){
        $sql = "INSERT INTO categorias VALUES (null, '{$this->getNombre()}')";
        $response = $this->db->query($sql);

        return $response;

    }
}