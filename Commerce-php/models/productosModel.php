<?php

class Producto{
    private $db;
    private $id;
    private $nombre;
    private $categoria_id;
    private $descripcion;
    private $precio;
    private $stock;
    private $oferta;
    private $fecha;
    private $imagen;

    public function __construct(){
        $this->db = Database::connect();
    }

    /**
     * Get the value of id
     */ 
    public function getId(){
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
    public function setNombre($nombre){
        $this->nombre = $this->db->real_escape_string($nombre);
    }

    /**
     * Get the value of categoria_id
     */ 
    public function getCategoria_id()
    {
        return $this->categoria_id;
    }

    /**
     * Set the value of categoria_id
     */ 
    public function setCategoria_id($categoria_id){
        $this->categoria_id = $this->db->real_escape_string($categoria_id);
    }

    /**
     * Get the value of descripcion
     */ 
    public function getDescripcion(){
        return $this->descripcion;
    }

    /**
     * Set the value of descripcion
     */ 
    public function setDescripcion($descripcion){
        $this->descripcion = $this->db->real_escape_string($descripcion);
    }

    /**
     * Get the value of precio
     */ 
    public function getPrecio()
    {
        return $this->precio;
    }

    /**
     * Set the value of precio
     */ 
    public function setPrecio($precio){
        $this->precio = $this->db->real_escape_string($precio);
    }

    /**
     * Get the value of stock
     */ 
    public function getStock()
    {
        return $this->stock;
    }

    /**
     * Set the value of stock
     */ 
    public function setStock($stock){
        $this->stock = $this->db->real_escape_string($stock);
    }

    /**
     * Get the value of oferta
     */ 
    public function getOferta()
    {
        return $this->oferta;
    }

    /**
     * Set the value of oferta
     */ 
    public function setOferta($oferta){
        $this->oferta = $this->db->real_escape_string($oferta);
    }

    /**
     * Get the value of fecha
     */ 
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * Set the value of fecha
     */ 
    public function setFecha($fecha){
        $this->fecha = $fecha;
    }

    /**
     * Get the value of imagen
     */ 
    public function getImagen()
    {
        return $this->imagen;
    }

    /**
     * Set the value of imagen
     */ 
    public function setImagen($imagen){
        $this->imagen = $imagen;
    }

    public function getAll(){
        $sql = "SELECT * FROM productos ORDER BY id DESC";
        $producto = $this->db->query($sql);      
        return $producto;
    }

    public function saveDB(){
        $sql = "INSERT INTO productos VALUES(null, '{$this->getCategoria_id()}', '{$this->getNombre()}', '{$this->getDescripcion()}', '{$this->getPrecio()}', '{$this->getStock()}', null, CURDATE(), '{$this->getImagen()}')";
        $response  = $this->db->query($sql);

        $result = false;

        if ($response) {
            $result = true;
        }

        return $result;
       
    }

    public function delete(){
        $sql = "DELETE FROM productos WHERE id={$this->id}";
        $response = $this->db->query($sql);

        $result = false;

        if ($response) {
            $result = true;
        }

        return $result;
    }

    public function getOne(){
        $sql = "SELECT * FROM productos WHERE id = {$this->getId()}";
        $producto = $this->db->query($sql);      
        return $producto->fetch_object();
    }

    public function edit(){
       
        $sql = "UPDATE productos SET categoria_id={$this->getCategoria_id()}, nombre='{$this->getNombre()}', descripcion='{$this->getDescripcion()}', precio={$this->getPrecio()}, stock={$this->getStock()}"; 
        
        if ($this->getImagen() != null) {
            $sql .= ", imagen='{$this->getImagen()}'";  
        }
        
        $sql .= " WHERE id={$this->getId()} ";
        
        $response  = $this->db->query($sql);

        $result = false;

        if ($response) {
            $result = true;
        }

        return $result;
       
    }

    public function getRamdon($limit){
        $sql = "SELECT * FROM productos ORDER BY RAND() LIMIT $limit";
        $response = $this->db->query($sql);

        return $response;
    }

    public function getAllCategoria(){
        $sql = "SELECT p.*, c.nombre AS 'catnombre' FROM productos p "
                ."INNER JOIN categorias c ON c.id = p.categoria_id "
                ."WHERE p.categoria_id={$this->getCategoria_id()}";

        $producto = $this->db->query($sql);      
        return $producto;
    }
}