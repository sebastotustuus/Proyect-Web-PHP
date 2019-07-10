<?php 

if (isset($_POST)) {
    

    //CONEXION CON LA DB
    require_once 'Includes/conexion.php';
    
    //RECOGER DATOS DEL FORMULARIO PARA SU ACTUALIZACIÓN
    $nombre  = isset($_POST['nombre']) ? $_POST['nombre'] : false;
    $apellidos = isset($_POST['apellidos']) ? $_POST['apellidos'] : false;


    //Array de Errores
    $errores = array();

    //Validamos Datos antes de Guardar en Bases de Datos
    //Validar Datos del Nombre
    if (!empty($nombre) && !is_numeric($nombre) && !preg_match("/[0-9]/", $nombre)) {
        $nombre_valido = true;
    }else {
        $nombre_valido = false;
        $errores['nombre'] = "El nombre no es válido";
    }

    //Validación Datos de Apellidos
    if (!empty($apellidos) && !is_numeric($apellidos) && !preg_match("/[0-9]/", $apellidos)) {
        $apellido_valido = true;
    }else {
        $apellido_valido = false;
        $errores['apellidos'] = "El apellido no es válido";
    }


    $guardar_usuario = false;

    if(count($errores) == 0){

        //COMPROBAR QUE EL EMAIL SEA ÚNICO (SOLO SI PERMITO QUE CAMBIE EL EMAIL)


        $guardar_usuario = true;
        $datosUsuario = $_SESSION['usuario'];
        var_dump($_SESSION['usuario']);
        //die();
        
        //ACTUALIZAR EL USUARIO EL USUARIO EN LA BASE DE DATOS
        $sql = "UPDATE usuarios SET NOMBRE = '$nombre', APELLIDOS = '$apellidos' 
                    WHERE ID = ".$datosUsuario['ID'];
        $response = mysqli_query($db, $sql);

        
         if ($response) {
            $_SESSION['usuario']['NOMBRE'] = $nombre;
            $_SESSION['usuario']['APELLIDOS'] = $apellidos;
            
            //var_dump($_SESSION['usuario']);
            //var_dump($_SESSION['usuario']['APELLIDOS']);
            //die();
            

            $_SESSION['completado'] = 'Tus datos se han Actualizado con Exito';
         }else {
            $_SESSION['errores']['general'] = 'Fallo al Actualizar los Datos!!';
         }

    }else {
        $_SESSION['errores'] = $errores;
        
    }
}

header('Location: mis-datos.php');


?>