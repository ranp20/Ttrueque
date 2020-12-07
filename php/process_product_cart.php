<?php

require_once "../php/class/connection.php";

class UpdateOrder extends Connection
{
    function update()
    {


        $arr_s = [
            "tienda" => $_POST['tienda'],
            "cliente" => $_POST['cliente']
        ];

        try {

            $sql = "CALL sp_update_estado_cart(:tienda,:cliente)";
            $stm = $this->con->prepare($sql);
            foreach ($arr_s as $key => $value) {
                $stm->bindValue($key, $value);
            }
            $stm->execute();
            echo  $stm = "updated";
            // echo $stm;
            // $var = $stm->fetchAll(PDO::FETCH_ASSOC);

            // $res = json_encode($var[0]);
            // echo $res;


        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
}
$cualquiera = new UpdateOrder();
echo $cualquiera->update();
