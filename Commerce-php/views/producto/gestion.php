<h1>Gestión de Productos</h1>

<?php if (isset($_SESSION['producto']) && $_SESSION['producto'] = "Complete") {
    echo "<h3 class='alert_green'>EL PRODUCTO SE HA CREADO CORRECTAMENTE</h3>";
}

?>

<?php if(isset($_SESSION['delete']) && $_SESSION['delete'] = "Borrado Completo"): ?>
    <h3 class="alert_green">SE HA BORRADO EL ELEMENTO</h3>
<?php elseif (isset($_SESSION['delete']) && $_SESSION['delete'] = "Borrado Fallido"):?>
    <h3>NO SE HA PODIDO BORRAR EL ELEMENTO</h3>
<?php endif; ?>

<table>
        <tr>
            <th>ID</th>
            <th>NOMBRE</th>
            <th>PRECIO</th>
            <th>STOCK</th>  
            <th>ACCIONES</th>        
        </tr>
 
    <?php while($product = $producto->fetch_object()): ?>
        <tr>
            <td><?= $product->id; ?></td>
            <td><?= $product->nombre; ?></td>      
            <td>$ <?= $product->precio; ?></td>     
            <td><?= $product->stock; ?></td>
            <td>
                <a href="<?=base_url?>productos/editar&id=<?=$product->id?>" class="button button-gestion">Editar</a>
                <a href="<?=base_url?>productos/eliminar&id=<?=$product->id?>" class="button button-gestion button-red">Eliminar</a>
            </td>            
        </tr>
    <?php endwhile; ?>


</table>

<?php Utils::deleteSession('producto')?>
<?php Utils::deleteSession('delete')?>

<a href="<?=base_url?>productos/create" class="button button-small">CREAR PRODUCTO</a>