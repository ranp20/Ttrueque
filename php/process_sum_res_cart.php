<?php
require_once "class/connection.php";

class Sum_Rest_cart extends Connection
{
    function sumar_restar_puntos()
    {

        $arr_op = [
            "cliente" => $_POST['cliente'],
            "tienda" => $_POST['tienda'],
            "subtotal" => $_POST['subtotal']
        ];

    

        try {
            $sql = "CALL sp_op_sum_rest_cart(:cliente, :tienda, :subtotal)";
            $stm = $this->con->prepare($sql);
            foreach ($arr_op as $key => $value) {
                $stm->bindValue($key, $value);
            }
            $var = $stm->execute();
            $res = json_encode($var);
            echo $res;

        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
}
$cualquiera = new Sum_Rest_cart();
echo $cualquiera->sumar_restar_puntos();