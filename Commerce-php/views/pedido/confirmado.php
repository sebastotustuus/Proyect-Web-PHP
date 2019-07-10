<?php if(isset($_SESSION['pedido']) && $_SESSION['pedido'] = "complete"): ?>

<h1>TU PEDIDO SE HA CONFIRMADO</h1>

    <p>Tu pedido se ha guardado con éxito, una vez que realices la transferencia 
        bancaria con el coste del pedido, será procesado y enviado.
    </p>
<br>
    <?php if(isset($pedido)): ?>
        <h3>DATOS DEL PEDIDO</h3>
            
            Numero de Pedido: <?=$pedido->id?> <br>
            Total a pagar: $ <?=$pedido->costo?> <br>
            Productos:

            <?php while($product = $productos->fetch_object()): ?>
                <ul>
                    <li>
                        <?=$product->nombre?> - <?=$product->precio?> - x<?=$product->unidades?>
                    </li>
                </ul>
            <?php endwhile; ?>
          
    <?php endif; ?>

<?php elseif(isset($_SESSION['pedido']) && $_SESSION['pedido'] != "complete"): ?>
    <h1>Tu pedido NO se ha completado</h1>
<?php endif; ?>