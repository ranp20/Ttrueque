<?php
require_once 'connection.php';

class AgregarCheckout extends Connection
{

    function get_add_checkout()
    {

        $arr_data = [
            "id_cliente" => $_POST["cliente"],
            "nombre" => $_POST["nombre"],
            "apellido" => $_POST["apellido"],
            "direccion" => $_POST["direccion"],
            "country" => $_POST["country"],
            "celular" => $_POST["celular"],
            "total" => $_POST["total"],
            "idstore" => $_POST["store"],
            "desde" => 'WEB'
        ];

        // print_r($arr_data);
        try {
            $sql = "CALL sp_cart_store_add(:id_cliente,:nombre,:apellido,:direccion,:country,:celular,:total,:idstore,:desde)";
            $stm = $this->con->prepare($sql);

            foreach ($arr_data as $key => $value) {
                $stm->bindValue($key, $value);
            }
            $res =   $stm->execute();
            if ($res == 1) {
                $var = $stm->fetchAll(PDO::FETCH_ASSOC);
                echo    $var[0]["orderid"];
            } else {
                echo "mal";
            }
            //print_r($res);
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
}

$cualquiera = new AgregarCheckout();
echo $cualquiera->get_add_checkout();