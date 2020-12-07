<?php
require_once "../../php/class/connection.php";

class UpdatePerfilclass extends Connection
{
    function updateperfil()
    {

        $arr_op = [
            
            "name_cli" => $_POST['name_cli'],
            "lastaname_cli" => $_POST['lastaname_cli'],
            "email" => $_POST['email'],
            "country_cli" => $_POST['country_cli'],
            "city_cli" => $_POST['city_cli'],
            "telephone_cli" => $_POST['telephone_cli'],
            "id" => $_POST['id_cli']
        ];

        try {
            $sql = "CALL update_profile_client(:name_cli,:lastaname_cli,:email,:country_cli,:city_cli,:telephone_cli,:id)";
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
$cualquiera = new UpdatePerfilclass();
echo $cualquiera->updateperfil();