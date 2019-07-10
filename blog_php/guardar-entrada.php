<?php
if(isset($_POST)){
    require_once 'Includes/conexion.php';

    $titulo = isset($_POST['titulo']) ? mysqli_real_escape_string($db, $_POST['titulo']) : false;
    $descripcion = isset($_POST['descripcion']) ? mysqli_real_escape_string($db, $_POST['descripcion']) : false;
    $categoria = isset($_POST['categoria']) ? (int)$_POST['categoria'] : false;
    $usuario_id = $_SESSION['usuario']['ID'];
        // var_dump($_POST);
        // var_dump($_SESSION);
        // die();

    //Array de Errores
    $errores = array();

    //Validamos Datos antes de Guardar en Bases de Datos

    //Validar Datos del Nombre
    if (!empty($titulo)) {
        $titulo_valido = true;
    }else {
        $titulo_valido = false;
        $errores['titulo'] = "El campo del titulo está vacío";
    }

    //Validar Datos de la Descripción
    if (!empty($descripcion)) {
        $descripcion_valido = true;
    }else {
        $descripcion_valido = false;
        $errores['descripcion'] = "Por Favor introduzca un texto para la entrada.";
    }

    //Validar Datos de la lista de Categorías
    if (!empty($categoria) && $categoria > 0) {
        $descripcion_valido = true;
    }else {
        $descripcion_valido = false;
        $errores['categoria'] = "Por Favor seleccione una categoría.";
    }

     

    if (count($errores) == 0) {
        if(isset($_GET['editar'])){
            $entrada_id = $_GET['editar'];
            $sql = "UPDATE entradas e SET e.TITULO = '$titulo', e.DESCRIPCION = '$descripcion', e.CATEGORIA_ID = '$categoria' 
                                WHERE e.ID = '$entrada_id' AND e.USUARIO_ID = '$usuario_id'";
            }
            
            else{
                $sql = "INSERT INTO entradas VALUES(null, '$usuario_id', '$categoria', '$titulo', '$descripcion', CURDATE() )";
            }
            
           $response = mysqli_query($db, $sql);
            //    var_dump(mysqli_error());
            //    die();
         header ('Location: index.php');
    }else{
        
        $_SESSION['errores_entradas'] = $errores;
        header ('Location: crear-entradas.php');
        
    }

    
}






?>