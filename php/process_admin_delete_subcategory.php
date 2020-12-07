<?php 
    session_start();
    
    if(isset($_GET['id'])){
        require_once("class/categoria.php");
        $id = $_GET['id'];
        
        $c = new Categoria();
        $res = $c->delete_subcategory($id);
        header("Location: ../admin/manage-subcategory.php");
    }