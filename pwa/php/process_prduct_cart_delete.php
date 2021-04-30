<?php
require_once "class/connection.php";

class Delete_product_into_cart extends Connection
{
    function eliminar_product_into_cart()
    {

        $id_p = $_POST['producto'];

        try {
            $sql = "CALL sp_delete_product_cart(:id_p)";
            $stm = $this->con->prepare($sql);
            $stm->bindValue(':id_p', $id_p);
            $stm->execute();
				    //print_r($buy);
            $res = json_encode([]);
            echo $res;

        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
}
$cualquiera = new Delete_product_into_cart();
echo $cualquiera->eliminar_product_into_cart();
// session_start();

// $buy = [];

// $id = $_POST["producto"];
// // $store = $_POST["tienda"];

// $_SESSION["buy_cart"][$id] = [];

// $c = 0;
// for ($i = 0; $i < count($_SESSION["buy_cart"]); $i++) {
//     if ($_SESSION["buy_cart"][$i] != []) break;
//     else $c += 1;
// }

// if ($c == count($_SESSION["buy_cart"])) {
//     unset($_SESSION["buy_cart"]);
//     unset($_SESSION["position_cart_index"]);
// }

// echo json_encode($buy);