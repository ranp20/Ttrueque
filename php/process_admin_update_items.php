<?php

session_start();

require_once 'class/product.php';
$p = new Product();

if (isset($_POST['submit'])) {
    $image = $_FILES['image']['name'] == "" ? $_POST['image'] : $_FILES['image']['name'];


    $id = $_POST['id'];
    $arr = [

        'id_admin' => $_POST['user'],
        'nom' => $_POST['name'],
        'desc' => $_POST['desc'],
        'pre' => $_POST['precio'],
        'pais' => $_POST['pais'],
        'stock' => $_POST['stock'],
        'marca' => $_POST['marca'],
        'idcat' => $_POST['categoria'],
        'id' => $_POST['id'],

    ];


    if ($_FILES['image']['error'] > 0) {
        echo 'Error al cargar el archivo';
    } else {
        $admitido = array('image/png', 'image/gif', 'image/jpg', 'image/jpeg');
        $limit_kb = 2000;

        if (in_array($_FILES['image']['type'], $admitido) && $_FILES['image']['size'] <= $limit_kb * 1024) {
            $path = '../admin/images/products/';
            $img = $path . $_FILES['image']['name'];

            if (!file_exists($img)) {
                $res = move_uploaded_file($_FILES['image']['tmp_name'], $img);

                // if ($res) {
                //     $_SESSION["msg"] = "Archivo guardado correctamente";
                // } else {
                //     echo 'Error al guardar';
                // }
            }
        } else {
            echo "Arhivo no permitido o excede el tamaño";
        }
    }
    // print_r($image);
    // exit();
    $res = $p->update_ruta_image_product_admin($image, $id);
    $res = $p->get_udate_product_admin($arr);


    header("Location: ../admin/manage-items.php");
}
