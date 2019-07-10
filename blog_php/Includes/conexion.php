<?php

$host = 'localhost';
$username = 'root';
$password = '';
$dataBase = 'masterphp';

$db = mysqli_connect($host, $username, $password, $dataBase);

mysqli_query($db, "SET NAMES 'utf8'"); //Setear Caracteres Especiales;

//INICIAR LA SESIÓN

if(!isset($_SESSION)){
    session_start();
}
