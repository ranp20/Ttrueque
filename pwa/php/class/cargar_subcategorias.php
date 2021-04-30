<?php 
require_once 'connection.php';

class Cargar_subcategorias extends Connection{
    
    function get_lista_subcategoria(){
        try{
            $sql = "SELECT * FROM subcategoria WHERE id_categoria = {$_POST['subcategoria']}" ;
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

$cualquiera = new Cargar_subcategorias();
echo $cualquiera->get_lista_subcategoria();