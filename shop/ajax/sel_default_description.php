<?php
require_once "../../php/class/connection.php";
class Default_description extends Connection
{
  function def_description()
  {
    try {
      $sql = "SELECT * FROM descripcion_default";
      $stm = $this->con->query($sql);
      $stm->execute();
      $var = $stm->fetchAll(PDO::FETCH_ASSOC);
      
      $res = json_encode($var);
      echo $res;
    } catch (PDOException $e) {
      return $e->getMessage();
    }
  }
}
$cualquiera = new Default_description();
echo $cualquiera->def_description();