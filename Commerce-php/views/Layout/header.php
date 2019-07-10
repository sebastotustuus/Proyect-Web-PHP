<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="" href="<?=base_url?>assets/css/styles.css">
    <title>Document</title>
</head>
<body>
    <!-- CABECERA -->
    <div id="container">
        <header id="header">
            <div id="logo">
                <img src="<?=base_url?>assets/img/camiseta.png" alt="Camiseta Logo">
                <a href="<?=base_url?>">
                    Tienda de Ropa
                </a>
            </div>
        </header>

        <!-- MENU -->
        <?php $categorias = Utils::showCategorias() ?>
        <nav id="menu">
            <ul>
                <!-- BOTÓN INICIO -->
                <li><a href="<?=base_url?>">Inicio</a></li>

                <!-- BOTÓN CATEGORÍAS -->
                    <?php while($cat = $categorias->fetch_object()): ?>
                        <li><a href="<?=base_url?>categoria/ver&id=<?=$cat->id?>"><?=$cat->nombre?></a></li>
                    <?php endwhile; ?>

                <li><a href="">Quienes Somos</a></li>
                <li><a href="">Contacto</a></li>
            </ul>
        </nav>


    <div id="content">