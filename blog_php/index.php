<?php 
    require_once 'Includes/header.php';
    require_once 'Includes/helpers.php';
    
    /* BARRA LATERAL */
     require_once 'Includes/asides.php'; 
?>

    
   
    <!-- CAJA PRINCIPAL -->

        <div class="principal">
            <h1>Últimas Entradas</h1>
            
            <?php
                $entradas = getEntradas($db);
                //   var_dump($entradas);
                //   die();
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
             <?php
                   
                    endwhile;
                    
                endif;
            ?>
            
            <article class="entradas">
              
            
            <div id="ver-todas">
                <a href="entradas.php">Ver todas las Entradas</a>
            </div>
        </div> <!-- FIN DEL CONTENEDOR-->

        <div class="clearfix"></div>

        
    </div>
    <!-- PIE DE PAGINA-->
        <?php require_once 'Includes/footer.php'?>

</body>
</html>