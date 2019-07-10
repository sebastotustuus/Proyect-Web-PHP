<?php
  require_once 'Includes/conexion.php';

//   var_dump($_SESSION['usuario']);
//   var_dump($_GET['id']);
//   die();

  if (isset($_SESSION['usuario']) && isset($_GET['id'])) {
      $id = $_GET['id'];
      $usuario_id = $_SESSION['usuario']['ID'];

      $sql = "DELETE FROM entradas WHERE usuario_id = '$usuario_id' AND id = '$id'";
      $result = mysqli_query($db, $sql);
  } else {
      # code...
  }

  header("Location: index.php");
  