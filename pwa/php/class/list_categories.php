<?php

require_once "../../php/class/connection.php";

class List_Categories extends Connection
{
    function listar_categories()
    {
        try {
            $sql = "SELECT * FROM categoria";
            $stm = $this->con->query($sql);
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
$cualquiera = new List_Categories();
echo $cualquiera->listar_categories();
