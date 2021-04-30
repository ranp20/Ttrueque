<?php
require_once "../../php/class/connection.php";
class Listar_CartStore_report extends Connection
{
  function listar_cartstore_idtienda_report()
  {
    $store = $_GET['store'];
    $month = $_GET['month'];
    $year = $_GET['year'];

    try {
      $sql = "CALL sp_list_sales_report(:store, :month, :year)";
      $stm = $this->con->prepare($sql);
      $stm->bindValue(":store", $store);
      $stm->bindValue(":month", $month);
      $stm->bindValue(":year", $year);
      $stm->execute();

      return $stm->fetchAll(PDO::FETCH_ASSOC);

    } catch (PDOException $e) {
      return $e->getMessage();
    }
  }
}
$cualquiera = new Listar_CartStore_report();
$result = $cualquiera->listar_cartstore_idtienda_report();