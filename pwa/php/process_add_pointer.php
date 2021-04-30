<?php

session_start();

if (isset($_POST['submit'])) {
    require_once 'class/puntuacion.php';
    $punt = new Puntuacion();

    $stars = $_POST['ratings'];

    count($stars);
}
