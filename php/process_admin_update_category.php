<?php
session_start();
require_once 'class/categoria.php';
$c = new Categoria();
if(isset($_POST['submit'])){
  $nombre = $_POST['name'];
  $image = $_FILES['image']['name'] == "" ? $_FILES['image'] : $_FILES['image']['name'];
  $id = $_POST['id'];

  if($_FILES['image']['error']>0){
    $_SESSION["msg"] = "Error al cargar el archivo";
  }else{
    $admitido = array('image/png', 'image/gif', 'image/jpg', 'image/jpeg');
    $limit_kb = 2000;

    if(in_array($_FILES['image']['type'], $admitido) && $_FILES['image']['size'] <= $limit_kb * 1024){
      $file_name = $_FILES['image']['name'];
      $file_parts = pathinfo($file_name);
      // $file_dirname = str_replace(['%C3%A9','%C3%AD'], ['é', 'í'], $file_parts['filename']);
      $file_extension = $file_parts['extension'];
      $file_new_name = "category_" . strtolower($_POST['name']);
      // ENCRIPTACIÓN DE NOMBRE DE LA IMAGEN
      $img = md5(base64_encode($file_new_name));
      $file_lowercase = $img . "." . $file_extension;
      $file_origin = $_FILES['image']['tmp_name'];
      $file_folder = "../admin/images/categoria/";

      $res = @move_uploaded_file($file_origin, $file_folder . $file_lowercase);
    }else{
      echo "Arhivo no permitido o excede el tamaño";
    }
    $res = $c->update_ruta_image_category($file_lowercase, $id);
    $res = $c->update_category($nombre, $file_lowercase, $id);
    header('location: ../admin/manage-category.php');
  }
}else{
  header('location: ../admin/manage-category.php');
}