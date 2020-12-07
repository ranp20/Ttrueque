<?php
require_once '../../php/class/connection.php';
class Listar extends Connection
{
  function listar_info_idmemb()
  {
    $id_memb  = $_POST["id_memb"];
 
    try {
      $sql = "CALL select_info_by_memb(:id_memb)";
      $stm = $this->con->prepare($sql);
      $stm->bindValue(":id_memb", $id_memb);

      $stm->execute();
      $var =   $stm->fetchAll(PDO::FETCH_ASSOC);
      $res = json_encode($var);
      echo $res;

    } catch (PDOException $e) {
      return $e->getMessage();
    }
  }
}

$cualquiera = new Listar();
echo $cualquiera->listar_info_idmemb();