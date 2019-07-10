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
                $entrada = getEntradaUnica($db, $_GET['id']);
                // var_dump($_GET['id']);
                // var_dump($entrada); 
                // var_dump($_SESSION);
                //die();
            }else {
                header('Location: index.php');
            }
        ?>

            <h1> <?= $categoria['NOMBRE'] ?> </h1>
                
            <?php
                
                if(!empty($entrada)): ?>
                    <article class="entradas">
                                <h2><?= $entrada['TITULO'] ?></h2>
                                    <p id="entradasParrafo">
                                        <?= $entrada['DESCRIPCION']?>
                                    </p>
                                    <p id="datosPequeños">Fecha de la Entrada: <?= $entrada['FECHA'] ?></p>
                                    <p id="datosPequeños">Autor de la Entrada: <?= $entrada['user'] ?></p>
                    </article>
                <?php else: ?>
                    <h3 id="textoCategoriaVacia">EN EL MOMENTO NO EXISTEN ENTRADAS PARA ESTA CATEGORÍA. ¡LO SENTIMOS!</h3>            
                 <?php endif; ?>
 
            <article class="entradas">

         <?php if(isset($_SESSION['usuario']) && $_SESSION['usuario']['ID'] == $entrada['USUARIO_ID']): ?>
                <a href="editar-entrada.php?id=<?=$entrada['ID']?>" class="boton editar-entrada">Editar Entrada</a>
                <a href="borrar-entrada.php?id=<?=$entrada['ID']?>" class="boton borrar-entrada">Borrar Entrada</a>

        <?php endif; ?>    
              
        </div> <!-- FIN DEL CONTENEDOR-->

        <div class="clearfix"></div>

        
    </div>


    <!-- PIE DE PAGINA-->
        <?php require_once 'Includes/footer.php'?>

</body>
</html>