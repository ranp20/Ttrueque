<?php
    session_start();
    if(isset($_POST["submit"])){
        $img = $_FILES["imagen"];
        $name_img = $img['name'];
        $type = explode("/",$img["type"]);
        $tem = $img["tmp_name"];

        require_once("class/banner.php");
        $b = new Banner();

        $arr = [
            "banner_p" => $_FILES["imagen"]['name'],
            "id" => $_POST["id"]
        ];

        $path = "../admin/images/banner_principal/" . $name_img;
        if(move_uploaded_file($tem,$path)){
            $response = $b->update_banner_p($arr);
            header("Location: ../admin/principal-banner.php");
        }else{
            $_SESSION["msg"] = "Error al actualizar el banner";
            header("Location: ../admin/principal-banner.php");    
        }
       
    }else{
        $_SESSION["msg"] = "Acceso Denegado";
        header("Location: ../admin/principal-banner.php");
    }