
<?php
/* --------------> OBTENER TIPOS DE ERRORES <-------------------*/
function mostrarError($errores, $campo){
   
    $alert = '';
    if (isset($errores[$campo]) && !empty($campo)) {
        $alert = "<div class='alerta alerta-error'>".$errores[$campo]."</div>";
    }

    return $alert;
}

function borrarErrores(){
    $borrado = false;

   if (isset($_SESSION['errores'])) {
        $_SESSION['errores'] = null;
        unset($_SESSION['errores']);
   }

    if (isset($_SESSION['errores_entradas'])) {
        $_SESSION['errores_entradas'] = null;
        unset($_SESSION['errores_entradas']);
    }

    if (isset($_SESSION['completado'])) {
        $_SESSION['completado'] = null;
        unset($_SESSION['completado']);
    }

}
/* ******************************************************************** */


/* --------------> OBTENER ENTRADAS <-------------------*/

function getEntradas($conexion){
    $sql = "SELECT e.*, c.ID AS 'ID CATEGORIA', c.NOMBRE 
                FROM entradas e INNER JOIN categorias c 
                            ON e.categoria_id = c.id ORDER BY e.id DESC LIMIT 4";

    $respuesta = mysqli_query($conexion, $sql);

    $resultado = array();

    if ($respuesta && mysqli_num_rows($respuesta) >= 1) {
        $resultado = $respuesta;
    }

    return $resultado;
}

function getAllEntradas($conexion){
    $sql = "SELECT e.*, c.ID AS 'ID CATEGORIA', c.NOMBRE 
                FROM entradas e INNER JOIN categorias c 
                        ON e.categoria_id = c.id ORDER BY e.id DESC";

    $respuesta = mysqli_query($conexion, $sql);

    $resultado = array();

    if ($respuesta && mysqli_num_rows($respuesta) >= 1) {
        $resultado = $respuesta;
    }

    return $resultado;
}

function getEntradaUnica($conexion, $id){
    $sql = "SELECT e.*, CONCAT(u.nombre, ' ', u.apellidos) AS 'user' 
                FROM entradas e INNER JOIN usuarios u 
                            ON e.usuario_id = u.id  
                                    WHERE e.ID = '$id'";

    $respuesta = mysqli_query($conexion, $sql);

    $resultado = array();

    if ($respuesta && mysqli_num_rows($respuesta) == 1) {
        $resultado = mysqli_fetch_assoc($respuesta);
    }

    return $resultado;
}

/* ******************************************************************** */



/* --------------> OBTENER CATEGORIAS <-------------------*/
function getCategorias($conexion){
    $sql = "SELECT * FROM categorias ORDER BY id ASC";
    $categorias = mysqli_query($conexion, $sql);

    $result = array();
    if ($categorias && mysqli_num_rows($categorias) >= 1) {
        $result = $categorias;
    }

    return $result;
}

function getCategoria($conexion, $id){
    $sql = "SELECT * FROM categorias WHERE ID = '$id'";
    $categorias = mysqli_query($conexion, $sql);

    $result = array();
    if ($categorias && mysqli_num_rows($categorias) >= 1) {
        $result = mysqli_fetch_assoc($categorias);
    }

    return $result;
}

function getEntradaporCategoria ($conexion, $id){
    $sql = "SELECT * FROM entradas e WHERE categoria_id = '$id' ORDER BY e.id ASC";
    $categorias = mysqli_query($conexion, $sql);

    $result = array();
    if ($categorias && mysqli_num_rows($categorias) >= 1) {
        $result = $categorias;
    }

    return $result;
}
/* ******************************************************************** */

function buscarEntrada($conexion, $busqueda){
    $sql = "SELECT e.*, c.ID AS 'ID CATEGORIA', c.NOMBRE 
                FROM entradas e INNER JOIN categorias c 
                        ON e.categoria_id = c.id WHERE e.titulo LIKE '%$busqueda%'";

    $respuesta = mysqli_query($conexion, $sql);

    $resultado = array();

    if ($respuesta && mysqli_num_rows($respuesta) >= 1) {
        $resultado = $respuesta;
    }

    return $resultado;
}