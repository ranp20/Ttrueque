<?php
require_once "class/connection.php";

class Id_store_by_idclient extends Connection
{
    function list_idstore_by_idclient()
    {

        $id_cliente = $_POST['cliente'];

        try {
            $sql = "SELECT id FROM tienda WHERE cliente = :cliente";
            $stm = $this->con->prepare($sql);
            $stm->bindValue(':cliente', $id_cliente);
            $stm->execute();
            $var = $stm->fetchAll(PDO::FETCH_ASSOC);
            $res = json_encode($var);
            echo $res;

        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
}
$cualquiera = new Id_store_by_idclient();
echo $cualquiera->list_idstore_by_idclient();