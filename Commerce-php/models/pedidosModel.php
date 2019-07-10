<?php

class Pedido {
    private $db;
    private $id;
    private $usuario_id;
    private $departamento;
    private $ciudad;
    private $direccion;
    private $total;
    private $estado;
    private $fecha;
    private $hora;


    public function __construct(){
        $this->db = Database::connect();
    }


    

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id

     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of usuario_id
     */ 
    public function getUsuario_id()
    {
        return $this->usuario_id;
    }

    /**
     * Set the value of usuario_id

     */ 
    public function setUsuario_id($usuario_id)
    {
        $this->usuario_id = $usuario_id;

        return $this;
    }

    /**
     * Get the value of departamento
     */ 
    public function getDepartamento()
    {
        return $this->departamento;
    }

    /**

     */ 
    public function setDepartamento($departamento)
    {
        $this->departamento = $departamento;

        return $this;
    }

    /**
     * Get the value of ciudad
     */ 
    public function getCiudad()
    {
        return $this->ciudad;
    }

    /**
     * Set the value of ciudad

     */ 
    public function setCiudad($ciudad)
    {
        $this->ciudad = $ciudad;

        return $this;
    }

    /**
     * Get the value of direccion
     */ 
    public function getDireccion()
    {
        return $this->direccion;
    }

    /**
     * Set the value of direccion

     */ 
    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;

        return $this;
    }

    /**
     * Get the value of total
     */ 
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * Set the value of total

     */ 
    public function setTotal($total)
    {
        $this->total = $total;

        return $this;
    }

    /**
     * Get the value of estado
     */ 
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * Set the value of estado
     */ 
    public function setEstado($estado)
    {
        $this->estado = $estado;

        return $this;
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
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;

        return $this;
    }

    /**
     * Get the value of hora
     */ 
    public function getHora()
    {
        return $this->hora;
    }

    /**
     * Set the value of hora
     */ 
    public function setHora($hora)
    {
        $this->hora = $hora;

        return $this;
    }

    public function save(){
        $sql = "INSERT INTO pedidos VALUES(null, {$this->getUsuario_id()}, '{$this->getDepartamento()}', '{$this->getCiudad()}', '{$this->getDireccion()}', {$this->getTotal()}, '{$this->getEstado()}', CURDATE(), CURTIME())";
        $response  = $this->db->query($sql);
        //var_dump($this->db->error);

        $result = false;

        if ($response) {
            $result = true;
        }

        return $result;
       
    }

    public function getAll(){
        $sql = "SELECT * FROM pedidos ORDER BY id DESC";
        $producto = $this->db->query($sql);      
        return $producto;
    }

    public function getOne(){
        $sql = "SELECT * FROM pedidos WHERE id = {$this->getId()}";
        $producto = $this->db->query($sql);      
        return $producto->fetch_object();
    }

    public function getOneByUser(){
        $sql = "SELECT  p.costo, p.usuario_id, lp.* FROM pedidos p "
                    ."INNER JOIN lineas_pedidos lp ON lp.pedido_id=p.id "
                    ."WHERE p.usuario_id = {$this->getUsuario_id()} ORDER BY id DESC LIMIT 1";
        $pedido = $this->db->query($sql); 
        return $pedido->fetch_object();
    }

    public function getProductosByPedido($id){
        // $sql = "SELECT * FROM productos WHERE id IN (SELECT producto_id FROM lineas_pedidos WHERE pedido_id = {$id})";
        $sql = "SELECT pr.*, lp.unidades FROM productos pr INNER JOIN lineas_pedidos lp ON pr.id = lp.producto_id WHERE pedido_id = {$id}";
        $producto = $this->db->query($sql); 
        // var_dump($producto);
        return $producto;
    }

    public function save_linea(){
        $sql = "SELECT LAST_INSERT_ID() AS 'pedido';";
        $response  = $this->db->query($sql);
        $pedido_id = $response->fetch_object()->pedido;

        foreach ($_SESSION['carrito'] as $key => $value) {
            $producto = $value['producto'];

            $insert = "INSERT INTO lineas_pedidos VALUES(null, {$pedido_id}, {$producto->id}, {$value['unidades']})";
            $save = $this->db->query($insert);
        }

        //var_dump($this->db->error);
        //var_dump($pedido_id);

        $result = false;

        if ($save) {
            $result = true;
        }

        return $result;

    }
}