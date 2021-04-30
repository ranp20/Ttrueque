<?php

require_once "../../php/class/connection.php";

class Categoria_tienda extends Connection
{
    function listar_categoria_tiendas()
    {
        $arr = [
            "tipo" => $_POST['tipo']
        ];

        try {
            $sql = "CALL sp_prods_by_name_cat(:tipo)";
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
$cualquiera = new Categoria_tienda();
echo $cualquiera->listar_categoria_tiendas();
