<?php
require_once "../../php/class/connection.php";
class UpdateOrder extends Connection
{
  function update()
  {
    $arr_s = [
      "estado" => $_POST['estado'],
      "id" => $_POST['id'],
    ];

    try {
      $sql = "CALL sp_update_state_order(:estado, :id)";
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