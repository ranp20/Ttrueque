<?php

require_once "../php/class/connection.php";

class UpdateOrder extends Connection
{
  function update()
  {
    $arr_s = [
      "tienda" => $_POST['tienda'],
      "cliente" => $_POST['cliente'],
      "text" => $_POST['text'],
      "com_sol" => $_POST['com_sol'],
      "orden" => $_POST['orden']
    ];

    //print_r($arr_s);

    try {

      $sql = "CALL sp_update_estado_cart(:tienda,:cliente,:text,:com_sol,:orden)";
      $stm = $this->con->prepare($sql);
      foreach ($arr_s as $key => $value) {
        $stm->bindValue($key, $value);
      }
      $stm->execute();
      echo  $stm = "updated";
    } catch (PDOException $e) {
      return $e->getMessage();
    }
  }
}
$cualquiera = new UpdateOrder();
echo $cualquiera->update();
