<?php 
//CONEXION CON LA DB
require_once 'Includes/conexion.php';

if (isset($_POST['registro'])) {
    
    $nombre  = isset($_POST['nombre']) ? $_POST['nombre'] : false;
    $apellidos = isset($_POST['apellidos']) ? $_POST['apellidos'] : false;
    $email = isset($_POST['email']) ? mysqli_real_escape_string($db, trim($_POST['email'])) : false;
    $password = isset($_POST['password']) ?  $_POST['password'] : false;

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

    
    //Validación Datos del Email
    if (!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $email_valido = true;
    }else {
        $email_valido = false;
        $errores['email'] = "El Email no es válido";
    }

    //Validación Datos Contraseña
    if (!empty($password)) {
        $password_valido = true;
    }else {
        $password_valido = false;
        $errores['password'] = "La Contraseña está Vacía";
    }

    $guardar_usuario = false;

    if(count($errores) == 0){

        $guardar_usuario = true;
        //CIFRADO DE CONTRASEÑA
        $password_segura = password_hash($password, PASSWORD_BCRYPT, ['cost'=>4]);

        //INSERTAMOS EL USUARIO EN LA BASE DE DATOS
        $sql = "INSERT INTO usuarios VALUES(null, '$nombre', '$apellidos', '$email', '$password_segura', CURDATE())";
        $response = mysqli_query($db, $sql);

        
         if ($response) {
             $_SESSION['completado'] = 'El registro se ha completado con Exito';
         }else {
            $_SESSION['errores']['general'] = 'Fallo al guardar el Usuario!!';
         }

    }else {
        $_SESSION['errores'] = $errores;
        
    }
}

header('Location: index.php');


?>