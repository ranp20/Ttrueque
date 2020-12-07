<?php

require_once "../../php/class/connection.php";

class Sel_detail_products extends Connection
{
    function detalle_productos()
    {
        $arr = [
            "idprod" => $_POST['idprod']
        ];

        try {
            $sql = "CALL select_products_detail(:idprod)";
            $stm = $this->con->prepare($sql);
            foreach ($arr as $key => $value) {
                $stm->bindValue($key, $value);
            }
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
$cualquiera = new Sel_detail_products();
echo $cualquiera->detalle_productos();
