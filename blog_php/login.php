<?php

//CONEXIÓN BASE DE DATOS
require_once 'Includes/conexion.php';

//INICIO DE SESION
if(isset($_POST)){
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    //CONSULTA PARA COMPROBAR LAS CREDENCIALES DEL USUARIO
    $sql = "SELECT * FROM usuarios WHERE email = '$email' LIMIT 1";
    $login = mysqli_query($db, $sql);

    if ($login && mysqli_num_rows($login) == 1) {
        $usuario = mysqli_fetch_assoc($login); //Obtengo los datos del usuario en Forma de ARRAY ASOCIATIVO
        #var_dump($usuario);
        #die();
       //COMPROBAR LA CONTRASEÑA 
                 //Accedo a la contraseña guardada en el array Asociativo de Usuarios
        $verify = password_verify($password, $usuario['CONTRASEÑA']);

            if ($verify) {
                //UTILIZAR UNA SESION PARA GUARDAR LOS DATOS DEL USUARIO LOGUEADO
                $_SESSION['usuario'] = $usuario;

                if(isset($_SESSION['errorlogin'])){ //SI YA EXISTIA UNA SESION DE ERROR, SE DEBE DE BORRAR
                    unset($_SESSION['errorlogin']);
                }

            } else {
                //SI ALGO FALLA, ENVIAR SESIÓN CON EL FALLO
                $_SESSION['errorlogin'] = 'Login incorrecto';
            }
            
    }else {

        //SI ALGO FALLA, ENVIAR SESIÓN CON EL FALLO
        $_SESSION['errorlogin'] = 'Login incorrecto';

    }  
    
}

//REDIRIGIR AL INDEX
header('Location:index.php');






