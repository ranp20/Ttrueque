<?php
require_once "class/connection.php";

class Validate_Cart extends Connection
{
  function update()
  {

    $arr_validate = [
      "idprod" => $_POST['idprod'],
      "points" => $_POST['points'],
      "cant_p" => $_POST['cant_p'],
      "stock_p" => $_POST['stock_p'],
      "idstore" => $_POST['idstore'],
      "idclient" => $_POST['idclient'],
      "button" => $_POST['button'],
    ];

    //print_r($arr_validate);

    try {
      $sql = "CALL sp_validate_cart_list(:idprod, :points, :cant_p, :stock_p, :idstore, :idclient, :button)";
      $stm = $this->con->prepare($sql);
      foreach ($arr_validate as $key => $value) {
          $stm->bindValue($key, $value);
      }

      $stm->execute();
      $var = $stm->fetchAll(PDO::FETCH_ASSOC);
      $res = json_encode($var);
      echo $res;


    } catch (PDOException $e) {
      return $e->getMessage();
    }
  }
}
$cualquiera = new Validate_Cart();
echo $cualquiera->update();