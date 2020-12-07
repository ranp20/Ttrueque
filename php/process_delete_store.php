<?php
require_once "class/connection.php";

class Delete_store_into_cart extends Connection
{
    function eliminar_store_into_cart()
    {

        $store_id = $_POST['tienda'];

        try {
            $sql = "CALL sp_delete_str_cart(:store_id)";
            $stm = $this->con->prepare($sql);
            $stm->bindValue(':store_id', $store_id);
            $stm->execute();
      
            $res = json_encode([]);
            echo $res;

        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
}
$cualquiera = new Delete_store_into_cart();
echo $cualquiera->eliminar_store_into_cart();