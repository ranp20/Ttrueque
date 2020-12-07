<?php

require_once "../../php/class/connection.php";

class Select_Productos extends Connection
{
    function listar_productos()
    {
        $categoria = $_POST['categoria'];

        try {
            $sql = "CALL select_products_nom_category(:categoria)";
            $stm = $this->con->prepare($sql);
            $stm->bindValue(':categoria', $categoria);
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
$cualquiera = new Select_Productos();
echo $cualquiera->listar_productos();
