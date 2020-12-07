<?php
require_once "class/connection.php";
class List_Pedidos_by_store extends Connection
{
    function listar_pediddos_by_store()
    {
        $idcliente = $_POST["idcliente"];

        try {
            $sql = "CALL sp_list_track_order(:idcliente)";
            $stm = $this->con->prepare($sql);
            $stm->bindValue(":idcliente", $idcliente);
            $stm->execute();

            $var = $stm->fetchAll(PDO::FETCH_ASSOC);

            $res = json_encode($var);
            echo $res;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
}
$cualquiera = new List_Pedidos_by_store();
echo $cualquiera->listar_pediddos_by_store();