<?php
require_once "../../php/class/connection.php";
class Listar extends Connection
{
  function listar_product()
  {
    $tienda = $_POST["tienda"];

    try {
      $sql = "CALL select_products_idtienda(:id)";
      $stm = $this->con->prepare($sql);
      $stm->bindValue(":id", $tienda);
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
echo $cualquiera->listar_product();