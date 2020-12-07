<?php
    session_start();
    if(isset($_POST["submit"])){
        $img = $_FILES["imagen"];
        $name = $img["name"];
        $type = explode("/",$img["type"]);
        $tem = $img["tmp_name"];

        require_once("class/banner.php");
        $b = new Banner();

        $arr = [
            "id" => $_POST["id"],
            "title" => $_POST["title"],
            "desc" => $_POST["desc"]
        ];

        if($name == ""){
            $response = $b->update_banner($arr,true);
            if($response){
                $_SESSION["msg"] = "Se acaba de actualizar el banner";
                header("Location: ../admin/banners.php");
            }else{
                $_SESSION["msg"] = "Fallo la insercion de datos";
                header("Location: ../admin/banners.php");
            }            
        }else{
            if($type[0] == "image"){
                $arr["image"] = "banner_" . $arr["id"] . "." .$type[1];
                $path = "../admin/images/banner/" . $arr["image"];

                if(move_uploaded_file($tem,$path)){
                    $response = $b->update_banner($arr,false);

                    if($response == "correcto"){
                        $_SESSION["msg"] = "Se acaba de actualizar el banner";
                        header("Location: ../admin/banners.php");
                    }else{
                        $_SESSION["msg"] = "Fallo la insercion de datos";
                        header("Location: ../admin/banners.php");
                    }
                }else{
                    $_SESSION["msg"] = "Fallo la subida de la foto";
                    header("Location: ../admin/banners.php");                   
                }
            }else{
                $_SESSION["msg"] = "Ingrese una imagen";
                header("Location: ../admin/update_banners.php?id={$_POST["id"]}");
            }        
        }

        
    }else{
        $_SESSION["msg"] = "Acceso Denegado";
        header("Location: ../admin/banners.php");
    }