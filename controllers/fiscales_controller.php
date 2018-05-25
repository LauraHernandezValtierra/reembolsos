<?php
		if($fiscales=='' && $tcliente == 'A' && $n_fiscales == ''){ //SIN DATOS FISCALES
			$main="";
			require_once("views/datosFiscales_view.phtml");
		}
		elseif($fiscales!='' || $n_fiscales!=''){ //CON DATOS FISCALES
			$credencial="";
			if($tcliente == 'D'){//CLIENTE DIRECTO
				$credencial="<tr>
					<td align='right' valign='middle' $bg2>Identificación <br>Oficial:</td>
					<td>
						<input type='file' name='archivo[]' id='archivo[]' required title='Ingresar unicamente archivo PDF (PASAPORTE, INE, CÉDULA PROFESIONAL, ETC.)'>
					</td>
				</tr>";

				require_once("views/datosReembolso_view.phtml");
			}
}
			$main	= "<form name='forma' id='forma' method='post' action='solicitud.php' enctype='multipart/form-data' >
				<input hidden value='".$proc."' id='proceso' name='proceso'>
				<p style='color: #CF000F;font-size:18px;padding: 3px 5px;'>Para cualquier duda o aclaración, favor de comunicarse a:&nbsp;<span style='font-family: Courier New;'>reembolsos@megatravel.com.mx</span></p>
				<p align='center' style='font-size:18px;'>Bienvenido.</p>";


			if($proc == 'S' && $estatus == 'D' && $archivo == 'N'){ //DATOS. SIN CARTA.
							$observaciones	= $datos['n_observaciones'];
							$banco			= $datos['n_banco'];
							$sucursal		= $datos['n_sucursal'];
							$no_cuenta		= $datos['n_cuenta'];
							$beneficiario	= $datos['n_beneficiario'];        
							/*if($beneficiario == ''){
								$beneficiario = $cliente;
							}*/
							$clabe			= $datos['n_clabe'];
							$mail			= $datos['n_mail'];
							$procesado		= 'Su solicitud de reembolso está incompleta, por favor termine el proceso.';
							$boton1			= "<input type='submit' value='Corregir Datos' id='action' name='action'>";
							//$boton2			= "<input type='submit' value='Cargar Solicitud' id='action' name='action'>";
							$boton2			= "<input type='submit' value='Subir Carta' id='action' name='action'>";
							$main			.= "<p align='center' style='font-size:18px;'>".$procesado."</p>
										<table width='50%' align='center'>
											<tr>
												<td>&nbsp;</td>
											</tr>
											<tr>
												<td>&nbsp;</td>
											</tr>
											<tr>
												<td  width='50%' align='center'>".$boton1."</td><td width='50%' align='center'>".$boton2."</td>
											</tr>
										</table>
							<input type='hidden' name='exped' value='".$cid_expediente."'>
							<input type='hidden' name='folio' value='".$id_rmbo."'>
							<input type='hidden' name='nconsolidado' value='".$nconsolidado."'>
							<input type='hidden' name='tipo' value='".$tipo."'>
							<input type='hidden' name='tcliente' value='".$tcliente."'>
				<input type='hidden' name='cid_cliente' value='".$cid_cliente."'>		
";	}
														
					
						else{ //SIN DATOS. SIN CARTA.
							$observaciones	= $datos['observaciones'];
							$banco			= $datos['banco'];
							$sucursal		= $datos['sucursal'];
							$no_cuenta		= $datos['cuenta'];
							$beneficiario	= $datos['beneficiario'];
							/*if($beneficiario == ''){
								$beneficiario = $cliente;
							}*/
							$ejecutivo		= $datos['ejecutivo'];
							$clabe			= $datos['clabe'];	
							$mail			= $datos['mail'];
							$procesado		= 'Ingrese los datos para solicitar su reembolso.';		
							$boton			= "<input type='submit' value='Enviar Datos' id='action' name='action'>";
						
							$main	.= "<p align='center' style='font-size:18px;'>".$procesado."</p>
						<table width='50%' border='0' align='left' cellpadding='1' cellspacing='3'>
							<tr>
								<td align='right' valign='middle'>&nbsp;</td>
								<td>&nbsp;</td>
							</tr>
							<tr>
								<td align='right' valign='middle' $bg>Expediente: </td>
								<td><input name='exped' type='text' id='exped' value='".$cid_expediente."' size='12' readonly></td>
							</tr>
							<tr>
								<td align='right' valign='middle' $bg>Motivo de reembolso: </td>
								<td><input name='mot' type='text' id='mot' value='".$concepto."' style='width:380px'readonly ></td>
							</tr>
							<tr>
								<td align='right' valign='middle' $bg>Pax Principal: </td>
								<td><input type='text' name='pax_principal' id='pax_principal' readonly value='".$pax_principal."' style='width:380px'></td>
							</tr>
							<tr>
								<td align='right' valign='middle' $bg>Paquete: </td>
								<td><input type='text' name='paquete' id='paquete' readonly value='".$paquete."' style='width:380px'></td>
							</tr>
							<tr>
								<td align='right' valign='middle' $bg>Fecha Salida: </td>
								<td><input type='text' name='fsalida' id='fsalida'  readonly value='".($fsalida)."' style='width:200px'></td>
							</tr>".$importes."
					</table>
					<table width='50%' border='0' align='right' cellpadding='1' cellspacing='3'>
							<tr>
								<td align='right' colspan='2' style='background: #088494;color: #FFF;text-shadow: #081E82 1px 1px;border-radius: 7px 5px 5px 7px;padding: 3px 5px;'> Datos modificables bajo la responsabilidad de quien esté solicitando el reembolso.</td>
							</tr>
							<tr>
								<td align='right' colspan='2'></td>
							</tr>		
							<tr>
								<td align='right' colspan='2'></td>
							</tr>		<tr>
								<td align='right' valign='middle' $bg2> Banco: </td>
								<td><input name='banco' type='text' id='banco' value='".$banco."' style='width:200px' required placeholder='Banco'autocomplete='off'></td>
							</tr>
							<tr>
								<td align='right' valign='middle' $bg2> Sucursal: </td>
								<td><input name='sucursal' type='text' id='sucursal' value='".$sucursal."'  style='width:200px'  placeholder='Sucursal' title='Sucursal' autocomplete='off'></td>
							</tr>
							<tr>
								<td align='right' valign='middle' $bg2> No. de Cuenta: </td>
								<td><input name='n_cuenta' type='text' id='n_cuenta' value='".$no_cuenta."'  style='width:200px'  onKeyPress='soloNumeros()' required placeholder='No. Cuenta' autocomplete='off'></td>
							</tr>
							<tr>
								<td align='right' valign='middle' $bg2> Clabe: </td>
								<td><input name='clabe'  type='text' minlength='18' pattern='.{18,}' maxlength='18' id='clabe' value='".$clabe."'   style='width:200px' onKeyPress='soloNumeros()'  title='Ingrese los 18 caractéres'  required placeholder='No. Cuenta Clabe' autocomplete='off'></td>
							</tr>	
							<tr>
								<td align='right' valign='middle' $bg2> Beneficiario: </td>
								<td><input name='beneficiario' type='text' id='beneficiario' value='".$beneficiario."' required placeholder='Beneficiario' style='width:380px' autocomplete='off'></td>
							</tr>
							<tr>
								<td align='right' valign='middle' $bg2> Correo de Contacto: </td>
								<td><input name='mail' type='text' id='mail' value='".$mail."' required placeholder='e-mail' style='width:380px'></td>
							</tr>".$credencial."
							<tr>
								<td align='right' valign='middle' $bg2> Observaciones: </td>
								<td><textarea name='observaciones' id='observaciones' cols='50' datoss='3'  style='height:80px;width:400px;max-height:80px;max-width:400px' >".$observaciones."</textarea></td>
							</tr>
										
					</table>
					<table align='center' width='100%'>
						<tr>
							<td width='35%'>&nbsp;</td>
							<td align='center' id='aceptaD' class='clean-red'>
								<input type='checkbox'  name='validado' onchange='cambiaClase()' id='validado' required title='Debe aceptar las politicas para continuar' ><label for='validado' style='cursor:pointer;'>
					Acepto...<a href='https://www.megatravel.com.mx/info/politica-de-privacidad.php' title='aviso' target='_blank'>Aviso de privacidad</a></label><input type='hidden' name='secc' value='1'>
							</td>
							<td width='35%'>&nbsp;</td>							
						</tr>
						<tr><td colspan='3'>&nbsp;</td></tr>
						<tr>
							<td align='center' colspan='3'>".$boton."</td>
						</tr>
					</table>
							<input type='hidden' name='exped' value='".$cid_expediente."'>
							<input type='hidden' name='folio' value='".$id_rmbo."'>
							<input type='hidden' name='nconsolidado' value='".$nconsolidado."'>
							<input type='hidden' name='tipo' value='".$tipo."'>	
							<input type='hidden' name='tcliente' value='".$tcliente."'>
							<input type='hidden' name='cid_cliente' value='".$cid_cliente."'>		
				</form>";
				}		


?>