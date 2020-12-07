<?php
require_once "class/connection.php";
class List_temp_into_cart extends Connection
{
  function listar_temp_into_cart()
  {
    $client = $_POST['client'];

    try {
        $sql = "CALL sel_info_listcart(:client)";
        $stm = $this->con->prepare($sql);
        $stm->bindValue(':client', $client);
        $stm->execute();
        $var = $stm->fetchAll(PDO::FETCH_ASSOC);
        
        $buy = [];
        foreach ($var as $val) {
		        if (isset($val["store_id"])) {
		            $buy[$val["store_id"]][] = $val;
		        }
		    }
		    //print_r($buy);
        $res = json_encode($buy);
        echo $res;

    } catch (PDOException $e) {
        return $e->getMessage();
    }
  }
}
$cualquiera = new List_temp_into_cart();
echo $cualquiera->listar_temp_into_cart();