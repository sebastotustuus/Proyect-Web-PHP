<?php 
    require_once 'Includes/conexion.php';
    require_once 'Includes/helpers.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/estilos.css">
    <title>Document</title>
</head>
<body>

    <!-- CABECERA -->
    <header id="header">
        <!-- LOGO -->
        <div id="logo">
            <a href="index.php">Blog de VideoJuegos</a>
        </div>


         <!-- MENU --->
         
    <nav id="nav">
        <ul>
            <li><a href="index.php">Inicio</a></li>
            <?php 
                $categorias = getCategorias($db); 
                while($categoria = mysqli_fetch_assoc($categorias)): ?>
                    <li>
                        <a href="categoria.php?id=<?=$categoria['ID']?>"> <?= $categoria['NOMBRE'] ?> </a>
                    </li>
            <?php endwhile; ?>
            <li><a href="">Sobre Mi</a></li>
            <li><a href="">Contacto</a></li>
        </ul>
    </nav>
    <div class="clearfix"></div>
    </header>