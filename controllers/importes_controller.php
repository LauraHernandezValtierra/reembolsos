<?php
set_time_limit ( 720 );
	switch($tipo){
		case 1:
				$concepto	= 'COMISIÓN DE AGENCIA';

				//CANTIDAD USD, IMPORTE MXN, TIPO DE CAMBIO
				if($comision_mxn !='0.00' && $comision_usd !='0.00' && $tc !='0.00' && $moneda == 'MXN' && $excedente_mxn == '0.00' && $excedente_usd == '0.00'){ 
					$importes	="
						<tr>
							<td align='right' valign='middle' $bg>Tipo de Cambio: </td>
							<td><input type='text' name='tc' id='tc' readonly  value='$ ".$tc."' size='10'></td>
						</tr>
						<tr>
							<td align='right' valign='middle' $bg>Cantidad en USD: </td>
							<td><input type='text' name='impte_usd' id='impte_usd' readonly  value='".number_format($comision_usd,2)."' size='20'></td>									
						</tr>
						<tr>
							<td align='right' valign='middle' $bg>Importe Solicitado: </td>
							<td><input type='text' name='impte_soli' id='impte_soli'  readonly  value='$ ".number_format($impte_soli,2)."' size='20'>&nbsp;&nbsp;<input type='text' readonly name='moneda' id='moneda' value='MXN' size='5'></td>
						</tr>
						<tr>
							<td align='right' valign='middle' $bg>Importe en letra: </td>
							<td><textarea name='importelet' id='importelet' cols='50' rows='3' autocomplete='off' readonly style='max-height:50px;max-width:400px' >".convertir($impte_soli,$moneda)." MXN </textarea></td>
						</tr>";		
							}
				//CANTIDAD MXN, IMPORTE MXN
				elseif($comision_mxn !='0.00' && $comision_usd =='0.00' && $tc =='0.00' && $moneda == 'MXN' && $excedente_mxn == '0.00' && $excedente_usd == '0.00'){
					$importes ="
						<tr>
							<td align='right' valign='middle' $bg>Importe Solicitado: </td>
							<td><input type='text' name='impte_soli' id='impte_soli'  readonly  value='$ ".number_format($comision_mxn,2)."' size='20'>&nbsp;&nbsp;<input type='text' readonly name='moneda' id='moneda' value='".$moneda."' size='5'></td>
						</tr>
						<tr>
							<td align='right' valign='middle' $bg>Importe en letra: </td>
							<td><textarea name='importelet' id='importelet' cols='50' rows='3' autocomplete='off' readonly style='max-height:50px;max-width:400px' >".convertir($comision_mxn,$moneda).' '.$moneda."</textarea></td>
						</tr>";
				}
				//CANTIDAD USD, IMPORTE USD
				elseif($comision_mxn =='0.00' && $comision_usd !='0.00' && $tc =='0.00' && $moneda == 'USD' && $excedente_mxn == '0.00' && $excedente_usd == '0.00'){
					$importes ="
						<tr>
							<td align='right' valign='middle' $bg>Importe Solicitado: </td>
							<td><input type='text' name='impte_soli' id='impte_soli'  readonly  value='".number_format($comision_usd,2)."' size='20'>&nbsp;&nbsp;<input type='text' readonly name='moneda' id='moneda' value='".$moneda."' size='5'></td>
						</tr>
						<tr>
							<td align='right' valign='middle' $bg>Importe en letra: </td>
							<td><textarea name='importelet' id='importelet' cols='50' rows='3' autocomplete='off' readonly style='max-height:50px;max-width:400px' >".convertir($comision_usd,$moneda).' '.$moneda."</textarea></td>
						</tr>";
							}
		break;
		case 2://EXCEDENTE PAGO
	
				$concepto	= 'EXCEDENTE DE PAGO';
				
				//CANTIDAD USD, IMPORTE MXN, TIPO DE CAMBIO
				if($excedente_mxn !='0.00' && $excedente_usd !='0.00' && $tc !='0.00' && $moneda == 'MXN' && $comision_mxn =='0.00' && $comision_usd =='0.00'){
					$importes	="
						<tr>
							<td align='right' valign='middle' $bg>Tipo de Cambio: </td>
							<td><input type='text' name='tc' id='tc' readonly  value='$ ".$tc."' size='10'></td>
						</tr>
						<tr>
							<td align='right' valign='middle' $bg>Cantidad en USD: </td>
							<td><input type='text' name='impte_usd' id='impte_usd' readonly  value='".number_format($excedente_usd,2)."' size='20'></td>									
						</tr>
						<tr>
							<td align='right' valign='middle' $bg>Importe Solicitado: </td>
							<td><input type='text' name='impte_soli' id='impte_soli'  readonly  value='$ ".number_format($impte_soli,2)."' size='20'>&nbsp;&nbsp;<input type='text' readonly name='moneda' id='moneda' value='MXN' size='5'></td>
						</tr>
						<tr>
							<td align='right' valign='middle' $bg>Importe en letra: </td>
							<td><textarea name='importelet' id='importelet' cols='50' rows='3' autocomplete='off' readonly style='max-height:50px;max-width:400px' >".convertir($impte_soli,$moneda)." MXN </textarea></td>
						</tr>";		
				}
				//CANTIDAD MXN, IMPORTE MXN
				elseif($excedente_mxn !='0.00' && $excedente_usd =='0.00' && $tc =='0.00' && $moneda == 'MXN' && $comision_mxn =='0.00' && $comision_usd =='0.00'){
					$importes ="
						<tr>
							<td align='right' valign='middle' $bg>Importe Solicitado: </td>
							<td><input type='text' name='impte_soli' id='impte_soli'  readonly  value='$ ".number_format($excedente_mxn,2)."' size='20'>&nbsp;&nbsp;<input type='text' readonly name='moneda' id='moneda' value='".$moneda."' size='5'></td>
						</tr>
						<tr>
							<td align='right' valign='middle' $bg>Importe en letra: </td>
							<td><textarea name='importelet' id='importelet' cols='50' rows='3' autocomplete='off' readonly style='max-height:50px;max-width:400px' >".convertir($excedente_mxn,$moneda).' '.$moneda."</textarea></td>
						</tr>";
				}
				//CANTIDAD USD, IMPORTE USD
				elseif($excedente_mxn =='0.00' && $excedente_usd !='0.00' && $tc =='0.00' && $moneda == 'USD' && $comision_mxn =='0.00' && $comision_usd =='0.00'){
					$importes ="
						<tr>
							<td align='right' valign='middle' $bg>Importe Solicitado: </td>
							<td><input type='text' name='impte_soli' id='impte_soli'  readonly  value='".number_format($excedente_usd,2)."' size='20'>&nbsp;&nbsp;<input type='text' readonly name='moneda' id='moneda' value='".$moneda."' size='5'></td>
						</tr>
						<tr>
							<td align='right' valign='middle' $bg>Importe en letra: </td>
							<td><textarea name='importelet' id='importelet' cols='50' rows='3' autocomplete='off' readonly style='max-height:50px;max-width:400px' >".convertir($excedente_usd,$moneda).' '.$moneda."</textarea></td>
						</tr>";
				}
		break;
		case 3://COMISIÓN Y EXCEDENTE
				$concepto	= 'COMISIÓN DE AGENCIA Y EXCEDENTE DE PAGO';
						
				//CANTIDAD USD, IMPORTE MXN, TIPO DE CAMBIO
				if($excedente_mxn !='0.00' && $excedente_usd !='0.00' && $tc !='0.00' && $moneda == 'MXN' && $comision_mxn !='0.00' && $comision_usd !='0.00'){
					$importes	="
						<tr>
							<td align='right' valign='middle' $bg>Tipo de Cambio: </td>
							<td><input type='text' name='tc' id='tc' readonly  value='$ ".$tc."' size='10'></td>
						</tr>
						<tr>
							<td colspan='2' width='100%' align='center'>
							<table width='100%'>
								<tr>
									<td align='center' width='50%'  style='background: #0059b3;color: #FFF;text-shadow: #081E82 1px 1px;border-radius: 10px 0px 10px 0px;padding: 3px 5px;'>COMISIÓN AGENCIA</td>
									<td align='center' width='50%' style='background: #004d99;color: #FFF;text-shadow: #081E82 1px 1px;border-radius: 0px 10px 0px 10px;padding: 3px 5px;'>EXCEDENTE DE PAGO</td>								
								</tr>
								<tr>
									<td align='center' >
										<input type='text' name='comision_usd' id='comision_usd' readonly  value=".number_format($comision_usd,2)." size='20'>&nbsp;&nbsp;&nbsp;USD</td>
									<td align='center' >
										<input type='text' name='excedente_usd' id='excedente_usd' readonly  value=".number_format($excedente_usd,2)." size='20'>&nbsp;&nbsp;&nbsp;USD</td>
								</tr>
								<tr>
									<td align='center' >
										<input type='text' name='comision_mxn' id='comision_mxn' readonly  value='$ ".number_format($comision_mxn,2)."' size='20'>&nbsp;&nbsp;&nbsp;MXN</td>
									<td align='center' >
										<input type='text' name='excedente_mxn' id='excedente_mxn' readonly  value='$ ".number_format($excedente_mxn,2)."' size='20'>&nbsp;&nbsp;&nbsp;MXN</td>
								</tr>
							</table>
							</td>
						</tr>
						<tr>
							<td align='right' valign='middle' $bg>Importe Solicitado: </td>
							<td><input type='text' name='impte_soli' id='impte_soli'  readonly  value='$ ".number_format($impte_soli,2)."' size='20'>&nbsp;&nbsp;<input type='text' readonly name='moneda' id='moneda' value='MXN' size='5'></td>
						</tr>
						<tr>
							<td align='right' valign='middle' $bg>Importe en letra: </td>
							<td><textarea name='importelet' id='importelet' cols='50' rows='3' autocomplete='off' readonly style='max-height:50px;max-width:400px' >".convertir($impte_soli,$moneda)." MXN </textarea></td>
						</tr>";
				}
				//CANTIDAD MXN, IMPORTE MXN
				elseif($excedente_mxn !='0.00' && $excedente_usd =='0.00' && $tc =='0.00' && $moneda == 'MXN' && $comision_mxn !='0.00' && $comision_usd =='0.00'){
					$importes	="
						<tr>
							<td colspan='2' width='100%' align='center'>
								<table width='100%'>
									<tr>
										<td align='center' width='50%' style='background: #0059b3;color: #FFF;text-shadow: #081E82 1px 1px;border-radius: 10px 0px 10px 0px;padding: 3px 5px;'>COMISIÓN AGENCIA</td>
										<td align='center' width='50%' style='background: #004d99;color: #FFF;text-shadow: #081E82 1px 1px;border-radius: 0px 10px 0px 10px;padding: 3px 5px;'>EXCEDENTE DE PAGO</td>								
									</tr>
									<tr>
										<td align='center' ><input type='text' name='comision' id='comision_usd' readonly  value=".number_format($comision_mxn,2)." size='20'>&nbsp;&nbsp;&nbsp;".$moneda."</td>
										<td align='center' ><input type='text' name='excedente' id='excedente_usd' readonly  value=".number_format($excedente_mxn,2)." size='20'>&nbsp;&nbsp;&nbsp;".$moneda."</td>
									</tr>
								</table>
							</td>
						</tr>
						<tr>
							<td align='right' valign='middle' $bg>Importe Solicitado: </td>
							<td><input type='text' name='impte_soli' id='impte_soli'  readonly  value='$ ".number_format($impte_soli,2)."' size='20'>&nbsp;&nbsp;<input type='text' readonly name='moneda' id='moneda' value='".$moneda."' size='5'></td>
						</tr>
						<tr>
							<td align='right' valign='middle' $bg>Importe en letra: </td>
							<td><textarea name='importelet' id='importelet' cols='50' rows='3' autocomplete='off' readonly style='max-height:50px;max-width:400px' >".convertir($impte_soli,$moneda)." ".$moneda."</textarea></td>
						</tr>";
				}
				//CANTIDAD USD, IMPORTE USD
				elseif($excedente_mxn =='0.00' && $excedente_usd !='0.00' && $tc =='0.00' && $moneda == 'USD' && $comision_mxn =='0.00' && $comision_usd !='0.00'){
					$importes	="
						<tr>
							<td colspan='2' width='100%' align='center'>
								<table width='100%'>
									<tr>
										<td align='center' width='50%' style='background: #0059b3;color: #FFF;text-shadow: #081E82 1px 1px;border-radius: 10px 0px 10px 0px;padding: 3px 5px;'>COMISIÓN AGENCIA</td>
										<td align='center' width='50%' style='background: #004d99;color: #FFF;text-shadow: #081E82 1px 1px;border-radius: 0px 10px 0px 10px;padding: 3px 5px;'>EXCEDENTE DE PAGO</td>								
									</tr>
									<tr>
										<td align='center' ><input type='text' name='comision' id='comision_usd' readonly  value=".number_format($comision_usd,2)." size='20'>&nbsp;&nbsp;&nbsp;".$moneda."</td>
										<td align='center' ><input type='text' name='excedente' id='excedente_usd' readonly  value=".number_format($excedente_usd,2)." size='20'>&nbsp;&nbsp;&nbsp;".$moneda."</td>
									</tr>
								</table>
							</td>
						</tr>
						<tr>
							<td align='right' valign='middle' $bg>Importe Solicitado: </td>
							<td><input type='text' name='impte_soli' id='impte_soli'  readonly  value='$ ".number_format($impte_soli,2)."' size='20'>&nbsp;&nbsp;<input type='text' readonly name='moneda' id='moneda' value='".$moneda."' size='5'></td>
						</tr>
						<tr>
							<td align='right' valign='middle' $bg>Importe en letra: </td>
							<td><textarea name='importelet' id='importelet' cols='50' rows='3' autocomplete='off' readonly style='max-height:50px;max-width:400px' >".convertir($impte_soli,$moneda)." ".$moneda."</textarea></td>
						</tr>";		
				}
		break;
		case 4://SERV. NO PRESTADO OPER. AEREO
	
				$concepto	= 'SERVICIO NO PRESTADO OPERADOR AÉREO';

				//CANTIDAD USD, IMPORTE MXN, TIPO DE CAMBIO
				if($serv_usd !='0.00' && $serv_mxn !='0.00' && $tc !='0.00'  && $excedente_mxn =='0.00' && $excedente_usd =='0.00' && $moneda == 'MXN' && $comision_mxn =='0.00' && $comision_usd =='0.00' && $canc_mxn == '0.00' && $canc_usd == '0.00'){
							$importes	="
							<tr>
								<td align='right' valign='middle' $bg>Tipo de Cambio: </td>
								<td><input type='text' name='tc' id='tc' readonly  value='$ ".$tc."' size='10'></td>
							</tr>
							<tr>
								<td align='right' valign='middle' $bg>Cantidad en USD: </td>
								<td><input type='text' name='impte_usd' id='impte_usd' readonly  value='".number_format($serv_usd,2)."' size='20'></td>									
							</tr>
							<tr>
								<td align='right' valign='middle' $bg>Importe Solicitado: </td>
								<td><input type='text' name='impte_soli' id='impte_soli'  readonly  value='$ ".number_format($serv_mxn,2)."' size='20'>&nbsp;&nbsp;<input type='text' readonly name='moneda' id='moneda' value='MXN' size='5'></td>
							</tr>
							<tr>
								<td align='right' valign='middle' $bg>Importe en letra: </td>
								<td><textarea name='importelet' id='importelet' cols='50' rows='3' autocomplete='off' readonly style='max-height:50px;max-width:400px' >".convertir($serv_mxn,$moneda)." MXN </textarea></td>
							</tr>";		
				}
			
				//CANTIDAD MXN, IMPORTE MXN
				elseif($serv_usd =='0.00' && $serv_mxn !='0.00' && $tc =='0.00'  && $excedente_mxn =='0.00' && $excedente_usd =='0.00' && $moneda == 'MXN' && $comision_mxn =='0.00' && $comision_usd =='0.00' && $canc_mxn == '0.00' && $canc_usd == '0.00'){
					$importes ="
						<tr>
							<td align='right' valign='middle' $bg>Importe Solicitado: </td>
							<td><input type='text' name='impte_soli' id='impte_soli'  readonly  value='$ ".number_format($serv_mxn,2)."' size='20'>&nbsp;&nbsp;<input type='text' readonly name='moneda' id='moneda' value='".$moneda."' size='5'></td>
						</tr>
						<tr>
							<td align='right' valign='middle' $bg>Importe en letra: </td>
							<td><textarea name='importelet' id='importelet' cols='50' rows='3' autocomplete='off' readonly style='max-height:50px;max-width:400px' >".convertir($serv_mxn,$moneda).' '.$moneda."</textarea></td>
						</tr>";
				}
				
				//CANTIDAD USD, IMPORTE USD
				elseif($serv_usd =='0.00' && $serv_mxn !='0.00' && $tc =='0.00'  && $excedente_mxn =='0.00' && $excedente_usd =='0.00' && $moneda == 'USD' && $comision_mxn =='0.00' && $comision_usd =='0.00' && $canc_mxn == '0.00' && $canc_usd == '0.00'){
					$importes ="
						<tr>
							<td align='right' valign='middle' $bg>Importe Solicitado: </td>
							<td><input type='text' name='impte_soli' id='impte_soli'  readonly  value='".number_format($serv_usd,2)."' size='20'>&nbsp;&nbsp;<input type='text' readonly name='moneda' id='moneda' value='".$moneda."' size='5'></td>
						</tr>
						<tr>
							<td align='right' valign='middle' $bg>Importe en letra: </td>
							<td><textarea name='importelet' id='importelet' cols='50' rows='3' autocomplete='off' readonly style='max-height:50px;max-width:400px' >".convertir($serv_usd,$moneda).' '.$moneda."</textarea></td>
						</tr>";
				}
		break;
		case 5://SERV. NO PRESTADO OPER. TERRESTRE
							
				$concepto	= 'SERVICIO NO PRESTADO OPERADOR TERRESTRE';

				//CANTIDAD USD, IMPORTE MXN, TIPO DE CAMBIO
				if($serv_usd !='0.00' && $serv_mxn !='0.00' && $tc !='0.00'  && $excedente_mxn =='0.00' && $excedente_usd =='0.00' && $moneda == 'MXN' && $comision_mxn =='0.00' && $comision_usd =='0.00' && $canc_mxn == '0.00' && $canc_usd == '0.00'){
					$importes	="
						<tr>
							<td align='right' valign='middle' $bg>Tipo de Cambio: </td>
							<td><input type='text' name='tc' id='tc' readonly  value='$ ".$tc."' size='10'></td>
						</tr>
						<tr>
							<td align='right' valign='middle' $bg>Cantidad en USD: </td>
							<td><input type='text' name='impte_usd' id='impte_usd' readonly  value='".number_format($serv_usd,2)."' size='20'></td>									
						</tr>
						<tr>
							<td align='right' valign='middle' $bg>Importe Solicitado: </td>
							<td><input type='text' name='impte_soli' id='impte_soli'  readonly  value='$ ".number_format($serv_mxn,2)."' size='20'>&nbsp;&nbsp;<input type='text' readonly name='moneda' id='moneda' value='MXN' size='5'></td>
						</tr>
						<tr>
							<td align='right' valign='middle' $bg>Importe en letra: </td>
							<td><textarea name='importelet' id='importelet' cols='50' rows='3' autocomplete='off' readonly style='max-height:50px;max-width:400px' >".convertir($serv_mxn,$moneda)." MXN </textarea></td>
						</tr>";		
				}
			
				//CANTIDAD MXN, IMPORTE MXN
				elseif($serv_usd =='0.00' && $serv_mxn !='0.00' && $tc =='0.00'  && $excedente_mxn =='0.00' && $excedente_usd =='0.00' && $moneda == 'MXN' && $comision_mxn =='0.00' && $comision_usd =='0.00' && $canc_mxn == '0.00' && $canc_usd == '0.00'){
					$importes ="
						<tr>
							<td align='right' valign='middle' $bg>Importe Solicitado: </td>
							<td><input type='text' name='impte_soli' id='impte_soli'  readonly  value='$ ".number_format($serv_mxn,2)."' size='20'>&nbsp;&nbsp;<input type='text' readonly name='moneda' id='moneda' value='".$moneda."' size='5'></td>
						</tr>
						<tr>
							<td align='right' valign='middle' $bg>Importe en letra: </td>
							<td><textarea name='importelet' id='importelet' cols='50' rows='3' autocomplete='off' readonly style='max-height:50px;max-width:400px' >".convertir($serv_mxn,$moneda).' '.$moneda."</textarea></td>
						</tr>";
				}
				
				//CANTIDAD USD, IMPORTE USD
				elseif($serv_usd =='0.00' && $serv_mxn !='0.00' && $tc =='0.00'  && $excedente_mxn =='0.00' && $excedente_usd =='0.00' && $moneda == 'USD' && $comision_mxn =='0.00' && $comision_usd =='0.00' && $canc_mxn == '0.00' && $canc_usd == '0.00'){
					$importes ="
						<tr>
							<td align='right' valign='middle' $bg>Importe Solicitado: </td>
							<td><input type='text' name='impte_soli' id='impte_soli'  readonly  value='".number_format($serv_usd,2)."' size='20'>&nbsp;&nbsp;<input type='text' readonly name='moneda' id='moneda' value='".$moneda."' size='5'></td>
						</tr>
						<tr>
							<td align='right' valign='middle' $bg>Importe en letra: </td>
							<td><textarea name='importelet' id='importelet' cols='50' rows='3' autocomplete='off' readonly style='max-height:50px;max-width:400px' >".convertir($serv_usd,$moneda).' '.$moneda."</textarea></td>
						</tr>";
				}


		break;
		case 6://SERV. NO PRESTADO OPER. CRUCEROS

				$concepto	= 'SERVICIO NO PRESTADO OPERADOR CRUCEROS';
				//CANTIDAD USD, IMPORTE MXN, TIPO DE CAMBIO
				if($serv_usd !='0.00' && $serv_mxn !='0.00' && $tc !='0.00'  && $excedente_mxn =='0.00' && $excedente_usd =='0.00' && $moneda == 'MXN' && $comision_mxn =='0.00' && $comision_usd =='0.00' && $canc_mxn == '0.00' && $canc_usd == '0.00'){
					$importes	="
						<tr>
							<td align='right' valign='middle' $bg>Tipo de Cambio: </td>
							<td><input type='text' name='tc' id='tc' readonly  value='$ ".$tc."' size='10'></td>
						</tr>
						<tr>
							<td align='right' valign='middle' $bg>Cantidad en USD: </td>
							<td><input type='text' name='impte_usd' id='impte_usd' readonly  value='".number_format($serv_usd,2)."' size='20'></td>									
						</tr>
						<tr>
							<td align='right' valign='middle' $bg>Importe Solicitado: </td>
							<td><input type='text' name='impte_soli' id='impte_soli'  readonly  value='$ ".number_format($serv_mxn,2)."' size='20'>&nbsp;&nbsp;<input type='text' readonly name='moneda' id='moneda' value='MXN' size='5'></td>
						</tr>
						<tr>
							<td align='right' valign='middle' $bg>Importe en letra: </td>
							<td><textarea name='importelet' id='importelet' cols='50' rows='3' autocomplete='off' readonly style='max-height:50px;max-width:400px' >".convertir($serv_mxn,$moneda)." MXN </textarea></td>
						</tr>";		
				}
	
				//CANTIDAD MXN, IMPORTE MXN
				elseif($serv_usd =='0.00' && $serv_mxn !='0.00' && $tc =='0.00'  && $excedente_mxn =='0.00' && $excedente_usd =='0.00' && $moneda == 'MXN' && $comision_mxn =='0.00' && $comision_usd =='0.00' && $canc_mxn == '0.00' && $canc_usd == '0.00'){
					$importes ="
						<tr>
							<td align='right' valign='middle' $bg>Importe Solicitado: </td>
							<td><input type='text' name='impte_soli' id='impte_soli'  readonly  value='$ ".number_format($serv_mxn,2)."' size='20'>&nbsp;&nbsp;<input type='text' readonly name='moneda' id='moneda' value='".$moneda."' size='5'></td>
						</tr>
						<tr>
							<td align='right' valign='middle' $bg>Importe en letra: </td>
							<td><textarea name='importelet' id='importelet' cols='50' rows='3' autocomplete='off' readonly style='max-height:50px;max-width:400px' >".convertir($serv_mxn,$moneda).' '.$moneda."</textarea></td>
						</tr>";
				}
							
				//CANTIDAD USD, IMPORTE USD
				elseif($serv_usd !='0.00' && $serv_mxn =='0.00' && $tc =='0.00'  && $excedente_mxn =='0.00' && $excedente_usd =='0.00' && $moneda == 'USD' && $comision_mxn =='0.00' && $comision_usd =='0.00' && $canc_mxn == '0.00' && $canc_usd == '0.00'){
					$importes ="
						<tr>
							<td align='right' valign='middle' $bg>Importe Solicitado: </td>
							<td><input type='text' name='impte_soli' id='impte_soli'  readonly  value='".number_format($serv_usd,2)."' size='20'>&nbsp;&nbsp;<input type='text' readonly name='moneda' id='moneda' value='".$moneda."' size='5'></td>
						</tr>
						<tr>
							<td align='right' valign='middle' $bg>Importe en letra: </td>
							<td><textarea name='importelet' id='importelet' cols='50' rows='3' autocomplete='off' readonly style='max-height:50px;max-width:400px' >".convertir($serv_usd,$moneda).' '.$moneda."</textarea></td>
						</tr>";
				}
		break;
		case 7:
		break;
		case 8://CANCELACIÓN DE SERVICIO
						
				$concepto	= 'CANCELACIÓN DE SERVICIOS';
				//CANTIDAD USD, IMPORTE MXN, TIPO DE CAMBIO
				if($serv_usd =='0.00' && $serv_mxn =='0.00' && $tc !='0.00'  && $excedente_mxn =='0.00' && $excedente_usd =='0.00' && $moneda == 'MXN' && $comision_mxn =='0.00' && $comision_usd =='0.00' && $canc_mxn != '0.00' && $canc_usd != '0.00'){
							$importes	="
							<tr>
								<td align='right' valign='middle' $bg>Tipo de Cambio: </td>
								<td><input type='text' name='tc' id='tc' readonly  value='$ ".$tc."' size='10'></td>
							</tr>
							<tr>
								<td align='right' valign='middle' $bg>Cantidad en USD: </td>
								<td><input type='text' name='impte_usd' id='impte_usd' readonly  value='".number_format($canc_usd,2)."' size='20'></td>									
							</tr>
							<tr>
								<td align='right' valign='middle' $bg>Importe Solicitado: </td>
								<td><input type='text' name='impte_soli' id='impte_soli'  readonly  value='$ ".number_format($canc_mxn,2)."' size='20'>&nbsp;&nbsp;<input type='text' readonly name='moneda' id='moneda' value='MXN' size='5'></td>
							</tr>
							<tr>
								<td align='right' valign='middle' $bg>Importe en letra: </td>
								<td><textarea name='importelet' id='importelet' cols='50' rows='3' autocomplete='off' readonly style='max-height:50px;max-width:400px' >".convertir($canc_mxn,$moneda)." MXN </textarea></td>
							</tr>";		
				}
				//CANTIDAD MXN, IMPORTE MXN
				elseif($serv_usd =='0.00' && $serv_mxn =='0.00' && $tc =='0.00'  && $excedente_mxn =='0.00' && $excedente_usd =='0.00' && $moneda == 'MXN' && $comision_mxn =='0.00' && $comision_usd =='0.00' && $canc_mxn != '0.00' && $canc_usd == '0.00'){
					$importes ="
						<tr>
							<td align='right' valign='middle' $bg>Importe Solicitado: </td>
							<td><input type='text' name='impte_soli' id='impte_soli'  readonly  value='$ ".number_format($canc_mxn,2)."' size='20'>&nbsp;&nbsp;<input type='text' readonly name='moneda' id='moneda' value='".$moneda."' size='5'></td>
						</tr>
						<tr>
							<td align='right' valign='middle' $bg>Importe en letra: </td>
							<td><textarea name='importelet' id='importelet' cols='50' rows='3' autocomplete='off' readonly style='max-height:50px;max-width:400px' >".convertir($canc_mxn,$moneda).' '.$moneda."</textarea></td>
						</tr>";
				}
				
				//CANTIDAD USD, IMPORTE USD
				elseif($serv_usd =='0.00' && $serv_mxn =='0.00' && $tc =='0.00'  && $excedente_mxn =='0.00' && $excedente_usd =='0.00' && $moneda == 'USD' && $comision_mxn =='0.00' && $comision_usd =='0.00' && $canc_mxn == '0.00' && $canc_usd != '0.00'){
					$importes ="
						<tr>
							<td align='right' valign='middle' $bg>Importe Solicitado: </td>
							<td><input type='text' name='impte_soli' id='impte_soli'  readonly  value='".number_format($canc_usd,2)."' size='20'>&nbsp;&nbsp;<input type='text' readonly name='moneda' id='moneda' value='".$moneda."' size='5'></td>
						</tr>
						<tr>
							<td align='right' valign='middle' $bg>Importe en letra: </td>
							<td><textarea name='importelet' id='importelet' cols='50' rows='3' autocomplete='off' readonly style='max-height:50px;max-width:400px' >".convertir($canc_usd,$moneda).' '.$moneda."</textarea></td>
						</tr>";
				}
		break;
		default:
			require_once("views/denegado_view.phtml");
		break;
	}

	
?>