<?php
session_start();
if (isset($_POST["submit"])) {
    require_once "class/product.php";
    $p = new Product();

    $image = false;
    foreach ($_FILES as $val) {
        for ($i = 0; $i < count($val["type"]); $i++) {
            $t = explode("/", $val["type"][$i]);
            if ($t[0] == "image") {
                $image = true;
                break;
            }
        }
    }

    if ($image) {
        $arr = [];
        foreach ($_POST as $key => $val) {
            if ($key != "submit") $arr[$key] = $val;
        }

        $arr["user"] = (int)$arr["user"];
        $arr["name"] = $arr["name"];
        $arr["desc"] = $arr["desc"];
        $arr["precio"] = (int)$arr["precio"];
        $arr["pais"] = (int)$arr["pais"];
        $arr["stock"] = (int)$arr["stock"];
        $arr["marca"] = $arr["marca"];
        $arr["categoria"] = (int)$arr["categoria"];
        $arr["image"] = $_FILES['image']['name'][0];

        if ($arr["user"] == 0) {
            $_SESSION["msg"] = "Error usuario no encontrado";
            header("Location: ../admin/add-items.php");
        
        } else if (!isset($arr["name"])) {
            $_SESSION["msg"] = "Ingrese un nombre valido";
            header("Location: ../admin/add-items.php");
        
        } else if (!isset($arr["desc"])) {
            $_SESSION["msg"] = "Ingrese una descripción valida";
            header("Location: ../admin/add-items.php");
        
        } else if ($arr["precio"] == 0) {
            $_SESSION["msg"] = "Ingrese un precio válido";
            header("Location: ../admin/add-items.php");        
        
        } else if ($arr["pais"] == 0) {
            $_SESSION["msg"] = "Ingrese un pais válido";
            header("Location: ../admin/add-items.php");
        
        } else if ($arr["stock"] == 0) {
            $_SESSION["msg"] = "Ingrese un país válido";
            header("Location: ../admin/add-items.php");
        
        } else if(!isset($arr["marca"])){
            $_SESSION["msg"] = "Ingrese una marca válida";
            header("Location: ../admin/add-items.php");
        
        } else if($arr["categoria"] == 0){
            $_SESSION["msg"] = "Ingrese una categoría válida";
            header("Location: ../admin/add-items.php");
        }

        $response = $p->add_product_admin($arr);
        //print_r($arr);
        
        //exit();

        if ($response) {
            foreach ($_FILES as $val) {
                $name = $val["name"];
                $tmp_name = $val["tmp_name"];
                $type = $val["type"];

                for ($i = 0; $i < count($type); $i++) {
                    $path = "../admin/images/products/";
                    $t = explode("/", $type[$i]);
                    if ($t[0] == "image") {
                        $path .= $name[$i];
                        if (move_uploaded_file($tmp_name[$i], $path)) {
                            $p->add_image_prod_admin($name[$i]);
                        }
                    }
                }
            }
            $_SESSION["msg"] = "El producto se ha registrado correctamente.";
            header("Location: ../admin/add-items.php");
        } else {
            $_SESSION["msg"] = "Ocurrio un error al registrar el producto.";
            header("Location: ../admin/add-items.php");
        }
    } else {
        $_SESSION["msg"] = "No has ingresado una imagen";
        header("Location: ../admin/add-items.php");
    }
} else {
    $_SESSION["msg"] = "Acceso restringido";
    header("Location: ../admin/add-items.php");
}