<?php

require_once "../../php/class/connection.php";

class Select_nombre_tienda extends Connection
{
    function listar_categorias()
    {
        $arr = [
            "tienda" => $_POST['tienda']
        ];

        try {
            $sql = "CALL select_categoria_nom_tienda(:tienda)";
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
$cualquiera = new Select_nombre_tienda();
echo $cualquiera->listar_categorias();
