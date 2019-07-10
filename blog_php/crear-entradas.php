<?php

require_once 'Includes/redireccion.php'; 
require_once 'Includes/header.php';
require_once 'Includes/asides.php';

?>

<div class="principal">
<h1>CREAR NUEVAS ENTRADAS</h1>
<p>Añade Nuevas Entradas al Blog para que los usuarios puedas usarlas al crear sus entradas</p><br>
<form action="guardar-entrada.php" method="POST">

    <label for="titulo">Titulo de la Entrada</label>
    <input type="text" name="titulo" id="">
    <?php echo isset($_SESSION['errores_entradas']) ? mostrarError($_SESSION['errores_entradas'], 'titulo') : ''; ?>

    <label for="descripcion">Descripción: </label>
    <textarea rows="" cols="" name="descripcion"></textarea>
    <?php echo isset($_SESSION['errores_entradas']) ? mostrarError($_SESSION['errores_entradas'], 'descripcion') : ''; ?>

    <label for="categoria">Categoría</label>
    <select name="categoria">
    <option value="0">Eliga una Categoría</option>
        <?php 
                $categorias = getCategorias($db); 
                if (!empty($categorias)):
                    while($categoria = mysqli_fetch_assoc($categorias)):
        ?>
                <option value="<?= $categoria['ID'] ?>">
                    <?= $categoria['NOMBRE'] ?>
                </option>

        <?php 
                endwhile;
            endif;
        ?>
        
    </select>
    <?php echo isset($_SESSION['errores_entradas']) ? mostrarError($_SESSION['errores_entradas'], 'categoria') : ''; ?>
            
    <input type="submit" value="GUARDAR">
</form>

<?php borrarErrores() ?>

</div>


<?php require_once 'Includes/footer.php'; ?>



