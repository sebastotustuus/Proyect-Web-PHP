<?php 
    require_once 'Includes/header.php';
    require_once 'Includes/helpers.php';
    
    /* BARRA LATERAL */
     require_once 'Includes/asides.php'; 
?>

    
   
    <!-- CAJA PRINCIPAL -->

        <div class="principal">
        <?php
            if (isset($_POST['busqueda'])) {
                $busquedas = buscarEntrada($db, $_POST['busqueda']);  
            }else {
                header('Location: index.php');
            }
        ?>

            <h1>RESULTADOS DE <?= $_POST['busqueda'] ?> </h1>
            
            <?php
                if(!empty($busquedas)):
                    while($busqueda = mysqli_fetch_assoc($busquedas)):               
            ?>
                <article class="entradas">
                        <a href="EntradaUnica.php?id=<?= $busqueda['ID'] ?>">
                            <h2><?= $busqueda['TITULO'] ?></h2>
                                <p>
                                    <?= substr( $busqueda['DESCRIPCION'], 0, 200)."..." ?>
                                </p>
                                <p id="datosPequeños">Fecha de la Entrada: <?= $busqueda['FECHA'] ?></p>
                        </a>
                 </article>
                    <?php endwhile; ?>
                <?php else: ?>
                    <h3 id="textoCategoriaVacia">¡LO SENTIMOS! NO EXISTEN ENTRADAS CON ESTAS CONDICIONES</h3>
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