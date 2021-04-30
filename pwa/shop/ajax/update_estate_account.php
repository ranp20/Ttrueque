<?php
require_once "../../php/class/connection.php";
class Update_State_Account extends Connection
{
  function update()
  {
    $tienda = $_POST['tienda'];

    try {  
      $sql = "CALL sp_update_state_account(:idtienda)";
      $stm = $this->con->prepare($sql);
      $stm->bindValue(":idtienda", $tienda);
      $stm->execute();
      
      $var = $stm->fetchAll(PDO::FETCH_ASSOC);
      $res = json_encode($var);

      echo $res;

    } catch (PDOException $e) {
        return $e->getMessage();
    }
  }
}
$cualquiera = new Update_State_Account();
echo $cualquiera->update();