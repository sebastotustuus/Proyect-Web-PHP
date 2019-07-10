<!-- MENU LATERAL -->
<div id="container">
    <aside id="sidebar">

    <div id="buscador" class="BloqueAside">
                    <h3>BUSCAR</h3>
                        <form action="buscar.php" method="POST">
                            <input type="text" name="busqueda">
                            <input type="submit" value="Enviar">
                        </form>
    </div>

        <?php if(isset($_SESSION['usuario'])): ?>
            <div id="usuario-logueado" class="BloqueAside">
                <h3>Bienvenido: <?= $_SESSION['usuario']['NOMBRE'].' '.$_SESSION['usuario']['APELLIDOS'] ?></h3>
                    <!-- Botones -->
                <a href="crear-entradas.php" class="boton boton-entradas">Crear Entradas</a>
                <a href="crearcategoria.php" class="boton boton-categtorias">Crear Categorías</a>
                <a href="mis-datos.php" class="boton botonEditar-datos">Editar Datos</a>
                <a href="logout.php" class="boton boton-logout">Cerrar Sesión</a>
            </div>
        <?php endif ?>


        <?php if(!isset($_SESSION['usuario'])): ?>

                <div id="login" class="BloqueAside">
                    <h3>Identifícate</h3>
                    <?php if(isset($_SESSION['errorlogin'])): ?>
                        <div class="alerta alerta-error">
                            <h3><?=$_SESSION['errorlogin'] ?></h3>
                        </div>
                    <?php endif ?>

                    <form action="login.php" method="POST">
                        <label for="email">Email</label>
                        <input type="email" name="email">

                        <label for="contraseña">Contraseña</label>
                        <input type="password" name="password">

                        <input type="submit" value="Enviar">
                    </form>
                </div>

                <div id="register" class="BloqueAside">

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

                    <h3>Regístrate</h3>
                    <form action="register.php" method="POST">
                        <label for="nombre">Nombre</label>
                        <input type="text" name="nombre">
                        <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'nombre') : ''; ?>

                        <label for="apellidos">Apellidos</label>
                        <input type="text" name="apellidos">
                        <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'apellidos') : ''; ?>

                        <label for="email">Email de Registro</label>
                        <input type="email" name="email">
                        <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'email') : ''; ?>

                        <label for="contraseña">Contraseña</label>
                        <input type="password" name="password">
                        <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'password') : ''; ?>

                        <input type="submit" name="registro" value="Registrar">
                    </form>
                    <?php borrarErrores() ?>
                </div>
            <?php endif ?>
    </aside>
