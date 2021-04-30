<?php
require_once "../../php/class/connection.php";
class List_cart_idclient extends Connection
{
  function listar_cart_por_cliente()
  {
    $idcli = $_GET['cli'];
    $month = $_GET['month'];
    $year = $_GET['year'];

    try {
      $sql = "CALL sp_cart_list_client_report(:idcli, :month, :year)";
      $stm = $this->con->prepare($sql);
      $stm->bindValue(':idcli', $idcli);
      $stm->bindValue(':month', $month);
      $stm->bindValue(':year', $year);
      $stm->execute();
      return $stm->fetchAll(PDO::FETCH_ASSOC);
        
    } catch (PDOException $e) {
      return $e->getMessage();
    }
  }
}
$cualquiera = new List_cart_idclient();
$data_report = $cualquiera->listar_cart_por_cliente();