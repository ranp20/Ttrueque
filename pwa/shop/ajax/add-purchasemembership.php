<?php
require_once '../php/class/connection.php';
class Insert_Purchasemembership extends Connection
{
  function insertar($arr_info)
  {
    try {
      $sql = "CALL add_purchasemembership(:id_memb,:id_tienda,:pass_trans,:paypal_data,:status,:payment_method)";
      $stm = $this->con->prepare($sql);
      foreach ($arr_info as $key => $val) {
        $stm->bindValue($key, $val);
      }
      $stm->execute();
      echo $stm = "inserto";

    } catch (PDOException $e) {
      return $e->getMessage();
    }
  }
}
