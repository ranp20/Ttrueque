<?php 
session_start();
if(isset($_POST['name']) && isset($_POST['submit'])){
  require_once("class/categoria.php");
  $c = new Categoria();

  $_FILES['image'] = str_replace(" ", "-", $_FILES['image']);
  $nombre = $_POST['name'];
  $imagen = $_FILES['image'];
  
  if($_FILES['image']['error']>0){
    $_SESSION["msg"] = "Error al cargar el archivo";
  }else{
    $admitido = array('image/png','image/gif','image/jpg','image/jpeg');
    $limit_kb = 2000;
    
    if(in_array($_FILES['image']['type'],$admitido) && $_FILES['image']['size'] <= $limit_kb * 1024){
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

      if(!file_exists($file_lowercase)){
        $res = @move_uploaded_file($file_origin, $file_folder . $file_lowercase);

        if($res){
          $r = $c->add_image($img);
          $_SESSION["msg"] = "Se guardó con éxito";
          header("Location: ../admin/manage-category.php");
        }else{
          $_SESSION["msg"] = "Error al guardar el archivo";    
        }
      }else{
        $_SESSION["msg"] = "El archivo ya existe";
      }
    }else{
      $_SESSION["msg"] = "Archivo no permitido o excede el tamaño";
    }
  }
  $response = $c->add_category($nombre,$imagen['name']); 
}
else{
  $_SESSION['msg'] = 'Error al agregar uno a más registros';
  header("Location: ../admin/add-category.php");
}