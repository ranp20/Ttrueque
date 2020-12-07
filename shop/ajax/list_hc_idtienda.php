<?php
require_once "../../php/class/connection.php";
class List_History_Shippings extends Connection
{
  function listar_historial_compras()
  {
    $client = $_POST['cliente'];

    try {
      $sql = "CALL select_history_shipping_idclient(:client)";
      $stm = $this->con->prepare($sql);
      $stm->bindValue(":client", $client);
      $stm->execute();

      $var = $stm->fetchAll(PDO::FETCH_ASSOC);
      $res = json_encode($var);
      echo $res;
      
    } catch (PDOException $e) {
      return $e->getMessage();
    }
  }
}
$cualquiera = new List_History_Shippings();
echo $cualquiera->listar_historial_compras();