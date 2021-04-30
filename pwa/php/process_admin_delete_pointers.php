<?php 

session_start();

if(isset($_GET['id'])){
    require_once("class/puntuacion.php");
    $p = new Puntuacion();
    $id = $_GET['id'];
    
    $res = $p->delete_pointers($id);

}

header("Location: ../admin/manage-pointer.php");


