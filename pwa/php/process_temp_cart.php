<?php
require_once 'class/connection.php';
class Agregar_Temp_Cart extends Connection
{

  function get_add_temp_cart()
  {

    $arr_data = [
      'idprod' => $_POST['id_p'],
      'points' => $_POST['puntos_p'],
      'cant_p' => $_POST['cant_p'],
      'idstore' =>  $_POST['id_store'],
      'idclient' => $_POST['id_client']
    ];

    try {

      $sql = "CALL sp_temp_cart(:idprod,:points,:cant_p,:idstore,:idclient)";
      $stm = $this->con->prepare($sql);
      foreach ($arr_data as $key => $value) {
        $stm->bindValue($key, $value);
      }
      $stm->execute();
      $res = $stm->fetchAll(PDO::FETCH_ASSOC);
      echo  json_encode($res[0]);
    } catch (PDOException $e) {
      return $e->getMessage();
    }
  }
}

$cualquiera = new Agregar_Temp_Cart();
echo $cualquiera->get_add_temp_cart();