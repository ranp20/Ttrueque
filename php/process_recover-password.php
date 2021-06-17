<?php 

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../email/PHPMailer/Exception.php';
require '../email/PHPMailer/PHPMailer.php';
require '../email/PHPMailer/SMTP.php';

require '../vendor/autoload.php';

if(isset($_POST["mail-recover"]) || isset($_POST)){
	
	$recover_pass = [
		"token" => uniqid(),
		"email" => $_POST["mail-recover"]
	];

	require_once 'class/all.php';
	$all = new All();
	$recover_cli = $all->generate_uniqid($recover_pass);

	$get_byemail = $all->get_client_by_email($_POST['mail-recover']);

	if(!empty($recover_cli) && !empty($get_byemail)){

		    
		$email = $_POST['mail-recover'];
		$token = $recover_pass['token'];
		$name_cli = $get_byemail[0]['nombre_cliente'];

		$mail = new PHPMailer(true);
		 
    try {
  		$mail->CharSet = 'UTF-8';
     	//Server settings
	    $mail->SMTPDebug = 0;                                                           // Enable verbose debug output
	    //   $mail->isSMTP();                                                    // Set mailer to use SMTP
	    $mail->Host       = 'smtp.gmail.com';                                                    // Specify main and backup SMTP servers
	    $mail->SMTPAuth   = true;                                                       // Enable SMTP authentication
	    $mail->Username   = 'melgarejo777666@gmail.com';                 // SMTP username
	    $mail->Password   = 'melgarejo123';                                                    // SMTP password
	    $mail->SMTPSecure = 'tls';                                                      // Enable TLS encryption, `ssl` also accepted
	    $mail->Port       =     587; //587;                                          // TCP port to connect to

	    //Recipients
	    $mail->setFrom('csalazar@csscreativos.com', 'Ttrueque');
	    //foreach($correo as $val){
	    $mail->addAddress($email);                                        // Add a recipient a quien se le enviara el corre
	    //}
	    // Content
	    $mail->isHTML(true);                                                               // Set email format to HTML
	    $mail->Subject = "Hola de nuevo, " . $name_cli;
	    
	    $mail->Body    =  '<html>
	     <body style="display:flex;align-items:center;justify-content:center;background: rgba(0,0,0,.05);padding: 2.2rem 0 2.2rem 0;">
	        <div style="background-image: url(https://sideralserver.com/wp-content/uploads/2020/07/139-Convertido-1.png);width: 85%;margin: auto;border-radius: 20px;background-position: center;background-repeat: no-repeat;background-size: contain;">
	          <div style="width: 100%;background: rgba(255,255,255,.7);border-radius: 20px;border: #eee;box-shadow: 0 18px 24px 1px rgba(0,0,0,.1);">
	            <table rules="all" style="width: 100%;background: rgba(255,255,255,.75);border-radius: 20px;margin: auto;">
	               <thead>
	                 <td>
	                    <div style="display:block;align-items:center;justify-content:center;text-align:center;padding: 1rem 2.8rem 0 2.8rem;">
	                      <img src="http://ttrueque.com/img/logo/Logo_TTRK.png" alt="logo_Ttrueque" style="max-width:200px;min-width:150px;width:100%;">
	                        <h2 style="color:#3c4858;text-align:left;font-size: 1.5rem;">Restablece tu contraseña de Ttrueque.</h2> 
	                    </div>
	                    <div style="display:block;align-items:center;justify-content:center;text-align:center;padding: .5rem 2.8rem 2.8rem 2.8rem;font-size: .97rem;font-weight: lighter;">
	                      <div style="margin-bottom:40px;text-align: center;color:#3c4858;">
	                        <p style="text-align:left;">Hola, ."'.$name_cli.'"</p>
	                        <p style="text-align:left;">Le enviamos este correo electrónico porque solicitó un restablecimiento de contraseña. Haga clic en este enlace para crear una nueva contraseña.</p>
	                        <a href="https://ttrueque.com/reestablecer-contrasena?token='.$token.'" style="text-decoration: none !important;color: #fff;background-color: #FD4259;border-radius: 1.5rem;padding: 1rem 2rem;display: inline-block;">Establecer una nueva contraseña</a>
	                        <p style="text-align:left;">Si no solicitó un restablecimiento de contraseña, puede ignorar este correo electrónico. Tu contraseña no se cambiará.</p>
	                      </div>
	                      <h3 style="color:#3c4858;font-weight:bold;">El equipo de Ttrueque</h3>
	                    </div>
	                  </td>
	               </thead>
	               <tbody>
	               </tbody>
	            </table>
	          </div>
	        </div>
	     </body>
	   	</html>';

	    $mail->send();

	    $response = array(
				'response' => 'true'
			);

    } catch (Exception $e) {
      echo "Ocurrio un error al enviar el correo. Error: {$mail->ErrorInfo}";

      $response = array(
				'response' => 'false'
			);
    }

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