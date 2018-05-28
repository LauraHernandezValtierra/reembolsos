<?php
function correo($destino, $asunto, $mensaje){
/*			
	$cabeceras = "From: noreply@megatravel.com.mx" . "\r\n" .
			"MIME-Version: 1.0 \r\n" .
			"Content-Type: text/html; charset=UTF-8 \r\n" .
				"X-Mailer: PHP/" . phpversion();

	if(mail($destino, $asunto, $mensaje, $cabeceras)) {
	}
*/
	require ($_SERVER["DOCUMENT_ROOT"].'/php/PHPMailerAutoload.php');
	
	$mail = new PHPMailer;
//	$mail->SMTPDebug = 3;                               // Enable verbose debug output
	$mail->isSMTP();                                      // Set mailer to use SMTP
	$mail->Host = 'xbloq.com';  // Specify main and backup SMTP servers
	$mail->SMTPAuth = true;                               // Enable SMTP authentication
	$mail->Username = 'laxmegatravel';//'sistemas3@megatravel.com.mx';                 // SMTP username
	$mail->Password = 'm75clK*vrnpC';//'V?#uFcXzGRBc'; //'Vow*iREO9xO_';//'51k3+0@*A5tn';                           // SMTP password
	$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
	$mail->Port = 465;                                   // TCP port to connect to
	$mail->setFrom('noreply@megatravel.com.mx', 'Notificacion');

	$correos = explode(';', $destino);
	foreach ($correos as $diremail){
		if($diremail != ''){
			$mail->addAddress($diremail);     // Add a recipient
		}
	} 

	$mail->isHTML(true);                                  // Set email format to HTML	
	$mail->Subject = $asunto;
	$mail->Body    = $mensaje;
	$mail->CharSet = 'UTF-8';
	$mail->AltBody = 'El mensaje enviado viene en formato HTML para visualizarlo abra el archivo adjunto.';
	//$mail->addBCC('sistemas@megatravel.com.mx');
	//$mail->addBCC('sistemas1@megatravel.com.mx');
	//$mail->addBCC('sistemas4@megatravel.com.mx');
	//$mail->addBCC('reembolsos@megatravel.com.mx');	
//		$copia		= 'sistemas4@megatravel.com.mx;sistemas@megatravel.com.mx';
	
	if(!$mail->send()) {
		include($_SERVER['DOCUMENT_ROOT'].'/objeto/bitacora_error.php');
		$datoserror	= (date('Y-m-d H:i:s')."|Envio de correo|".$_SERVER['REQUEST_URI']."|");
 		$modulo	= "mail";
		$msgerror = $mail->ErrorInfo;
		bitacoraerror($datoserror.$msgerror,$modulo);
	} 	
}
?>