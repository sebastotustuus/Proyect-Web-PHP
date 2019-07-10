<?php
    require_once 'Includes/redireccion.php'; 
    require_once 'Includes/header.php';
    require_once 'Includes/asides.php';
    
?>

<div class="principal">
    <h1>CREAR CATEGORÍAS</h1>
    <p>Añade Nuevas Categorías al Blog para que los usuarios puedas usarlas al crear sus entradas</p><br>
    <form action="guardar-categoria.php" method="POST">

        <label for="nombreCategoria">Nombre de la Categoría</label>
        <input type="text" name="nombreCategoria" id="">
        <input type="submit" value="GUARDAR">
    </form>

</div>


<?php require_once 'Includes/footer.php'; ?>

