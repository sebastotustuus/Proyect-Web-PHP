<?php if(isset($producto)): ?>
    <h1><?=$producto->nombre?></h1>
                <div id="detail_product">
                        <!-- Zona para la Imagen -->
                    <div class="image">
                        <?php if($producto->imagen != null): ?>
                                <img src="<?=base_url?>uploads/images/<?=$producto->imagen?>" alt="">
                        <?php else:?>
                                <img src="assests/img/camiseta.png" alt="">
                        <?php endif;?>
                    </div>

                    <div class="data">
                        <!-- Zona para el Nombre -->
                        <h2><?=$producto->nombre?></h2> 

                        <!-- Zona para el Nombre -->
                        <p><?=$producto->descripcion?></p>

                        <!-- Zona para el Precio -->
                        <p><?=$producto->precio?></p>

                        <a href="<?=base_url?>carrito/add&id=<?=$producto->id?>" class="button">COMPRAR</a>
                    </div>
                </div>

<?php else: ?>
    <h1>LA CATEGORÍA NO EXISTE</h1> 
<?php endif;?>