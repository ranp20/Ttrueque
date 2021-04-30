<?php
require_once "../../php/class/connection.php";
class List_years extends Connection
{
  function list_years_idtienda()
  {
    $tienda = $_POST["tienda"];

    try {
      $sql = "CALL sp_select_group_year(:idtienda)";
      $stm = $this->con->prepare($sql);
      $stm->bindValue(":idtienda", $tienda);
      $stm->execute();

      $var = $stm->fetchAll(PDO::FETCH_ASSOC);
      $res = json_encode($var);
      echo $res;
        
    } catch (PDOException $e) {
      return $e->getMessage();
    }
  }
}
$cualquiera = new List_years();
echo $cualquiera->list_years_idtienda();