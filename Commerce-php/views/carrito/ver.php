<h1>CARRO DE COMPRAS</h1>

<table class="">
    <tr>
        <th>IMAGEN</th>
        <th>NOMBRE</th>
        <th>PRECIO</th>
        <th>UNIDADES</th>
    </tr>

    <?php 
        foreach($carrito as $key => $value):  
        $producto = $value['producto']
    ?>

    <tr> 
         <!-- COLUMNA DE IMAGEN -->
        <td><img src="<?=base_url?>uploads/images/<?=$producto->imagen?>" alt="" class="thumb" ></td>
         <!-- COLUMNA DE NOMBRE -->
         <td><?=$producto->nombre?></td>
         <!-- COLUMNA DE PRECIO -->
         <td><?=$value['precio']?></td>
         <!-- COLUMNA DE PRECIO -->
         <td><?=$value['unidades']?></td>
    </tr>
  

    <?php endforeach;?>
</table>

<br>
<div class="total-carrito">
    <?php $stats = Utils::statsCarrito(); ?>
    <h3>PRECIO TOTAL: <?=$stats['total']?></h3>
    <a href="<?=base_url?>pedidos/hacer" class="button button-pedido">HACER PEDIDO</a>
</div>