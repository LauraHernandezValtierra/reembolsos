<?php
function correo_2($destino, $asunto, $mensaje, $file){

	$mail = new PHPMailer;
//	$mail->SMTPDebug = 3;                               // Enable verbose debug output
	$mail->isSMTP();                                      // Set mailer to use SMTP
	$mail->Host = 'xbloq.com';  // Specify main and backup SMTP servers
	$mail->SMTPAuth = true;                               // Enable SMTP authentication
	$mail->Username = 'laxmegatravel';//'sistemas3@megatravel.com.mx';                 // SMTP username
	$mail->Password = 'Vow*iREO9xO_';//'51k3+0@*A5tn';                           // SMTP password
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
	
	if(!$mail->send()) {
		include($_SERVER['DOCUMENT_ROOT'].'/objeto/bitacora_error.php');
		$datoserror	= (date('Y-m-d H:i:s')."|Envio de correo|".$_SERVER['REQUEST_URI']."|");
 		$modulo	= "mail";
		$msgerror = $mail->ErrorInfo;
		bitacoraerror($datoserror.$msgerror,$modulo);
	} 	
}
?>
