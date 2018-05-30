<?php
set_time_limit ( 720 );

$tipocambio="<tr>
					<td height='20' align='left' style='font-weight:bolder;font-family:Tahoma, Geneva, sans-serif;'>TIPO DE CAMBIO: </td>
					<td>
						<table width='40%'  style='font-family:Tahoma, Geneva, sans-serif;font-size:12px; color:#00264d;'>
							<tr>
								<td height='20' >$".$tc." MXN</td>
							</tr>
						</table>
					</td>			
				</tr>";

	switch($tipo){
		case '1': //COMISIÓN AGENCIA
				$concepto	= 'COMISIÓN DE AGENCIA';
					//CANTIDAD USD, IMPORTE MXN, TIPO DE CAMBIO
					if($comision_mxn !='0.00' && $comision_usd !='0.00' && $tc !='0.00' && $moneda == 'MXN' && $excedente_mxn == '0.00' && $excedente_usd == '0.00'){ 

			$importes	="
				<tr>
					<td height='20' align='left' style='font-weight:bolder;font-family:Tahoma, Geneva, sans-serif;'>CANTIDAD EN USD: </td>
					<td>
						<table width='25%'  style='font-family:Tahoma, Geneva, sans-serif;font-size:12px; color:#00264d;'>
							<tr>
								<td height='20' >".number_format($comision_usd,2)." USD</td>									
							</tr>	
						</table>
					</td>		
				</tr>
				";	
			$imp_sol=number_format($impte_soli,2);
			$mon=$moneda;
			$imp_let=convertir($impte_soli,$moneda);	
					}
					//CANTIDAD MXN, IMPORTE MXN
					elseif($comision_mxn !='0.00' && $comision_usd =='0.00' && $tc =='0.00' && $moneda == 'MXN' && $excedente_mxn == '0.00' && $excedente_usd == '0.00'){
			$importes ="";
				$imp_sol=number_format($impte_soli,2);
				$mon=$moneda;
				$imp_let=convertir($impte_soli,$moneda);
					}
					//CANTIDAD USD, IMPORTE USD
					elseif($comision_mxn =='0.00' && $comision_usd !='0.00' && $tc =='0.00' && $moneda == 'USD' && $excedente_mxn == '0.00' && $excedente_usd == '0.00'){
			$importes ="";
				$imp_sol=number_format($comision_usd,2);
				$mon=$moneda;
				$imp_let=convertirconvertir($comision_usd,$moneda);
					}
				break;
				
				case '2': //EXCEDENTE PAGO
				$concepto	= 'EXCEDENTE DE PAGO';
					//CANTIDAD USD, IMPORTE MXN, TIPO DE CAMBIO
					if($excedente_mxn !='0.00' && $excedente_usd !='0.00' && $tc !='0.00' && $moneda == 'MXN' && $comision_mxn =='0.00' && $comision_usd =='0.00'){
			$importes	="
				
				<tr>
					<td height='20' align='left' style='font-weight:bolder;font-family:Tahoma, Geneva, sans-serif;'>CANTIDAD EN USD: </td>
					<td>
						<table width='25%'  style='font-family:Tahoma, Geneva, sans-serif;font-size:12px; color:#00264d;'>
							<tr>
								<td height='20' >".number_format($excedente_usd,2)." USD</td>									
							</tr>	
						</table>
					</td>		
				</tr>";	
				$imp_sol=number_format($impte_soli,2);
				$mon=$moneda;
				$imp_let=convertir($impte_soli,$moneda);	
					}

					//CANTIDAD MXN, IMPORTE MXN
					elseif($excedente_mxn !='0.00' && $excedente_usd =='0.00' && $tc =='0.00' && $moneda == 'MXN' && $comision_mxn =='0.00' && $comision_usd =='0.00'){
			$importes ="";
				$imp_sol=number_format($excedente_mxn,2);
				$mon=$moneda;
				$imp_let=convertir($excedente_mxn,$moneda);
					}
					//CANTIDAD USD, IMPORTE USD
					elseif($excedente_mxn =='0.00' && $excedente_usd !='0.00' && $tc =='0.00' && $moneda == 'USD' && $comision_mxn =='0.00' && $comision_usd =='0.00'){
			$importes ="";
				$imp_sol=number_format($excedente_usd,2);
				$mon=$moneda;
				$imp_let=convertir($excedente_usd,$moneda);
					}
				break;
				
				case '3': //COMISIÓN Y EXCEDENTE
				$concepto	= 'COMISIÓN DE AGENCIA Y EXCEDENTE DE PAGO';
					//CANTIDAD USD, IMPORTE MXN, TIPO DE CAMBIO
					if($excedente_mxn !='0.00' && $excedente_usd !='0.00' && $tc !='0.00' && $moneda == 'MXN' && $comision_mxn !='0.00' && $comision_usd !='0.00'){
			$importes	="
			
				<tr>
					<td height='20' align='left' style='font-weight:bolder;font-family:Tahoma, Geneva, sans-serif;'>COMISIÓN AGENCIA: </td>
					<td>
						<table width='50%'  style='font-family:Tahoma, Geneva, sans-serif;font-size:12px; color:#00264d;'>
							<tr>
								<td height='20' >".number_format($comision_usd,2)." USD</td>
								<td>&nbsp;</td>
								<td height='20' >$".number_format($comision_mxn,2)." MXN</td>
							</tr>	
						</table>
					</td>		
				</tr>
				<tr>
					<td height='20' align='left' style='font-weight:bolder;font-family:Tahoma, Geneva, sans-serif;'>EXCEDENTE PAGO: </td>
					<td>
						<table width='50%'  style='font-family:Tahoma, Geneva, sans-serif;font-size:12px; color:#00264d;'>
							<tr>
								<td height='20' width='10%'>".number_format($excedente_usd,2)." USD</td>
								<td width='5%'>&nbsp;</td>
								<td height='20'  width='10%'>$ ".number_format($excedente_mxn,2)." MXN</td>
							</tr>
						</table>
					</td>		
				</tr>
				";
				$imp_sol=number_format($impte_soli,2);
				$mon=$moneda;
				$imp_let=convertir($impte_soli,$moneda);
					}
					//CANTIDAD MXN, IMPORTE MXN
					elseif($excedente_mxn !='0.00' && $excedente_usd =='0.00' && $tc =='0.00' && $moneda == 'MXN' && $comision_mxn !='0.00' && $comision_usd =='0.00'){
			$importes	="
				<tr>
					<td height='20' align='left' style='font-weight:bolder;font-family:Tahoma, Geneva, sans-serif;'>COMISIÓN AGENCIA: </td>
					<td>
						<table width='25%'  style='font-family:Tahoma, Geneva, sans-serif;font-size:12px; color:#00264d;'>
							<tr>
								<td height='20' >".number_format($comision_mxn,2)." ".$moneda."</td>
							</tr>
						</table>
					</td>		
				</tr>
				<tr>
					<td height='20' align='left' style='font-weight:bolder;font-family:Tahoma, Geneva, sans-serif;'>EXCEDENTE PAGO: </td>
					<td>
						<table width='25%'  style='font-family:Tahoma, Geneva, sans-serif;font-size:12px; color:#00264d;'>
							<tr>
								<td height='20' >".number_format($excedente_mxn,2)." ".$moneda."</td>
							</tr>
						</table>
					</td>		
				</tr>";
				$imp_sol=number_format($impte_soli,2);
				$mon=$moneda;
				$imp_let=convertir($impte_soli,$moneda);
					}
					//CANTIDAD USD, IMPORTE USD
					elseif($excedente_mxn =='0.00' && $excedente_usd !='0.00' && $tc =='0.00' && $moneda == 'USD' && $comision_mxn =='0.00' && $comision_usd !='0.00'){
			$importes	="
				<tr>
					<td height='20' align='left' style='font-weight:bolder;font-family:Tahoma, Geneva, sans-serif;'>COMISIÓN AGENCIA: </td>
					<td width='100%'>
						<table width='25%' style='font-family:Tahoma, Geneva, sans-serif;font-size:12px; color:#00264d;'>
							<tr>
								<td height='20' width='30%' >".number_format($comision_usd,2)." ".$moneda."</td>
							</tr>
						</table>
					</td>		
				</tr>
				<tr>
					<td height='20' align='left' style='font-weight:bolder;font-family:Tahoma, Geneva, sans-serif;'>EXCEDENTE PAGO: </td>
					<td>
						<table width='25%'  style='font-family:Tahoma, Geneva, sans-serif;font-size:12px; color:#00264d;'>
							<tr>
								<td  height='20' width='30%' >".number_format($excedente_usd,2)." ".$moneda."</td>
							</tr>
						</table>
					</td>		
				</tr>";	
				$imp_sol=number_format($impte_soli,2);
				$mon=$moneda;
				$imp_let=convertir($impte_soli,$moneda);
					}
				break;	
				
				case '4': //SERV. NO PRESTADO OPER. AEREO
				$concepto	= 'SERVICIO NO PRESTADO OPERADOR AÉREO';
					//CANTIDAD USD, IMPORTE MXN, TIPO DE CAMBIO
					if($serv_usd !='0.00' && $serv_mxn !='0.00' && $tc !='0.00'  && $excedente_mxn =='0.00' && $excedente_usd =='0.00' && $moneda == 'MXN' && $comision_mxn =='0.00' && $comision_usd =='0.00' && $canc_mxn == '0.00' && $canc_usd == '0.00'){
			$importes	="
				
					<td height='20' align='left' style='font-weight:bolder;font-family:Tahoma, Geneva, sans-serif;'>CANTIDAD EN USD: </td>
					<td>
						<table width='25%'  style='font-family:Tahoma, Geneva, sans-serif;font-size:12px; color:#00264d;'>
							<tr>
								<td height='20' >".number_format($serv_usd,2)." USD</td>									
							</tr>	
						</table>
					</td>		
				</tr>";	
					$imp_sol=number_format($serv_mxn,2);
					$mon=$moneda;
					$imp_let=convertir($serv_mxn,$moneda);	
					}
					//CANTIDAD MXN, IMPORTE MXN
					elseif($serv_usd =='0.00' && $serv_mxn !='0.00' && $tc =='0.00'  && $excedente_mxn =='0.00' && $excedente_usd =='0.00' && $moneda == 'MXN' && $comision_mxn =='0.00' && $comision_usd =='0.00' && $canc_mxn == '0.00' && $canc_usd == '0.00'){
			$importes ="";
					$imp_sol=number_format($serv_mxn,2);
					$mon=$moneda;
					$imp_let=convertir($serv_mxn,$moneda);
					}
					//CANTIDAD USD, IMPORTE USD
					elseif($serv_usd =='0.00' && $serv_mxn !='0.00' && $tc =='0.00'  && $excedente_mxn =='0.00' && $excedente_usd =='0.00' && $moneda == 'USD' && $comision_mxn =='0.00' && $comision_usd =='0.00' && $canc_mxn == '0.00' && $canc_usd == '0.00'){
			$importes ="";
					$imp_sol=number_format($serv_usd,2);
					$mon=$moneda;
					$imp_let=convertir($serv_usd,$moneda);
					}
				break;
					
				case '5': //SERV. NO PRESTADO OPER. TERRESTRE
				$concepto	= 'SERVICIO NO PRESTADO OPERADOR TERRESTRE';
					//CANTIDAD USD, IMPORTE MXN, TIPO DE CAMBIO
					if($serv_usd !='0.00' && $serv_mxn !='0.00' && $tc !='0.00'  && $excedente_mxn =='0.00' && $excedente_usd =='0.00' && $moneda == 'MXN' && $comision_mxn =='0.00' && $comision_usd =='0.00' && $canc_mxn == '0.00' && $canc_usd == '0.00'){
			$importes	="
				
					<td height='20' align='left' style='font-weight:bolder;font-family:Tahoma, Geneva, sans-serif;'>CANTIDAD EN USD: </td>
					<td>
						<table width='25%'  style='font-family:Tahoma, Geneva, sans-serif;font-size:12px; color:#00264d;'>
							<tr>
								<td height='20' >".number_format($serv_usd,2)." USD</td>									
							</tr>	
						</table>
					</td>		
				</tr>";	
					$imp_sol=number_format($serv_mxn,2);
					$mon=$moneda;
					$imp_let=convertir($serv_mxn,$moneda);	
					}
					//CANTIDAD MXN, IMPORTE MXN
					elseif($serv_usd =='0.00' && $serv_mxn !='0.00' && $tc =='0.00'  && $excedente_mxn =='0.00' && $excedente_usd =='0.00' && $moneda == 'MXN' && $comision_mxn =='0.00' && $comision_usd =='0.00' && $canc_mxn == '0.00' && $canc_usd == '0.00'){
			$importes ="";
					$imp_sol=number_format($serv_mxn,2);
					$mon=$moneda;
					$imp_let=convertir($serv_mxn,$moneda);	
					}
					//CANTIDAD USD, IMPORTE USD
					elseif($serv_usd =='0.00' && $serv_mxn !='0.00' && $tc =='0.00'  && $excedente_mxn =='0.00' && $excedente_usd =='0.00' && $moneda == 'USD' && $comision_mxn =='0.00' && $comision_usd =='0.00' && $canc_mxn == '0.00' && $canc_usd == '0.00'){
			$importes ="";
					$imp_sol=number_format($serv_usd,2);
					$mon=$moneda;
					$imp_let=convertir($serv_usd,$moneda);
					}
				break;
				
				case '6': //SERV. NO PRESTADO OPER. CRUCEROS
				$concepto	= 'SERVICIO NO PRESTADO OPERADOR CRUCEROS';
					//CANTIDAD USD, IMPORTE MXN, TIPO DE CAMBIO
					if($serv_usd !='0.00' && $serv_mxn !='0.00' && $tc !='0.00'  && $excedente_mxn =='0.00' && $excedente_usd =='0.00' && $moneda == 'MXN' && $comision_mxn =='0.00' && $comision_usd =='0.00' && $canc_mxn == '0.00' && $canc_usd == '0.00'){
			$importes	="
					<td height='20' align='left' style='font-weight:bolder;font-family:Tahoma, Geneva, sans-serif;'>CANTIDAD EN USD: </td>
					<td>
						<table width='25%'  style='font-family:Tahoma, Geneva, sans-serif;font-size:12px; color:#00264d;'>
							<tr>
								<td height='20' >".number_format($serv_usd,2)." USD</td>									
							</tr>	
						</table>
					</td>		
				</tr>";	
					$imp_sol=number_format($serv_mxn,2);
					$mon=$moneda;
					$imp_let=convertir($serv_mxn,$moneda);
					}
					//CANTIDAD MXN, IMPORTE MXN
					elseif($serv_usd =='0.00' && $serv_mxn !='0.00' && $tc =='0.00'  && $excedente_mxn =='0.00' && $excedente_usd =='0.00' && $moneda == 'MXN' && $comision_mxn =='0.00' && $comision_usd =='0.00' && $canc_mxn == '0.00' && $canc_usd == '0.00'){
			$importes ="";
					$imp_sol=number_format($serv_mxn,2);
					$mon=$moneda;
					$imp_let=convertir($serv_mxn,$moneda);
					}
					//CANTIDAD USD, IMPORTE USD
					elseif($serv_usd =='0.00' && $serv_mxn !='0.00' && $tc =='0.00'  && $excedente_mxn =='0.00' && $excedente_usd =='0.00' && $moneda == 'USD' && $comision_mxn =='0.00' && $comision_usd =='0.00' && $canc_mxn == '0.00' && $canc_usd == '0.00'){
			$importes ="";
					$imp_sol=number_format($serv_usd,2);
					$mon=$moneda;
					$imp_let=convertir($serv_usd,$moneda);
					}
				break;
				
				case '8': //CANCELACIÓN DE SERVICIO
				$concepto	= 'CANCELACIÓN DE SERVICIOS';
					//CANTIDAD USD, IMPORTE MXN, TIPO DE CAMBIO
					if($serv_usd =='0.00' && $serv_mxn =='0.00' && $tc !='0.00'  && $excedente_mxn =='0.00' && $excedente_usd =='0.00' && $moneda == 'MXN' && $comision_mxn =='0.00' && $comision_usd =='0.00' && $canc_mxn != '0.00' && $canc_usd != '0.00'){
			$importes	="
					<td height='20' align='left' style='font-weight:bolder;font-family:Tahoma, Geneva, sans-serif;'>CANTIDAD EN USD: </td>
					<td>
						<table width='40%'  style='font-family:Tahoma, Geneva, sans-serif;font-size:12px; color:#00264d;'>
							<tr>
								<td height='20' >".number_format($canc_usd,2)." USD</td>									
							</tr>	
						</table>
					</td>		
				</tr>";	
					$imp_sol=number_format($canc_mxn,2);
					$mon=$moneda;
					$imp_let=convertir($canc_mxn,$moneda);	
					}
					//CANTIDAD MXN, IMPORTE MXN
					elseif($serv_usd =='0.00' && $serv_mxn =='0.00' && $tc =='0.00'  && $excedente_mxn =='0.00' && $excedente_usd =='0.00' && $moneda == 'MXN' && $comision_mxn =='0.00' && $comision_usd =='0.00' && $canc_mxn != '0.00' && $canc_usd == '0.00'){
			$importes ="";
					$imp_sol=number_format($canc_mxn,2);
					$mon=$moneda;
					$imp_let=convertir($canc_mxn,$moneda);	
					}
					//CANTIDAD USD, IMPORTE USD
					elseif($serv_usd =='0.00' && $serv_mxn =='0.00' && $tc =='0.00'  && $excedente_mxn =='0.00' && $excedente_usd =='0.00' && $moneda == 'USD' && $comision_mxn =='0.00' && $comision_usd =='0.00' && $canc_mxn != '0.00' && $canc_usd == '0.00'){
			$importes ="";
				$imp_sol=number_format($canc_usd,2);
					$mon=$moneda;
					$imp_let=convertir($canc_usd,$moneda);	
					}
				break;
		default:
			require_once("views/denegado_view.phtml");
		break;
	}

	
?>