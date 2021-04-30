<?php

require_once "../../php/class/connection.php";

class List_temp_cart extends Connection
{
    function listar_temp_cart()
    {

        $client = $_POST['client'];

        try {
            $sql = "CALL sel_info_listcart(:client)";
            $stm = $this->con->prepare($sql);
            $stm->bindValue(':client', $client);
            $stm->execute();
            $var = $stm->fetchAll(PDO::FETCH_ASSOC);
            // $res = json_encode($var);
            $res = json_encode($var);
            echo $res;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
}
$cualquiera = new List_temp_cart();
echo $cualquiera->listar_temp_cart();
