<?php 

session_start();

if(isset($_POST['submit'])){

	$t_unit = $_POST['tipo_unidad'];
	
	if ($t_unit != "") {
		require_once 'class/tipo_unidad.php';
		$tp = new Tipo_unidad();
		$tipo = $tp->add_tipo_unidad($t_unit);
		$_SESSION["message"] = "El tipo de unidad se ha registrado correctamente.";
        header("Location: ../admin/manage-tipe-unit.php");
	} else {
		header("Location: ../admin/manage-tipe-unit.php");
		
	}
	
}