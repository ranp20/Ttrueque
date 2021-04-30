<?php
require_once '../../php/class/connection.php';
class Listar_Memb_by_idstore extends Connection
{
  function Listar_memb_by_idtienda()
  {
    $tienda = $_POST['tienda'];

    try {
      $sql = "CALL sp_memb_by_idtienda(:idtienda)";
      $stm = $this->con->prepare($sql);
      $stm->bindValue(':idtienda', $tienda);
      $stm->execute();

      $var =   $stm->fetchAll(PDO::FETCH_ASSOC);
      $res = json_encode($var);
      echo $res;
        
    } catch (PDOException $e) {
      return $e->getMessage();
    }
  }
}

$cualquiera = new Listar_Memb_by_idstore();
echo $cualquiera->Listar_memb_by_idtienda();