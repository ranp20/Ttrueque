<?php
require_once "../../php/class/connection.php";
class List_History_Wallet extends Connection
{
  function listar_historial_billetera()
  {
    $cliente = $_POST['cliente'];

    try {
      $sql = "CALL select_history_wallet_idclient(:cliente)";
      $stm = $this->con->prepare($sql);
      $stm->bindValue(":cliente", $cliente);
      $stm->execute();

      $var = $stm->fetchAll(PDO::FETCH_ASSOC);
      $res = json_encode($var);
      echo $res;

    } catch (PDOException $e) {
      return $e->getMessage();
    }
  }
}
$cualquiera = new List_History_Wallet();
echo $cualquiera->listar_historial_billetera();