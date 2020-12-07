
<?php
require_once "class/connection.php";
class List_Solicitudes extends Connection
{
    function listar_solicitudes()
    {
        $product = $_POST['product'];

        try {
            $sql = "CALL sp_search_product(:product)";
            $stm = $this->con->prepare($sql);
            $stm->bindValue(":product", $product);
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
$cualquiera = new List_Solicitudes();
echo $cualquiera->listar_solicitudes();
