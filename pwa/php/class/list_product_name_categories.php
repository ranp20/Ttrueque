<?php

require_once "../../php/class/connection.php";

class Sel_aLL_products_cat extends Connection
{
    function listar_prods_categories()
    {
        $categoria = $_POST['categoria'];

        try {
            $sql = "CALL sp_prods_by_name_cat(:categoria)";
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
$cualquiera = new Sel_aLL_products_cat();
echo $cualquiera->listar_prods_categories();
