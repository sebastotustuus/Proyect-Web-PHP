<?php

require_once 'models/usuarioModel.php';

class usuarioController{

    public function index(){
        echo "Controlador Usuarios, Acción Index";
    }

    public function Registro(){
        require_once 'views/usuario/registro.php';
    }

    public function save(){
        if (isset($_POST)) {
            //    var_dump($_POST['nombre']);
            //    die();

            $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
            $apellidos = isset($_POST['apellidos']) ? $_POST['apellidos'] : false;
            $email = isset($_POST['email']) ? $_POST['email'] : false;
            $password = isset($_POST['password']) ? $_POST['password'] : false;

            //Validamos Datos antes de Guardar en Bases de Datos
            //Validar Datos del Nombre

            $errores = array();

            if (!empty($nombre) && !is_numeric($nombre) && !preg_match("/[0-9]/", $nombre)) {
                $nombre_valido = true;
            }else {
                $nombre_valido = false;
                $errores['nombre'] = "El Nombre no es válido";
            }

            //Validación Datos de Apellidos
            if (!empty($apellidos) && !is_numeric($apellidos) && !preg_match("/[0-9]/", $apellidos)) {
                $apellido_valido = true;
            }else {
                $apellido_valido = false;
                $errores['apellidos'] = "El Apellido no es válido";
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

            if ($nombre_valido && $apellido_valido && $email_valido && $password_valido) {

                $usuario = new UsuarioModel(); //Conexión con la Clase del Modelo. Se envián datos para la Base de Datos
            
                $usuario->setNombre($nombre);
                $usuario->setApellidos($apellidos);
                $usuario->setEmail($email);
                $usuario->setPassword($password);
                $guardar = $usuario->save();
    
                //   var_dump($guardar);
                //   die();
                
                if ($guardar) {
                   $_SESSION['register'] = "Complete";
                }else{
                    $_SESSION['register'] = "Failed";
                }
            }else {
                $_SESSION['errores'] = $errores;
                
            }
           
        }else{
            $_SESSION['register'] = "Failed";
           
        }   
        
        header('Location:'.base_url.'usuario/registro');
    }

    public function login(){
        if(isset($_POST)){
            //1. Identificar al Usuario
            $email = isset($_POST['email']) ? $_POST['email'] : false;
            $password = isset($_POST['password']) ? $_POST['password'] : false;

                //Validación Datos del Email
                if (!empty($email)) {
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
                    $errores['password'] = "La Contraseña está vacía";
                }

            //2. Consultar con la Base de Datos
            if ($email_valido && $password_valido) {

                $usuario = new UsuarioModel();
                $login = $usuario->loginUser($email, $password);
                // var_dump($login);
                // die();

                //3. Crear una sesión
                if (is_object($login) && $login) {
                    $_SESSION['login'] = $login;

                    
                    if ($login->rol == 'admin') {
                         //Sesión para Administrador
                        $_SESSION['admin'] = true;
                    }else{
                         //Sesión para Usuarios
                        $_SESSION['user'] = true;
                    }
                }else{
                    $_SESSION['login'] = "Sesión Fallida";
                }
            }
              
        }

        header("Location:".base_url);
    }

    public function logout(){
        if(isset($_SESSION['login'])){
            unset($_SESSION['login']);
        }

        if(isset($_SESSION['admin'])){
            unset($_SESSION['admin']);
        }

        if(isset($_SESSION['user'])){
            unset($_SESSION['user']);
        }

        header("Location:".base_url);
    }

}//FIN DE LA CLASE