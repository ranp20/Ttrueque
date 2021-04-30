<?php
require_once "../../php/class/connection.php";
class List_Orders_cart extends Connection
{
  function listar_ordenes_carrito()
  {
    $store = $_POST['tienda'];
    $year = $_POST['year'];

    try {
      $sql = "CALL sp_select_report_monthly(:store,:year)";
      $stm = $this->con->prepare($sql);
     
      $stm->bindValue(":store", $store);
      $stm->bindValue(":year", $year);
      $stm->execute();

      $var = $stm->fetchAll(PDO::FETCH_ASSOC);
      $res = json_encode($var);
      echo $res;
      
    } catch (PDOException $e) {
      return $e->getMessage();
    }
  }
}
$cualquiera = new List_Orders_cart();
echo $cualquiera->listar_ordenes_carrito();