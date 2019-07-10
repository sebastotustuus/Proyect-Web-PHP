 <!-- BARRA LATERAL -->
 <aside id='lateral'>

        <div id="carrito" class="block_aside">
            <h3>MI CARRITO</h3>
            <ul>
                <?php ob_start(); $stats = Utils::statsCarrito();?>
                <li><a href="<?=base_url?>carrito/index">Productos <?=$stats['count']?></a></li>
                <li><a href="<?=base_url?>carrito/index">Total: $<?=$stats['total']?></a></li>
                <li><a href="<?=base_url?>carrito/index">Ver el Carrito</a></li>
            </ul>

        </div>
            <div id="login" class="block_aside">

                <?php if(!isset($_SESSION['login'])): ?>
                    <h3>Entrar a la WEB</h3>
                

                    <form action="<?=base_url?>usuario/login" method="POST">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="">

                        <label for="password">Contraseña</label>
                        <input type="password" name="password" id="">

                        <input type="submit" value="Enviar">
                    </form>
                    <br>
                    <h4><a href="<?=base_url?>usuario/Registro">¡Regístrate Aquí!</a></h4>
                <?php else:?>
                            <h3>Bienvenido: <?= ' '.$_SESSION['login']->nombre ?><?= ' '.$_SESSION['login']->apellidos ?></h3>

                            <h4>Rol Asignado:
                                <?php if(isset($_SESSION['admin']) && $_SESSION['admin']): ?>
                                        <span class="mensaje">Administrador</span> 
                                    <?php elseif(isset($_SESSION['user']) && $_SESSION['user']):?>
                                        <span class="mensaje">Usuario</span> 
                                <?php endif;?>
                            </h4> 
                                
                            <h4><a href="<?=base_url?>usuario/logout">Cerrar Sesión</a></h4>
                  
                <?php endif;?>

                <?php if(isset($_SESSION['admin']) && $_SESSION['admin']): ?>
                        <ul>
                            <li><a href="<?=base_url?>categoria/index">Gestionar Categorías</a></li>
                            <li><a href="<?=base_url?>productos/gestion">Gestionar Productos</a></li>
                            <li><a href="#">Gestionar Pedidos</a></li>
                        
                <?php endif;?>  

                <?php if(isset($_SESSION['login']) && $_SESSION['login']): ?>
                            <li><a href="#">Mis Pedidos</a></li>
                        </ul>
                <?php endif;?>   
                
                

            </div>
        </aside>


        <!-- CONTENIDO CENTRAL -->
        <div id="central">
        
