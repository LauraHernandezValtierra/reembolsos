<?php
switch($tipo){
		case '1';
			$concepto	= 'COMISIÓN DE AGENCIA';
		break;
		case '2';
			$concepto	= 'EXCEDENTE DE PAGO';
		break;
		case '3';
			$concepto	= 'COMISIÓN DE AGENCIA Y EXCEDENTE DE PAGO';
		break;
		case '4': 
			$concepto	= 'SERVICIO NO PRESTADO: OPERADOR AÉREO';
		break;			
		case '5':
			$concepto	= 'SERVICIO NO PRESTADO: OPERADOR TERRESTRE';
		break;			
		case '6':
			$concepto	= 'SERVICIO NO PRESTADO: OPERADOR CRUCEROS';
		break;	
		case '8':
			$concepto	= 'CANCELACIÓN DE SERVICIOS';
		break;		
	}

?>