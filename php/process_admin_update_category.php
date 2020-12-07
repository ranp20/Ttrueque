<?php

session_start();

require_once 'class/categoria.php';
$c = new Categoria();

if (isset($_POST['submit'])) {
    $nombre = $_POST['name'];
    $image = $_FILES['image']['name'] == "" ? $_POST['image'] : $_FILES['image']['name'];
    $id = $_POST['id'];

    // if ($_FILES['image']['error'] > 0) {
    //     echo 'Error al cargar el archivo';
    // } else {
    $admitido = array('image/png', 'image/gif', 'image/jpg', 'image/jpeg');
    $limit_kb = 2000;

    if (in_array($_FILES['image']['type'], $admitido) && $_FILES['image']['size'] <= $limit_kb * 1024) {
        $path = '../admin/images/categoria/';
        $img = $path . $image;

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
    // }
    // print_r($img);
    // exit();
    $res =   $c->update_ruta_image_category($image, $id);
    $res = $c->update_category($nombre, $image, $id);

    header('location: ../admin/manage-category.php');
}
