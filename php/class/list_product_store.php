<?php

require_once "../../php/class/connection.php";

class Select_Productos_Tienda extends Connection
{
    function listar_productos_tienda()
    {
        $arr = [
            "tienda" => $_POST['tienda'],
            "categoria" => $_POST['categoria']
        ];

        try {
            $sql = "CALL sp_str_cat_name(:tienda,:categoria)";
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
$cualquiera = new Select_Productos_Tienda();
echo $cualquiera->listar_productos_tienda();
