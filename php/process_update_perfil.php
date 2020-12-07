<?php
require_once "class/connection.php";

class UpdatePerfilclass extends Connection
{
    function updateperfil()
    {

        $arr_op = [
            
            "name" => $_POST['name'],
            "email" => $_POST['email'],
            "telefono" => $_POST['telefono'],
            "direccion" => $_POST['direccion'],
            "id" => $_POST['id']
        ];

        try {
            $sql = "CALL update_profile_admin(:name,:email,:telefono,:direccion,:id)";
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