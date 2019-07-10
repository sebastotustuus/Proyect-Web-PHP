<?php 
    require_once 'Includes/redireccion.php'; 
    require_once 'Includes/header.php';
    require_once 'Includes/helpers.php';
    
    /* BARRA LATERAL */
     require_once 'Includes/asides.php'; 
    
?>

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

<div class="principal">
<h1>MODIFICAR ENTRADA: </h1>
<h2><?= $entrada['TITULO'] ?></h2>
<p>Modifica Entradas al Blog para que los usuarios puedas usarlas al crear sus entradas</p><br>
<form action="guardar-entrada.php?editar=<?= $entrada['ID'] ?>" method="POST">

    <label for="titulo">Titulo de la Entrada</label>
    <input type="text" name="titulo" id="" value="<?= $entrada['TITULO'] ?>">
    <?php echo isset($_SESSION['errores_entradas']) ? mostrarError($_SESSION['errores_entradas'], 'titulo') : ''; ?>

    <label for="descripcion">Descripción: </label>
    <textarea rows="" cols="" name="descripcion"><?= $entrada['DESCRIPCION'] ?></textarea>
    <?php echo isset($_SESSION['errores_entradas']) ? mostrarError($_SESSION['errores_entradas'], 'descripcion') : ''; ?>

    <label for="categoria">Categoría</label>
    <select name="categoria">
    <option value="0">Eliga una Categoría</option>
        <?php 
                $categorias = getCategorias($db); 
                if (!empty($categorias)):
                    while($categoria = mysqli_fetch_assoc($categorias)):
        ?>
                <option value="<?= $categoria['ID'] ?>"<?= ($categoria['ID'] == $entrada['CATEGORIA_ID'] ? 'selected': '') ?> >
                    <?= $categoria['NOMBRE'] ?>
                </option>

        <?php 
                endwhile;
            endif;
        ?>
        
    </select>
    <?php echo isset($_SESSION['errores_entradas']) ? mostrarError($_SESSION['errores_entradas'], 'categoria') : ''; ?>
            
    <input type="submit" value="GUARDAR">
</form>

<?php borrarErrores() ?>


</div>

    <div class="clearfix"></div>

     
 </div>

<?php require_once 'Includes/footer.php'?>