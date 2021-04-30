<?php
require_once "../../php/class/connection.php";
class List_sales_monthly extends Connection
{
  function listar()
  {
    $year = $_POST['year'];

    try {
      $sql = "CALL sp_select_report_monthly_adm(:year)";
      $stm = $this->con->prepare($sql);
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
$cualquiera = new List_sales_monthly();
echo $cualquiera->listar();