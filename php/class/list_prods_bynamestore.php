<?php

require_once "../../php/class/connection.php";

class List_ByNameStore extends Connection
{
  function list_prods_bynamestore()
  {

    $store = $_POST['store'];

    try{
      $sql = "CALL sp_list_products_by_store(:namestore)";
      $stm = $this->con->prepare($sql);
      $stm->bindValue(":namestore", $store);
      $stm->execute();
      return $stm->fetchAll(PDO::FETCH_ASSOC);
    }catch(PDOException $e){
        return $e->getMessage();
    }
  }
}
$cualquiera = new List_ByNameStore();
echo $cualquiera->list_prods_bynamestore();