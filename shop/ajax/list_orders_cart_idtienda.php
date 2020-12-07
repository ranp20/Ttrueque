<?php
require_once "../../php/class/connection.php";
class List_Orders_cart extends Connection
{
  function listar_ordenes_carrito()
  {
    $orderid = $_POST['cartstore'];
    $store = $_POST['store'];

    try {
      $sql = "CALL sp_ord_cart_idcart_store(:orderid,:store)";
      $stm = $this->con->prepare($sql);
      $stm->bindValue(":orderid", $orderid);
      $stm->bindValue(":store", $store);
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