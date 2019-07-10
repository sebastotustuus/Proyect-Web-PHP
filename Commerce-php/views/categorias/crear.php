<h1>Crear Categoría</h1>

<?php if(isset($_SESSION['registered']) && $_SESSION['registered'] == 'Registro Completado con Éxito'): ?>
        <strong class="alert_green">REGISTRO COMPLETADO CORRECTAMENTE</strong>
<?php elseif(isset($_SESSION['registered']) && $_SESSION['register'] == 'Failed DataBase'): ?>
    <strong class="alert_red">REGISTRO FALLIDO</strong>
<?php endif; ?>

    <form action="<?= base_url ?>categoria/save" method="POST">
        <label for="nombre">Nombre de la Categoría</label>
        <input type="text" name="nombre">
        <?php echo isset($_SESSION['errores']) ?  Utils::MostrarErrores($_SESSION['errores'], 'nombre') : ''; ?>

        <input type="submit" value="Guardar">

    </form>

<?php if(isset($_SESSION['registered'])){
        Utils::deleteError('registered');
    }
    
    elseif (isset($_SESSION['errores'])) {
        Utils::deleteError('errores');
    }
    
?>
 