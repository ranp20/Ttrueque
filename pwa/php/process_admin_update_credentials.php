<?php

session_start();

if(isset($_POST["submit"])){
  
  $key_public = $_POST["key_public"];
  $key_secret = $_POST["key_secret"];
  $id = $_POST["id"];


  $arr_credentials = [
    "key_public" => $key_public,
    "key_secret" => $key_secret,
    "id" => $id
  ];

  require_once "class/credentials.php";
  $cred = new Credentials();
  $response = $cred->update_credentials($arr_credentials);


  if($response == "actualizado"){
      $_SESSION["msg"] = "Se acaba de actualizar las credenciales";
      header("Location: ../admin/manage-credentials.php");
  }else{
      $_SESSION["msg"] = "Fallo la insercion de datos";
      header("Location: ../admin/manage-credentials.php");
  }  

}else{
    $_SESSION["msg"] = "Acceso Denegado";
    header("Location: ../admin/manage-credentials.php");
}