<?php
require_once '../../php/class/connection.php';
class Listar extends Connection
{
  function listar_info_idwallet()
  {
    $id_wallet  = $_POST["id_wallet"];
 
    try {
      $sql = "CALL select_info_by_wallet(:id_wallet)";
      $stm = $this->con->prepare($sql);
      $stm->bindValue(":id_wallet", $id_wallet);

      $stm->execute();
      $var =   $stm->fetchAll(PDO::FETCH_ASSOC);
      // $res = json_encode($var);
      $res = json_encode($var);
      echo $res;

    } catch (PDOException $e) {
      return $e->getMessage();
    }
  }
}

$cualquiera = new Listar();
echo $cualquiera->listar_info_idwallet();