<?php  
    // require_once('connection.php');
    // class Search extends Connection{
    //     function __construct(){
    //         parent::__construct();
    //     }
    // }

    // if(!isset($_POST['caja_busqueda'])) exit ("No se recibio el valor a buscar");

    // function busqueda_category(){
    //     try{
    //     $sql = "SELECT nombre_categoria FROM categoria WHERE nombre_categoria LIKE '%$nombre%'";
    //     $stm = $this->con->prepare($sql);
    //     $res = $sql->execute();
    //     while ($row = $res->fetch_array(PDO::MYSQLI_ASSOC)){
    //         echo "<h1>Hola mundo{$row['nombre_categoria']}</h1>";
    //     }
    //     }catch(PDOException $e){
    //         return $e->getMessage();
    //     }
    // }

    // busqueda_category();