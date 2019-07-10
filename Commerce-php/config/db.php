<?php

class Database{

    public static function connect(){
        $name = 'localhost';
        $user_db = 'root';
        $password_db = '';
        $database = 'tienda_php';

        $db = new mysqli($name, $user_db, $password_db, $database);
        $db->query("SET NAMES 'utf8'");

        return $db;
    }
}

session_start();