<?php
    if(isset($_POST)){
        require_once 'Includes/conexion.php';

        $nombre = isset($_POST['nombreCategoria']) ? mysqli_real_escape_string($db, $_POST['nombreCategoria']) : false;
        // var_dump($_POST['nombreCategoria']);
        // die();

        //Array de Errores
        $errores = array();
   
        //Validamos Datos antes de Guardar en Bases de Datos
        //Validar Datos del Nombre
        if (!empty($nombre) && !is_numeric($nombre)) {
            $nombre_valido = true;
        }else {
            $nombre_valido = false;
            $errores['nombreCategoria'] = "El nombre no es válido";
        }
   
        if (count($errores) == 0) {
               $sql = "INSERT INTO categorias VALUES(null, '$nombre')";
               $response = mysqli_query($db, $sql);
        }

        
    }

    header ('Location: index.php');


?>