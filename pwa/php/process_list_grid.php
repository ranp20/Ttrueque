<?php

    if(isset($_GET["categoria"]) && isset($_GET["sub"])){
        require_once("class/categoria.php");
        $c = new Categoria();

        $nombre = $_GET["categoria"];
        $subnombre = $_GET["sub"];

        $data = $c->get_categoria_name($nombre,$subnombre);
        $c->close_connection();

        $data_page_list = null;
        $data_products = null;
        $path = "admin/images/categoria/";
        $path_products = "admin/images/products/";

        if($data[0]){
            $data_page_list = $data[1][0];

            require_once("class/product.php");
            $p = new Product();
            $data_products = $p->get_data_category($nombre,$subnombre);
        }else{
            header("Location: index.php");
        }        
    }else{
        header("Location: index.php");
    }