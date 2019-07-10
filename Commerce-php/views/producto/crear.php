<?php if(isset($editar) && $editar && isset($result) && is_object($result)): ?>
    <h1>Editar Producto <?=$result->nombre?></h1>
    <?php $url_action = base_url."productos/save&id=".$result->id; ?>
<?php else: ?>
    <h1>CREAR NUEVOS PRODUCTOS</h1>
    <?php $url_action = base_url."productos/save"; ?>
<?php endif; ?>

<div class="form_container">
    

    <form action="<?=$url_action?>" method="POST" enctype="multipart/form-data">
        <label for="nombre">Nombre:</label>
        <input type="text" name='nombre' value="<?=isset($result) && is_object($result) ? $result->nombre : '' ?>">

        <label for="descripcion">Descripción:</label>
        <textarea rows="" cols="" name="descripcion"><?=isset($result) && is_object($result) ? $result->descripcion : '' ?></textarea>

        <label for="precio">Precio:</label>
        <input type="text" name='precio' value="<?=isset($result) && is_object($result) ? $result->precio : '' ?>">

        <label for="stock">Stock:</label>
        <input type="number" name='stock' value="<?=isset($result) && is_object($result) ? $result->stock : '' ?>">

        <label for="categoria">Categoría:</label>
        <?php  $categorias = Utils::showCategorias(); ?>

        <select name="categoria">
            <option value="sinCategoria">--Escoja una Categoría--</option>
            <?php while($cat = $categorias->fetch_object()): ?>
                    <option value="<?=$cat->id?>" <?=isset($result) && is_object($result) && $cat->id == $result->categoria_id ? 'selected' : '' ?>>
                            <?=$cat->nombre?>
                    </option>
            <?php endwhile; ?>
            
        </select>

        <label for="imagen">Imagen:</label>
            <?php  if(isset($result) && is_object($result) && !empty($result->imagen)): ?>
                <img src="<?=base_url?>uploads/images/<?=$result->imagen?>" alt="" class="thumb">
            <?php endif;?>
        <input type="file" name='imagen'>

        <input type="submit" value="GUARDAR">
    </form>

</div>