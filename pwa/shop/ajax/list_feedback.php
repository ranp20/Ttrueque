<?php
require_once "../../php/class/connection.php";
class Listar extends Connection
{
  function listar_feedback()
  {
    $id_tienda = $_POST["id_tienda"];

    try {
      $sql = "CALL list_feedback(:id)";
      $stm = $this->con->prepare($sql);
      $stm->bindValue(":id", $id_tienda);
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
echo $cualquiera->listar_feedback();