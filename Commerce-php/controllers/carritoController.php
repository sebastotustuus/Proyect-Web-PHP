<?php
require_once 'models/productosModel.php';

class carritoController{

    public function index(){
        //var_dump($_SESSION['carrito']);
        //echo "Controlador de Pedidos, Acción Index";
        if (isset($_SESSION['carrito'])) {
            $carrito = $_SESSION['carrito'];
            require_once 'views/carrito/ver.php';
        }else{
            header("Location:".base_url);
        }
       
    }

    public function add(){
        if (isset($_GET['id'])) {
            $producto_id = $_GET['id'];
        }else{
            header('Location:'.base_url);
        }

        if (isset($_SESSION['carrito'])) {
            $carrito = $_SESSION['carrito'];

            $counter = 0;
            foreach ($carrito as $key => $value) {
                if ($value['id_producto'] == $producto_id) {
                    $_SESSION['carrito'][$key]['unidades']++;
                    $counter++;
                }
            }
        }
        
        if(!isset($counter) || $counter == 0){
                //Seleccionar Producto
                $productos = new Producto();
                $productos->setId($producto_id);
                $producto = $productos->getOne();
            
                //Añadir al Carrito
                if (is_object($producto)) {
                    $_SESSION['carrito'][] = array(
                        "id_producto" => $producto->id,
                        "precio" => $producto->precio,
                        "unidades" => 1,
                        "producto" => $producto
                    );
                }

                //var_dump($_SESSION['carrito']);
                
            }
            
        header("Location:".base_url."carrito/index");
    }

    public function remove(){

    }

    public function delete_all(){
        unset($_SESSION['carrito']);
        header("Location:".base_url."carrito/index");
    }


}