<?php

class Utils{

    public static function deleteSession($nameSession){

        if (isset($_SESSION[$nameSession])) {
            $_SESSION[$nameSession] =  null;
            unset($_SESSION[$nameSession]);
        }

        return $nameSession;
    }

    public static function MostrarErrores($errores, $campo){
        $alert = '';
        if (isset($errores[$campo]) && !empty($campo)) {
            $alert = "<div class='alert_red'>".$errores[$campo]."</div>";
        }

        return $alert;
    }

    public static function deleteError($nameError){

        if (isset($_SESSION[$nameError])) {
            $_SESSION[$nameError] =  null;
            unset($_SESSION[$nameError]);
        }

        return $nameError;
    }

    public static function isAdmin(){
        if (!isset($_SESSION['admin'])) {
            header('Location:'.base_url);
        }else{
            return true;
        }
    }

    public static function showCategorias(){
        require_once 'models/categoriaModel.php';
        $categoria = new Categoria();
        $categorias = $categoria->getCategorias();
        return $categorias;
    }


    public static function statsCarrito(){
        $stats = array(
            "count" => 0,
            "total" => 0,
            "unidades" => 0
        );

        if (isset($_SESSION['carrito'])) {
            $stats['count'] = count($_SESSION['carrito']);
            
            foreach ($_SESSION['carrito'] as $key => $value) {
                $stats['total'] += $value['precio'] * $value['unidades'];
                $stats['unidades'] += $value['unidades'];
            }
        }

        return $stats;
    }

     

}