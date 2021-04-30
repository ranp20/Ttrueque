<?php
require_once "../../php/class/connection.php";
class List_year_group_adm extends Connection
{
  function listar()
  {
    $idcliente = $_POST['idcliente'];

    try {
      $sql = "CALL sp_sel_years_by_idcli(:idcliente)";
      $stm = $this->con->prepare($sql);
      $stm->bindValue(":idcliente", $idcliente);
      $stm->execute();

      $var = $stm->fetchAll(PDO::FETCH_ASSOC);
      $res = json_encode($var);
      echo $res;
      
    } catch (PDOException $e) {
      return $e->getMessage();
    }
  }
}
$cualquiera = new List_year_group_adm();
echo $cualquiera->listar();