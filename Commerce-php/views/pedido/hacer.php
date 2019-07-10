<?php  if(isset($_SESSION['admin']) ||  isset($_SESSION['user'])): ?>
<h1>HACER PEDIDO</h1>
<p>
    <a href="<?=base_url?>carrito/index">VER LOS PRODUCTOS Y EL PRECIO DEL PEDIDO</a>
</p>

<br>

<h3>DIRECCIÓN PARA EL ENVÍO</h3>
    <form action="<?=base_url?>pedidos/add" method="POST">
        <label for="departamento">Departamento</label>
        <input type="text" name="departamento" value="" required>

        <label for="ciudad">Ciudad</label>
        <input type="text" name="ciudad" value="" required>

        <label for="direccion">Dirección</label>
        <input type="text" name="direccion" value="" required>

    <input type="submit" value="CONFIRMAR">

    </form>





<?php else:?>
    <h1>NECESITAS ESTAR IDENTIFICADO</h1>
    <p>Necesitar estar registrado en la Web para poder completar el pedido satisfactoriamente</p>

<?php endif;?>