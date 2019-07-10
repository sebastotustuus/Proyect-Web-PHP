<h1>Gestionar Categorías</h1>


<table>
        <tr>
            <th>ID</th>
            <th>NOMBRE</th>      
        </tr>
 
    <?php while($cat = $categorias->fetch_object()): ?>
        <tr>
            <td><?= $cat->id; ?></td>
            <td><?= $cat->nombre; ?></td>      
        </tr>
    <?php endwhile; ?>

</table>

<a href="<?=base_url?>categoria/create" class="button button-small">CREAR CATEGORÍA</a>
