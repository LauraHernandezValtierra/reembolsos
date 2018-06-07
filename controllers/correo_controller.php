<?php
require_once("../models/reembolsos_model.php");
require_once("../funciones/funciones.php");
require_once("../db/db.php");
	include ('../funciones/mail.php');
require_once ('../funciones/papeletaReembolso.php');
	

	$up=new reembolsos_model();
				$estatus		= 'A';
				$archivo		= 'S';
				$fproceso		= date('Y-m-d H:i:s');

					$main = "<table width='60%' align='center' style='background:rgba(255, 255, 255, 0.4) none repeat scroll 0% 0%; color:#00264d'>
	<tr>
		<td style='background: rgb(0, 85, 128);color: #ffffff;padding: 4px;text-align: center;font-size: 18px;text-transform: uppercase;border-radius: 10px 10px;'>SOLICITUD DE REEMBOLSO COMPLETADA</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td height='44' style='font-family:Verdana, Geneva, sans-serif; text-transform:uppercase;font-size:16px;'>".$cliente."</td>
	</tr>
	<tr>
		<td height='41' style='font-family:Verdana, Geneva, sans-serif; text-transform:uppercase;font-size:12px;'>Gracias por hacer uso de los servicios digitales que <span  style='font: small-caps 125%/100% serif;'> Mega Travel Operadora, S.A. de C.V.</span> pone a su disposición.
		</td>
	</tr>
	<tr>
		<td style='font-family:Tahoma, Geneva, sans-serif; text-transform:uppercase;font-size:12px;'>
			Se le ha enviado un correo de confirmación al siguiente correo electrónico <strong>".$mail."</strong>
		</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
	</tr>	
	<tr>
		<td  align='left' style='font-family:Verdana, Geneva, sans-serif; font-size:14px'>Para cualquier aclaración, duda o sugerencia favor de comunicarse al siguiente mail:&nbsp;<span style='font-family: Courier New; font-size:16px; font-weight:bolder; text-transform:uppercase;'>reembolsos@megatravel.com.mx</span>
		</td>
	</tr>			
	<tr>
		<td  height='44'>&nbsp;</td>
	</tr>
</table>";

		$bg			= "style='color:#003366;font-family:Tahoma, Geneva, sans-serif;'";

$datos	= "	<tr>
		<td><table width='100%' border='0' align='center'>
			<tr>
				<td width='25%'  align='left' $bg>EXPEDIENTE:&nbsp;</td>
				<td width='75%' style='font-family: Courier New', Courier, monospace;'>".$expediente."</td>
			</tr>
			<tr>
				<td  align='left' $bg>CONCEPTO:&nbsp;</td>
				<td style='font-family: Courier New', Courier, monospace; font-weight:bolder;'>".$concepto."</td>
			</tr>
			<tr>
				<td  align='left' $bg>FECHA DE SOLICITUD:&nbsp;</td>
				<td style='font-family: Courier New', Courier, monospace;'>".ddmmmaaaa24(date('Y-m-d'))."</td>
			</tr>
			<tr>
				<td  align='left' $bg>MONTO DEL REEMBOLSO:&nbsp;</td>
				<td style='font-family: Courier New', Courier, monospace;'>$ ".number_format($impte_soli,2).' '.$moneda."</td>
			</tr>
			<tr>
				<td  align='left' $bg>PAX PRINCIPAL:&nbsp;</td>
				<td style='font-family: Courier New', Courier, monospace;'>".$pax_principal."</td>
			</tr>
			<tr>
				<td  align='left' $bg>BENEFICIARIO:&nbsp;</td>
				<td style='font-family: Courier New', Courier, monospace;'>".$beneficiario."</td>
			</tr>
			<tr>
				<td colspan='2'><hr></td>
			</tr>
			<tr>
				<td  align='left' colspan='2' style='background-color:#ffff00;font-family:Verdana, Geneva, sans-serif; font-size:12px'>Para cualquier aclaración, duda o sugerencia favor de comunicarse al siguiente mail:&nbsp;<span style='font-family: Courier New', Courier, monospace;'>reembolsos@megatravel.com.mx</span></td>
			</tr>			
		</table></td>
	</tr>";


$datos2="	<tr>
				<td colspan='3' style='font-family:Helvetica Neue,Helvetica,Arial,sans-serif;font-size:16px;color:#222;line-height:150%'>
					<strong>REFERENCIA:</strong> $cid_expediente <br>
					<strong>CONCEPTO:</strong> $concepto <br>
					<strong>FECHA DE SOLICITUD:</strong> ".ddmmmaaaa24(date('Y-m-d'))." <br>
					<strong>MONTO DEL REEMBOLSO:</strong> $ ".number_format($impte_soli,2).' '.$moneda." <br>
					<strong>PAX PRINCIPAL:</strong> $pax_principal <br>
					<strong>BENEFICIARIO:</strong> $beneficiario <br>	
				</td>
			</tr>
			<tr>
	        	<td colspan='3' style='font-family:Helvetica Neue,Helvetica,Arial,sans-serif;font-size:14px;color:#555;line-height:150%'>
        			Para cualquier aclaración, duda o sugerencia favor de comunicarse al siguiente mail: <a href='mailto:reembolsos@megatravel.com.mx'>reembolsos@megatravel.com.mx</a>
        		</td>
        	</tr>";


		$destino	= $mail;
		//$copia	= 'sistemas@megatravel.com.mx';
		$copia		= 'sistemas4@megatravel.com.mx;sistemas1@megatravel.com.mx;sistemas@megatravel.com.mx';
		$asunto		= "SOLICITUD DE REEMBOLSO";
		$mensaje	="<table width='100%' border='0' cellpadding='10' cellspacing='10' bgcolor='#E4F4FA'>
						<tbody>
							<tr>
								<td>
									<table width='790' border='0' align='center' cellpadding='5' cellspacing='2' bgcolor='#FFF'>
										<tbody>
											<tr>
										        <td width='300'><img src='https://cafe.megatravel.com.mx/src/logo.png' alt='Mega Travel' width='280' >
										        </td>
										        <td width='80'>&nbsp;</td>
										        <td width='300' align='right' style='font-family:Helvetica Neue,Helvetica,Arial,sans-serif;font-size:11px;color:#333'>Av. Chapultepec No. 536, Piso 7 <br>Col. Roma Norte. Del. Cuauhtémoc
											        <br>C.P. 06700 Ciudad de México. México.
											        <br><br><strong>".ddmmmaaaa24(date('Y-m-d'))." ".date('H:i:s')."</strong>
												</td>
											</tr>
											<tr>
												<td colspan='3' align='justify' style='font-family:Helvetica Neue,Helvetica,Arial,sans-serif;font-size:14px;color:#555;line-height:150%><h1>REEMBOLSO SOLICITADO</h1></td>
											</tr>
											<tr>
												<td colspan='3'>
													<p style='font-family:Helvetica Neue,Helvetica,Arial,sans-serif;font-size:16px;color:#222;line-height:150%'>
													<strong> Estimado(a) Cliente ".$cliente."</strong>
													<br>En respuesta a la solicitud de reembolso del expediente <b><u>".$expediente."</u></b> , que se llevó a cabo mediante nuestro portal, le informamos que ya está siendo atendida.
													<br>
												</td>	
											</tr>
											<tr>
												<td colspan='3'><hr></td>
											</tr>	
												$datos2
											<tr>
												<td colspan='3'><hr></td>
											</tr>
											<tr>
												<td colspan='3' style='font-family:Helvetica Neue,Helvetica,Arial,sans-serif;display: block; margin: auto; font-weight: bold; width: 90%; background:#EE090D; color: #FFF; line-height: 100%; padding: 10px; font-size: 14px;  text-align: justify;'>
														AVISO IMPORTANTE: &nbsp;Este correo electrónico es para uso exclusivo de la persona o agencia a la que expresamente se le ha enviado, el cual contiene información confidencial. Cualquier revisión, almacenamiento, retransmisión, difusión o cualquier otro uso de este correo, por personas o agencias distintas a las del destinatario legítimo, queda expresamente prohibida.
												</td>
											</tr>
											<tr><td colspan='3'><hr></td></tr>
											<tr>
												<td align='center'><a href='https://www.megatravel.com.mx/info/politica-de-privacidad.php' title='aviso'>
										POLÍTICA DE PRIVACIDAD Y MANEJO DE DATOS PERSONALES - AVISO LEGAL</a></td>
											</tr>
										</table>
									</td>
								</tr>
							</tbody>
						</table>";

		//correo($destino, $asunto, $mensaje);

$correo_ejecutivo	= "<table width='70%' height='389' border='0'>
	<tr>
		<td height='54' bgcolor='#142f72'><img src='https://www.megatravel.com.mx/images/logo-mega-travel-blue.jpg'>&nbsp;</td>
	</tr> 
	<tr>
		<td height='21'>&nbsp;</td>
	</tr>
	<tr>
		<td height='26' align='center' style='font-family:Tahoma, Geneva, sans-serif; color:#336699; font-size:20px'>
			<strong>SOLICITUD DE REEMBOLSO COMPLETADA</strong>
		</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td style='font: small-caps 100%/100% serif;' align='justify'>La solicitud de reembolso del expediente <b><u>".$expediente."</u></b> , que se llevó a cabo mediante nuestro portal, ha sido enviada exitósamente.<br></td>
	</tr>
	<tr>
		<td><hr></td>
	</tr>	
".$datos."	<tr>
		<td style='color:#910000'><em>Esta dirección de correo electrónico no puede recibir respuestas.</em></td>
	</tr>
	<tr>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td align='justify'><em><strong>AVISO IMPORTANTE: &nbsp;</strong></em>Este correo electrónico es para uso exclusivo de la persona o agencia a la que expresamente se le ha enviado, el cual contiene información confidencial. Cualquier revisión, almacenamiento, retransmisión, difusión o cualquier otro uso de este correo, por personas o agencias distintas a las del destinatario legítimo, queda expresamente prohibida.</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td bgcolor='#142f72'>&nbsp;</td>
	</tr>
</table>";
$asunto_ejecutivo	= 'SOLICITUD DE REEMBOLSO CONCLUIDA';
		
		include ('../funciones/mail2.php');
		//correo_2($mail_e, $asunto_ejecutivo, $correo_ejecutivo);
	$data=$up->updateSolicitud($expediente, $nconsolidado, $estatus, $archivo, $fproceso);
	if($data){
		generaPapeleta($expediente,$nconsolidado,$solicitud,$concepto);
		require_once('../views/solicitudCompletada_view.phtml');
					
	}else{
		require_once('../views/error_view.phtml');
	}
?>