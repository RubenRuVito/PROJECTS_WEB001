<?php
//Pruebas de envio de email con phpMailer.
require_once ("class/class.phpmailer.php");
require_once('class/class.smtp.php');

$nombre ='Pepe';
$ape = 'Apellidos Pepe';
$nic = 'prueba_01';
$email = 'raibandj@hotmail.com';
$codigo = 'xxxxxxxxxcodigodeAlta01';

enviarEmailRegistro($nombre,$ape,$email,$codigo);

function enviarEmailRegistro($nombre,$apellidos,$email,$codigoAlta){ 
    
     $urlActivar = 'http://localhost/ProjectsWEBrr_ATTIC/Galobicom_02/activarUser.php?cod=';
	$mnsHTML = '<html>';
	$mnsHTML .= '<head>';
	$mnsHTML .= '<meta http-equiv="Content-Type" content="text/html; charset=utf-8">';
	$mnsHTML .= '<title>Título</title>';
	$mnsHTML .= '</head>';
	$mnsHTML .= '<body>';
	$mnsHTML .= '<p>GALOBICOM - Activar usuario <h1>Hola! '.$nombre.' '.$apellidos.'.</p>';
	$mnsHTML .= '<center>';
	$mnsHTML .= '</h1><strong>Gracias por registrarte en GALOBICOM</strong>. Para completar el registro, tienes que confirmar que has recibido este email haciendo click en el siguiente enlace:<p style="text-align: center;"><a href="'.$urlActivar.''.$codigoAlta.'">Activar Usuario.</a></p>';
	$mnsHTML .= '</center>';
	$mnsHTML .= '</body>';
	$mnsHTML .= '</html>';
	$mnsHTML = utf8_decode($mnsHTML);
    
    $subject = utf8_decode("Nueva cuenta usuario - Proceso de activación.");
   
    $mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->SMTPDebug = 0;
    $mail->PluginDir = "class/";
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = "tls";
      $mail->Host = "smtp.gmail.com";
    $mail->Port = 587;
    $mail->Username = "rubenruvito@gmail.com";
    $mail->Password = "1983rugaral01";
    $mail->From = "admin@galobi.com";
    $mail->FromName = "AdminGalobico";
    $mail->AddAddress($email);
    $mail->IsHTML(true);
    $mail->SMTPDebug = 2;
    $mail->Subject = $subject;
    //$mail->Body = ("<b>Pruebas PhpMailer, siiiiiiiiii</b>");
    $mail->Body = ($mnsHTML);
 	//$mail->AltBody = ("Pruebas PhpMailer");
    if(!$mail->Send())
    {
    
    echo 'ERROR'.$mail->ErrorInfo;
    }else{
    	echo 'Correo enviado';
    }
}

?>