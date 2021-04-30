<?php
require_once "../../php/class/connection.php";
class List_reports_monthly extends Connection
{
  function listar()
  {
    $idcliente = $_POST['idcliente'];
    $year = $_POST['year'];
    

    try {
      $sql = "CALL sp_sel_reportcli_in_admin(:idcliente, :year)";
      $stm = $this->con->prepare($sql);
      $stm->bindValue(":idcliente", $idcliente);
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
$cualquiera = new List_reports_monthly();
echo $cualquiera->listar();