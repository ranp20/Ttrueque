<?php
require_once "../../php/class/connection.php";
class List_Information extends Connection
{
  function listar_campos()
  {
    $tienda = $_POST['tienda'];

    try {
      $sql = "CALL select_info_by_tienda(:tienda)";
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
$cualquiera = new List_Information();
echo $cualquiera->listar_campos();