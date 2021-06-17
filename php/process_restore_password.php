<?php 

if(isset($_POST) || !empty($_POST)){
	
	require_once 'class/client.php';
	$controller = new Client();
	$list_dataclient = $controller->list_password_bytoken($_POST['tokenreturn']);
	$idcli = $list_dataclient[0]['id_cliente'];
	
	$arr_update_pass = [
		"password" => password_hash($_POST['password'], PASSWORD_BCRYPT, array('cost' => 12)),
		"id" => $idcli
	];

	$update_passcli = $controller->update_password_byid($arr_update_pass);
	if(!empty($update_passcli)){
		
		$update_token_byid = $controller->update_token_byid($arr_update_pass['id']);
		
		if(!empty($update_token_byid)){
			$response = array(
				'response' => 'true'
			);
		}else{
			$response = array(
				'response' => 'false'
			);
		}

		$response = array(
			'response' => 'true'
		);

	}else{
	 	echo "No se ha actualizado el password";
	}

}else{
	echo "No se ha establecido el nuevo password";
}

die(json_encode($response));