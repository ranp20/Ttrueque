<?php

session_start();

if(isset($_POST["submit"])){
  
  $desde = $_POST["desde"];
  $hasta = $_POST["hasta"];
  $id = $_POST["id"];


  $arr_mantenience = [
    "desde" => $desde,
    "hasta" => $hasta,
    "id" => $id
  ];

  require_once "class/all.php";
  $mantenience = new All();
  $response = $mantenience->update_mantenience($arr_mantenience);


  if($response == "actualizado"){
      $_SESSION["msg"] = "Se acaba de actualizar la fecha de mantenimiento";
      header("Location: ../admin/maintenance.php");
  }else{
      $_SESSION["msg"] = "Fallo la insercion de actualización";
      header("Location: ../admin/maintenance.php");
  }  

}else{
    $_SESSION["msg"] = "Acceso Denegado";
    header("Location: ../admin/maintenance.php");
}