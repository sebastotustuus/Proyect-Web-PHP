<?php

require_once 'Includes/redireccion.php'; 
require_once 'Includes/header.php';
require_once 'Includes/asides.php';

?>

<!-- CAJA PRINCIPAL -->
<div class="principal">
    <h1>MIS DATOS</h1>

    <!-- CONFIRMA EL ENVÍO DE DATOS DE QUE FUE EXITOSO O NO EN LA DB-->
    <?php if(isset($_SESSION['completado'])):  ?>
                <div class="alerta alerta-exito">
                    <?= $_SESSION['completado']?>
                </div>
        <?php elseif(isset($_SESSION['errores']['general'])): ?>
                <div class="alerta alerta-error">
                    <?= $_SESSION['errores']['general'] ?>
                </div>
        <?php endif ?>  <!--FIN DE LA CONFIRMACION -->


    <form action="actualizar-usuario.php" method="POST">
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre">
        <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'nombre') : ''; ?>

        <label for="apellidos">Apellidos</label>
        <input type="text" name="apellidos">
        <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'apellidos') : ''; ?>

        <input type="submit" name="registro" value="ACTUALIZAR">
     </form>
     <?php borrarErrores() ?>


</div>  <!-- FIN CAJA PRINCIPAL -->


<?php require_once 'Includes/footer.php'; ?>