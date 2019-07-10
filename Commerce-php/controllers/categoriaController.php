<?php

require_once 'models/categoriaModel.php';
require_once 'models/productosModel.php';

class categoriaController{

    public function index(){
        Utils::isAdmin();
        $categoria = new Categoria();
        $categorias = $categoria->getCategorias();

        require_once 'views/categorias/index.php';
    }

    public function create(){
        Utils::isAdmin();
        require_once 'views/categorias/crear.php';
    }

    public function save(){
        Utils::isAdmin();

        if (isset($_POST)) {    
            //var_dump($_POST);

            //Validar la existencia del Nombre de la categoría
            $categoria_nueva = isset($_POST['nombre']) ? $_POST['nombre'] : false;

            //Validación Sintáxis correcta de la categoría nueva
            $errores = array();
            if (!empty($categoria_nueva) && !is_numeric($categoria_nueva) && !preg_match("/[0-9]/", $categoria_nueva)) {
                $categoria_nueva_valido = true;
            }else {
                $categoria_nueva_valido = false;
                $errores['nombre'] = "El Nombre no es válido";
            }


            if ($categoria_nueva_valido && count($errores) == 0) {
                $guardarCategoria = new Categoria();
                $guardarCategoria->setNombre($categoria_nueva);
                $save = $guardarCategoria->save();

                if ($save) {
                    $_SESSION['registered'] = 'Registro Completado con Éxito';
                    header('Location:'.base_url.'categoria/index');
                }else{
                    $_SESSION['registered'] = "Failed DataBase";
                }
            }else {
                $_SESSION['errores'] = $errores;
                header('Location:'.base_url.'categoria/create');
            }
        }
    }

    public function ver(){
        if (isset($_GET['id'])) {
             //var_dump($_GET);
             $id = $_GET['id'];

            //Conseguir Categoría 
             $categoria = new Categoria();
             $categoria->setId($id);
             $category = $categoria->getOne();

            //Conseguir Productos
            $product = new Producto;
            $product->setCategoria_id($id);
            $products = $product->getAllCategoria();
             //var_dump($category);
        }

        //Render Imagen
        require_once 'views/categorias/ver.php';
    }
}