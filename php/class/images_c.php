<?php 
    require_once 'connection.php';
    class Images extends Connection{
        private $table = "rutas_imagen_categoria";

        function __construct(){
            parent::__construct();
        }

        function get_images($id){
            try{
                $sql = "SELECT ruta_imagen FROM {$this->table} WHERE id_categoria = :id";
                $stm = $this->con->prepare($sql);
                $stm->bindValue(":id",$id);
                $stm->execute();
                
                return $stm->fetchAll();
            }catch(PDOException $e){
                die($e->getMessage());
            }
        }
    }



