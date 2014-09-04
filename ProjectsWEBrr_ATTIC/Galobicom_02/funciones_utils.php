<?php
//Funciones y métodos útiles.
require_once ("class/class.phpmailer.php");
require_once('class/class.smtp.php');

function enviarEmailRegistro($nombre,$apellidos,$email,$codigoAlta){ //envio de email con phpMailer.
    
    $urlActivar = 'http://localhost/ProjectsWEBrr_ATTIC/Galobicom_02/activarUser.php?cod=';
    $mnsHTML = '<html>';
    $mnsHTML .= '<head>';
    $mnsHTML .= '<meta http-equiv="Content-Type" content="text/html; charset=utf-8">';
    $mnsHTML .= '<title>Título</title>';
    $mnsHTML .= '</head>';
    $mnsHTML .= '<body>';
    $mnsHTML .= '<p>GALOBICOM - Activar usuario: <h1>Hola! '.$nombre.' '.$apellidos.'.</p>';
    $mnsHTML .= '<center>';
    $mnsHTML .= '</h1><strong>Gracias por registrarte en GALOBICOM</strong>. Para completar el registro, tienes que confirmar que has recibido este email haciendo click en el siguiente enlace:<p style="text-align: center;"><a href="'.$urlActivar.''.$codigoAlta.'">Activar Usuario.</a></p>';
    $mnsHTML .= '</center>';
    $mnsHTML .= '</body>';
    $mnsHTML .= '</html>';
    $mnsHTML = utf8_decode($mnsHTML);
    $subject = utf8_decode("Nuevo usuario - Proceso de activación.");
   
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

function generarCodigoAlta($long,$esp){//Metodo para generar el código de alta..
    $semilla = array();
    $semilla[] = array('a','e','i','o','u');
    $semilla[] = array('b','c','d','f','g','h','j','k','l','m','n','p','q','r','s','t','v','w','x','y','z');
    $semilla[] = array('0','1','2','3','4','5','6','7','8','9');
    $semilla[] = array('A','E','I','O','U');
    $semilla[] = array('B','C','D','F','G','H','J','K','L','M','N','P','Q','R','S','T','V','W','X','Y','Z');
    $semilla[] = array('0','1','2','3','4','5','6','7','8','9');

    if ($esp){ 
        $semilla[] = array('$','#','%','&amp;','@','-','?','¿','!','¡','+','-','*');
    }
 
    // creamos la clave con la longitud indicada
    for ($bucle=0; $bucle<$long; $bucle++)
    {
        // seleccionamos un subarray al azar
        $valor = mt_rand(0, count($semilla)-1);
        // selecccionamos una posición al azar dentro del subarray
        $posicion = mt_rand(0,count($semilla[$valor])-1);
        // cogemos el carácter y lo agregamos a la clave
        $clave .= $semilla[$valor][$posicion];
    }
    // devolvemos la clave
    return $clave;
}
?>