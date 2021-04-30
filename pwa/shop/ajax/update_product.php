<?php
require_once "../../php/class/connection.php";
class UpdateProduct extends Connection
{
  function update()
  {
    $file1 = empty($_FILES['imagen']['name']) ? $_POST["imagen"] : $_FILES['imagen']['name'];
    $new_file_name = strtolower($file1);
    $final_file = str_replace(' ', '-', $new_file_name);
    
    $arr = [
      "name" => $_POST["name"],
      "desc" => $_POST["desc"],
      "precio" => $_POST["precio"],
      "pais" => $_POST["pais"],
      "stock" => $_POST["stock"],
      "marca" => $_POST["marca"],
      "categoria" => $_POST["categoria"],
      "imagen" =>    $final_file,
      "id" => $_POST["prod"]
    ];

    try {
      if (!isset($_FILES['imagen']['tmp_name'])) {
        $res = "error";
      } else {
        $file_loc =  $_FILES['imagen']['tmp_name'];
        $folder = "../folder/";

        $res =  move_uploaded_file($file_loc, $folder . $final_file);
      }

      $sql = "CALL update_product(:name,:desc,:precio,:pais,:stock,:marca,:categoria,:imagen,:id)";
      $stm = $this->con->prepare($sql);
      foreach ($arr as $key => $val) {
          $stm->bindValue($key, $val);
      }
      $stm->execute();
      
      echo  $stm = "updated";

    } catch (PDOException $e) {
      return $e->getMessage();
    }
  }
}
$cualquiera = new UpdateProduct();
echo $cualquiera->update();