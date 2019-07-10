<?php 
    require_once 'Includes/header.php';
    require_once 'Includes/helpers.php';
    
    /* BARRA LATERAL */
     require_once 'Includes/asides.php'; 
?>

    
   
    <!-- CAJA PRINCIPAL -->

        <div class="principal">
        <?php
            if (isset($_GET['id'])) {
                $categoria = getCategoria($db, $_GET['id']);  
            }else {
                header('Location: index.php');
            }
        ?>

            <h1>ENTRADA DE <?= $categoria['NOMBRE'] ?> </h1>
            
            <?php
                $entradas = getEntradaporCategoria($db, $_GET['id']);
                //  var_dump($_GET['id']);
                //  var_dump($entradas);
                //  die();
                if(!empty($entradas)):
                    while($entrada = mysqli_fetch_assoc($entradas)):               
            ?>
                <article class="entradas">
                        <a href="EntradaUnica.php?id=<?= $entrada['ID'] ?>">
                            <h2><?= $entrada['TITULO'] ?></h2>
                                <p>
                                    <?= substr( $entrada['DESCRIPCION'], 0, 200)."..." ?>
                                </p>
                                <p id="datosPequeños">Fecha de la Entrada: <?= $entrada['FECHA'] ?></p>
                        </a>
                 </article>
                    <?php endwhile; ?>
                <?php else: ?>
                    <h3 id="textoCategoriaVacia">EN EL MOMENTO NO EXISTEN ENTRADAS PARA ESTA CATEGORÍA. ¡LO SENTIMOS!</h3>
                    <img src="" alt="">
            
                 <?php endif; ?>
              
           
            
            <article class="entradas">
              
        </div> <!-- FIN DEL CONTENEDOR-->

        <div class="clearfix"></div>

        
    </div>
    <!-- PIE DE PAGINA-->
        <?php require_once 'Includes/footer.php'?>

</body>
</html>