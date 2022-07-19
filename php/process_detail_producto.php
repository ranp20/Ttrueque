<?php
if (isset($_GET["id"])) {
    require_once("class/images_p.php");
    $i = new Images();
    $id = (int) $_GET["id"];

    $images = $i->get_images($id);
    $path = "shop/folder/";
    $i->close_connection();

    require_once("class/puntuacion.php");
    $p = new Puntuacion();

    $comments = $p->get_comments($id);
    $p->close_connection();
} else {
    header("Location: ./");
}
