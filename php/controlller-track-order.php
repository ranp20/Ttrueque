<?php
require_once "class/connection.php";
class List_Pedidos extends Connection
{
  function listar_pediddos_clientes()
  {
      
    $arr_data = [
      "idtienda" => $_POST['tiendas'],
      "idcliente" => $_POST["idcliente"]
    ];

    try {
      $sql = "CALL sp_cart_list_orders(:idtienda, :idcliente)";
      $stm = $this->con->prepare($sql);
      foreach ($arr_data as $key => $value) {
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
$cualquiera = new List_Pedidos();
echo $cualquiera->listar_pediddos_clientes();
