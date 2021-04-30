<?php
require_once "../../php/class/connection.php";
class UpdateStore extends Connection
{
  function update()
  {

    $file1 = empty($_FILES['logo']['name']) ? $_POST["logo"] : $_FILES['logo']['name'];
    $new_file_name = strtolower($file1);
    $final_file = str_replace(' ', '-', $new_file_name);
    
    $arr_s = [
      "tienda" => $_POST['tienda'],
      "logo" => $final_file
    ];

    try {

      if (!isset($_FILES['logo']['tmp_name'])) {
        $res = "error";
      } else {
        $file_loc =  $_FILES['logo']['tmp_name'];
        $store = "../images/store/";

        $res =  move_uploaded_file($file_loc, $store . $final_file);
      }

      $sql = "CALL update_store_logo(:tienda, :logo)";
      $stm = $this->con->prepare($sql);
      foreach ($arr_s as $key => $value) {
        $stm->bindValue($key, $value);
      }
      $stm->execute();
      
      $var = $stm->fetchAll(PDO::FETCH_ASSOC);
      $res = json_encode($var[0]);
      echo $res;
      
    } catch (PDOException $e) {
      return $e->getMessage();
    }
  }
}
$cualquiera = new UpdateStore();
echo $cualquiera->update();