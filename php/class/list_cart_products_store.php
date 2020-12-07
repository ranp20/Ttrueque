<?php

require_once "../../php/class/connection.php";

class List_Productos_Tienda extends Connection
{
    function listar_carrito_por_tienda()
    {
        $arr = [
            "tienda" => $_POST['tienda']
        ];

        try {
            $sql = "CALL select_products_idtienda_cart(:tienda)";
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
$cualquiera = new List_Productos_Tienda();
echo $cualquiera->listar_carrito_por_tienda();
