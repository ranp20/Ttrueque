<?php
require_once "../../php/class/connection.php";
class List_Orders extends Connection
{
  function listar_ordenes()
  {
    $tienda = $_POST['tienda'];

    try {
      $sql = "CALL select_orders_idtienda(:tienda)";
      $stm = $this->con->prepare($sql);
      $stm->bindValue(":tienda", $tienda);
      $stm->execute();

      $var = $stm->fetchAll(PDO::FETCH_ASSOC);
      $res = json_encode($var);
      echo $res;

    } catch (PDOException $e) {
      return $e->getMessage();
    }
  }
}
$cualquiera = new List_Orders();
echo $cualquiera->listar_ordenes();