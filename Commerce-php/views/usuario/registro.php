<h1>Registrarse</h1>

<?php if(isset($_SESSION['register']) && $_SESSION['register'] == 'Complete'): ?>
        <strong class="alert_green">REGISTRO COMPLETADO CORRECTAMENTE</strong>
<?php elseif(isset($_SESSION['register']) && $_SESSION['register'] == 'Failed'): ?>
    <strong class="alert_red">REGISTRO FALLIDO</strong>
<?php endif; ?>

<?php Utils::deleteSession('register') ?>


<form action="<?= base_url?>usuario/save" method="POST">
    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre" >
    <?php echo isset($_SESSION['errores']) ?  Utils::MostrarErrores($_SESSION['errores'], 'nombre') : ''; ?>

    <label for="apellidos">Apellidos:</label>
    <input type="text" name="apellidos" >
    <?php echo isset($_SESSION['errores']) ? Utils::MostrarErrores($_SESSION['errores'], 'apellidos') : ''; ?>

    <label for="email">Email:</label>
    <input type="email" name="email" >
    <?php echo isset($_SESSION['errores']) ? Utils::MostrarErrores($_SESSION['errores'], 'email') : ''; ?>

    <label for="password">Contraseña:</label>
    <input type="password" name="password" >
    <?php echo isset($_SESSION['errores']) ? Utils::MostrarErrores($_SESSION['errores'], 'password') : ''; ?>

    <input type="submit" value="Registrarse">

    <?php Utils::deleteError('errores') ?>

</form>