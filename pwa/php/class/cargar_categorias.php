<?php 

require_once 'connection.php';

class Cargar_categorias extends Connection{
    function get_lista_categoria(){
        try{
            $sql = "SELECT * FROM categoria";
            $stm = $this->con->prepare($sql);
            $stm->execute();
            $var = $stm->fetchAll(PDO::FETCH_ASSOC);
            $res = json_encode($var);

            echo $res;


        }catch(PDOException $e){
            return $e->getMessage();
        }

    }

}

$cualquiera = new Cargar_categorias();
echo $cualquiera->get_lista_categoria();
