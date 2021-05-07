
<?php
require_once '../php/class/client.php';
$correo = $_POST["mail"];

$c = new Client();
$cli = $c->select_id($correo);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../email/PHPMailer/Exception.php';
require '../email/PHPMailer/PHPMailer.php';
require '../email/PHPMailer/SMTP.php';

// require 'vendor/autoload.php';

//   if(isset($_POST['name']) && isset($_POST['mail'])){
    
    $nombre = $_POST['name'];
    $email = $_POST['mail'];

    // echo $nombre . ' ' . $email;

// print_r($email);
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
     $mail->Subject = "Hola, " . $nombre .", ¡te damos la bienvenida a Ttrueque!";

//  $mail->Subject ="Hola mundo";
    
     $habil = password_hash('enabled', PASSWORD_BCRYPT, array('cost' => 12));
      $mail->Body    =  '<html>
     <body style="display:flex;align-items:center;justify-content:center;background: rgba(0,0,0,.05);padding: 2.2rem 0 2.2rem 0;">
        <div style="background-image: url(https://sideralserver.com/wp-content/uploads/2020/07/139-Convertido-1.png);width: 85%;margin: auto;border-radius: 20px;background-position: center;background-repeat: no-repeat;background-size: contain;">
          <div style="width: 100%;background: rgba(255,255,255,.7);border-radius: 20px;border: #eee;box-shadow: 0 18px 24px 1px rgba(0,0,0,.1);">
            <table rules="all" style="width: 100%;background: rgba(255,255,255,.75);border-radius: 20px;margin: auto;">
               <thead>
                 <td>
                    <div style="display:block;align-items:center;justify-content:center;text-align:center;padding: 1rem 2.8rem 0 2.8rem;">
                      <img src="http://ttrueque.com/pwa/img/logo/Logo_TTRK.png" alt="logo_Ttrueque" style="max-width:200px;min-width:150px;width:100%;">
                        <h2 style="color:#3c4858;text-align:left;font-size: 1.5rem;">¡Bienvenido '  . strip_tags($_POST['name']) . '! Confirme su dirección de correo electrónico.</h2> 
                    </div>
                    <div style="display:block;align-items:center;justify-content:center;text-align:center;padding: .5rem 2.8rem 2.8rem 2.8rem;font-size: .97rem;font-weight: lighter;">
                      <div style="margin-bottom:40px;text-align: left;color:#3c4858;">
                        <p>Querido usuario</p>
                        <p>¡Bienvenido a la familia Ttrueque!</p>
                        <p>Agregue otra capa de seguridad a su cuenta de Ttrueque confirmando su
                        dirección de correo electrónico.
                        Al confirmar su correo electrónico, rastrea fácilmente los pedidos, recibe promociones
                        correos electrónicos y recuperar los datos de su cuenta.</p>
                        <p>Simplemente haga clic en el botón de abajo. ¡Demasiado fácil!</p>   
                      </div>
                      <a  style="border: none; color: #fff !important; background: #007bff;outline: none; cursor: pointer;display: inline-block; text-decoration: none; padding: 12px 25px;"  href="https://ttrueque.com/pwa/login?link=' . $habil . -$cli[0]["id_cliente"] . ' " >Activar Cuenta</a>
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
     echo 'El mensaje se envio correctamente';
    // header("Location: ../account");
    } catch (Exception $e) {
         echo "Ocurrio un error al enviar el correo. Error: {$mail->ErrorInfo}";
    }

//   }else{
//     return;
//   }






?>