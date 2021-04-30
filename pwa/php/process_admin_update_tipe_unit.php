<?php

session_start();

if (isset($_POST['submit'])) {
	require_once 'class/tipo_unidad.php';
	$tp = new Tipo_unidad();

	$arr = [
		'id' => $_POST['id_tipo'],
		'tipo' => $_POST['tipo_unidad']
	];

	$res = $tp->update_tipo_unidad($arr);
	if ($res) {
		header('Location: ../admin/manage-tipe-unit.php');
	} else {
		echo "Error";
	}
}
