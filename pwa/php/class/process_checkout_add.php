<?php
require_once 'connection.php';

class AgregarCheckout extends Connection
{

    function get_add_checkout()
    {


        // $arr_data = [
        $pro = $_POST["prod"];
        $cli = $_POST["cliente"];
        $pre = $_POST["precio_real"];
        $cant = $_POST["cantidad"];
        $sub = $_POST["subtotal"];
        $id = $_POST["id"];
        $sto =  $_POST["store"];

        // ];
        // print_r($arr_data);
        try {

            $sql = "CALL shop_product_cart(:idproducto,:idcliente,:precio_real,:cantidad,:subtotal,:cart_store,:store)";
            $stm = $this->con->prepare($sql);
            // foreach ($arr_data as $key => $value) {
            //     $stm->bindValue($key, $value);
            // }
            $stm->bindValue(":idproducto", $pro);
            $stm->bindValue(":idcliente", $cli);
            $stm->bindValue(":precio_real", $pre);
            $stm->bindValue(":cantidad", $cant);
            $stm->bindValue(":subtotal", $sub);
            $stm->bindValue(":cart_store", $id);
            $stm->bindValue(":store", $sto);
            $stm->execute();
            $res = $stm->fetchAll(PDO::FETCH_ASSOC);
            echo  json_encode($res);
          
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
}

$cualquiera = new AgregarCheckout();
echo $cualquiera->get_add_checkout();