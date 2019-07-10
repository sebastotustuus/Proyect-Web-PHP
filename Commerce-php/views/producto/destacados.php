
        <h1>ALGUNOS DE NUESTROS PRODUCTOS</h1>

        <?php while($producto = $productos->fetch_object()): ?>

            <a href="<?=base_url?>productos/ver&id=<?=$producto->id?>">
                <div class="product">
                    <!-- Zona para la Imagen -->
                    <?php if($producto->imagen != null): ?>
                        <img src="<?=base_url?>uploads/images/<?=$producto->imagen?>" alt="">
                    <?php else:?>
                            <img src="assests/img/camiseta.png" alt="">
                    <?php endif;?>

                <!-- Zona para el Nombre -->
                <h2><?=$producto->nombre?></h2> 
            </a>

                <!-- Zona para el Precio -->
                <p><?=$producto->precio?></p>

                <a href="<?=base_url?>carrito/add&id=<?=$producto->id?>" class="button">COMPRAR</a>
            </div>

        <?php endwhile ?>
            
    </div>


   