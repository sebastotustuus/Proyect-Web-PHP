<?php

require_once 'models/pedidosModel.php';

class pedidosController{

   
    public function add(){
        if (isset($_SESSION['login'])) {

            $usuario_id = $_SESSION['login']->id;
            $departamento = isset($_POST['departamento']) ? $_POST['departamento'] : false;
            $ciudad = isset($_POST['ciudad']) ? $_POST['ciudad'] : false;
            $direccion = isset($_POST['direccion']) ? $_POST['direccion'] : false;
            
            $stats = Utils::statsCarrito();
            $total = $stats['total'];
            //var_dump($total);

            //Guardar datos en la Base de datos
            if($departamento && $ciudad && $direccion){
                $pedido = new Pedido();
                $pedido->setUsuario_id($usuario_id);
                $pedido->setDepartamento($departamento);
                $pedido->setCiudad($ciudad);
                $pedido->setDireccion($direccion);
                $pedido->setTotal($total);
                $pedido->setEstado(null);
                
                $save = $pedido->save();
                
                //Guardar Linea Pedido
                $save_linea = $pedido->save_linea();

                if ($save && $save_linea) {
                    $_SESSION['pedido'] = "complete";
                } else {
                    $_SESSION['pedido'] = "failed";
                }
                
            }else {
                $_SESSION['pedido'] = "failed datos";
            } 
            
            //var_dump($_SESSION['pedido']);

        }else{
            //Redirigir al Index
            header("Location:".base_url);
        }
       
        header("Location:".base_url."pedidos/confirmado");
    }

    public function hacer(){
        require_once 'views/pedido/hacer.php';
    }

    public function confirmado(){
        if (isset($_SESSION['login'])) {
            $login = $_SESSION['login'];

            $pedidos = new Pedido();
            $pedidos->setUsuario_id($login->id);
            $pedido = $pedidos->getOneByUser();

            $lista_productos = new Pedido();
            $pedido_id = $pedido->pedido_id;
            $productos = $lista_productos->getProductosByPedido($pedido_id);
            // var_dump($productos);
            
        }
        


        require_once 'views/pedido/confirmado.php';
    }

}