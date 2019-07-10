<h1>ACTUALIZAR PRODUCTO</h1>

<div class="form_container">
    
    <form action="<?=base_url?>productos/save" method="POST" enctype="multipart/form-data">
        <label for="nombre">Nombre:</label>
        <input type="text" name='nombre'>

        <label for="descripcion">Descripción:</label>
        <textarea rows="" cols="" name="descripcion"></textarea>

        <label for="precio">Precio:</label>
        <input type="text" name='precio'>

        <label for="stock">Stock:</label>
        <input type="number" name='stock'>

        <label for="categoria">Categoría:</label>
        <?php  $categorias = Utils::showCategorias(); ?>

        <select name="categoria">
            <option value="sinCategoria">--Escoja una Categoría--</option>
            <?php while($cat = $categorias->fetch_object()): ?>
                    <option value="<?=$cat->id?>"><?=$cat->nombre?></option>
            <?php endwhile; ?>
            
        </select>

        <label for="imagen">Imagen:</label>
        <input type="file" name='imagen'>

        <input type="submit" value="GUARDAR">
    </form>

</div>