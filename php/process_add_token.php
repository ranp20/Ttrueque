<?php 

if(!empty($_POST['token'])){

	require_once 'class/client.php';
	$controller = new Client();
	$listtoken = $controller->list_password_bytoken($_POST['token']);

	if(!empty($listtoken)){
			
		$response = array(
			'response' => 'true'
		);

	}else{
		$response = array(
			'response' => 'false'
		);
	}

}else{
	$response = array(
		'response' => 'false'
	);
}

die(json_encode($response));