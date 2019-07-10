<?php

require_once 'models/productosModel.php';

class productosController{

    public function index(){
        $product = new Producto();
        $productos = $product->getRamdon(6);

            //var_dump($productos->fetch_object());
        //Render de la vista
        require_once 'views/producto/destacados.php';
    }

    public function gestion(){
        Utils::isAdmin();
        $productos = new Producto();
        $producto = $productos->getAll();
        require_once 'views/producto/gestion.php';
    }

    public function create(){
        Utils::isAdmin();
        require_once 'views/producto/crear.php';
    }

    public function save(){
        Utils::isAdmin();

        if (isset($_POST)) {
            


            //Validacion de existencia de los Datos

            $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
            $categoria_id = isset($_POST['categoria']) ? $_POST['categoria'] : false;
            $descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : false;
            $precio = isset($_POST['precio']) ? $_POST['precio'] : false;
            $stock = isset($_POST['stock']) ? $_POST['stock'] : false;
            //$imagen = isset($_POST['imagen']) ? $_POST['imagen'] : false;

            //Validaciones de los Datos


            #Nombre
            if (!empty($nombre) && !is_numeric($nombre) && !preg_match("/[0-9]/", $nombre)) {
                $nombre_valido = true;
            }else {
                $nombre_valido = false;
                $errores['nombre'] = "El Nombre no es válido";
            }

            #Categoría
            if (!empty($categoria_id) && $categoria_id != "sinCategoria") {
                $categoria_id_valido = true;
            }else {
                $categoria_id_valido = false;
                $errores['categoria_id'] = "La Categoría no es válida";
            }

            #Descripcion
            if (!empty($descripcion)) {
                $descripcion_valido = true;
            }else {
                $descripcion_valido = false;
                $errores['descripcion'] = "La descripción está vacía";
            }

            #Precio
            if (!empty($precio) && preg_match("/[0-9]/", $precio)) {
                $precio_valido = true;
            }else {
                $precio_valido = false;
                $errores['precio'] = "El precio no es válido";
            }

            #stock
            if (!empty($stock)) {
                $stock_valido = true;
            }else {
                $stock_valido = false;
                $errores['stock'] = "El stock no es válido";
            }

            if ($nombre_valido && $categoria_id_valido && $descripcion_valido && $precio_valido && $stock_valido) {
                $producto = new Producto();
                $producto->setNombre($nombre);
                $producto->setCategoria_id($categoria_id);
                $producto->setDescripcion($descripcion);
                $producto->setPrecio($precio);
                $producto->setStock($stock);
                $producto->setOferta(null);

                //Guardar la Imagen
                if(isset($_FILES['imagen'])){
                    $archivo = $_FILES['imagen'];
                    $filename = $archivo['name'];
                    $mimeType = $archivo['type'];


                    if ($mimeType == 'image/jpg' || $mimeType == 'image/jpeg' || $mimeType == 'image/png' || $mimeType == 'image/gif') {
                        if (!is_dir('uploads/images')) {
                            mkdir('uploads/images', 0777, true);
                        }

                        move_uploaded_file($archivo['tmp_name'], 'uploads/images/'.$filename);
                        $producto->setImagen($filename);
                    }

                    if (isset($_GET['id'])) {

                        // var_dump($_POST);
                        // var_dump($_GET['id']);
                        // die();

                        $id = $_GET['id'];
                        $producto->setId($id);
                        $save = $producto->edit();
                    }else {
                        $save = $producto->saveDB();
                    }
                    

                    if ($save) {
                    $_SESSION['producto'] = "Complete";
                    }else {
                        $_SESSION['producto'] = "Failed1";
                    }

                }
                
            }else{
                $_SESSION['producto'] = "Failed2";
            }

        }else{
            $_SESSION['producto'] = "Failed3";
        }

        header("Location:".base_url."productos/gestion");
    }

    public function editar(){
        Utils::isAdmin();

        if (isset($_GET['id'])) {
            $editar = true;
            $id = $_GET['id'];

            $producto = new Producto();
            $producto->setId($id);

            $result = $producto->getOne();
            require_once 'views/producto/crear.php';

        } else {
            header('Location:'.base_url.'productos/gestion');
        }
        
        
    }

    public function eliminar(){
        Utils::isAdmin();

        if (isset($_GET['id'])) {
            $id = $_GET['id'];

            // var_dump($_GET['id']);
            // die();

            $borradoProdcuto = new Producto();
            $borradoProdcuto->setId($id);
            $delete = $borradoProdcuto->delete();

            if ($delete) {
                $_SESSION['delete'] = 'Borrado Completo';
            } else {
                $_SESSION['delete'] = 'Borrado Fallido';
            }

        }else {
            $_SESSION['delete'] = 'Los Parametros no existen';
        }

        header('Location:'.base_url.'productos/gestion');
    }

    public function ver(){
        if (isset($_GET['id'])) {
            $id = $_GET['id'];

            $productos = new Producto();
            $productos->setId($id);
            $producto = $productos->getOne();
        }

        require_once 'views/producto/ver.php';

    }

}