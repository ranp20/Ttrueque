<?php
    if(isset($_GET["type"]) && isset($_GET["id"])){
        $t = $_GET["type"];
        $id = $_GET["id"];

        require_once("class/product.php");
        $p = new Product();
        $res = $p->update_state($id,$t);

        if($res){
            header("Location: ../admin/manage-items.php");
        }else{
            echo "Error...";
        }
    }else{
        header("Location: ../admin/manage-items.php");
    }