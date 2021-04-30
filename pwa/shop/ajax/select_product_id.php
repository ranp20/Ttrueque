<?php
require_once "../../php/class/connection.php";
class Listar extends Connection
{
  function listar_product_id()
  {
    $id_producto = $_POST["prod"];

    try {
      $sql = "CALL select_product_id(:id)";
      $stm = $this->con->prepare($sql);
      $stm->bindValue(":id", $id_producto);
      $stm->execute();

      $var = $stm->fetchAll(PDO::FETCH_ASSOC);
      $res = json_encode($var);
      echo $res;

    } catch (PDOException $e) {
      return $e->getMessage();
    }
  }
}
$cualquiera = new Listar();
echo $cualquiera->listar_product_id();