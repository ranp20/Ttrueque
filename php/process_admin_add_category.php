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
              $path = '../admin/images/categoria/';
              
              $img_nombre = $_FILES['image']['name'];
              $imagen_replace = str_replace(['%C3%A9','%C3%AD'], ['é', 'í'], $img_nombre);
              
              $img = $path.$imagen_replace;
    
              if(!file_exists($img)){

                  $res = @move_uploaded_file($_FILES['image']['tmp_name'], $img);

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
    header("Location: ../admin/manage-category.php");
  