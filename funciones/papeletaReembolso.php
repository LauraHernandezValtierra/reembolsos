<?php 
function generaPapeleta($cid_expediente,$nconsolidado,$cid_solicitud,$concepto){
# Cargamos la librería dompdf.
require_once $_SERVER['DOCUMENT_ROOT'].'/php/dompdf/dompdf_config.inc.php';
	include('php/conversor.php');
 
 
 $SQL			= "SELECT * FROM reembolsos_web		
			WHERE cid_expediente = '".$cid_expediente."' AND nconsolidado = '".$nconsolidado."' AND cid_solicitud='".			$cid_solicitud."'";	
				
				$result 		= mysqli_query($conx, $SQL);
				$row 			= mysqli_fetch_assoc($result);
				$cid_expediente	= $row['cid_expediente'];
				$cid_cliente	= $row['cid_cliente'];
				$nconsolidado	= $row['nconsolidado'];
				$pax_principal	= $row['pax_principal'];
				$paquete		= $row['cdestpack'];
				$fsalida		= $row['fsalida'];
				$impte_soli		= $row['impte_soli'];
				$tc				= $row['tc'];
				$moneda			= $row['moneda'];
				$ejecutivo		= $row['ejecutivo'];
				$observaciones	= $row['observaciones'];
				$proc			= $row['proc'];
				$estatus		= $row['estatus'];
				$archivo		= $row['archivo'];
				$fproceso		= $row['fproceso'];
				$hora			= strstr($fproceso,' ');
				$hora			= substr($hora,0,-3);
				$fproceso		= strstr($fproceso,' ',true);
				$fiscales		= $row['fiscales'];
				$impte_letras	= convertir($impte_soli,$moneda);
# Contenido HTML del documento que queremos generar en PDF.
$html= "
<html>
<head>
<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
<title>Untitled Document</title>
<style>
	body{
margin: -4mm -4mm -4mm -4mm;
}

.titulos{
text-decoration:underline;
font-weight:bolder;
font-family:'Courier New',Courier, monospace;
font-size:16px;
}
.stitulo{
font-family:'Courier New',Courier, monospace; 
font-size:18px;
font-weight:bolder;
}
.fijos{
font-family:'Courier New',Courier, monospace; 
font-size:13px;
}
.variantes{
font-family:Tahoma, Geneva, sans-serif;
font-size:11px;
}
#solicitud{
border:1px solid;
}
#solicitud td{
border-top:hidden;
border-right:hidden;
border-left:hidden;
border-bottom:hidden;
}
</style>
</head>

<body>
<table width='100%' height='322' cellpadding='0' cellspacing='0' id='solicitud' style='background:url(FONDO.png) center no-repeat;' >
	<tr>
		<td height='16' colspan='6' align='center' class='stitulo'>SOLICITUD DE REEMBOLSO</td>
	</tr>
	<tr>
		<td height='16' colspan='6' align='left' style='border-top:1px solid' >&nbsp;&nbsp;&nbsp;&nbsp;<span class='titulos' >COMPROBANTE QUE SOLICITA</span></td>
	</tr>
	<tr>
		<td width='18%'  align='right' height='19' class='fijos'>SOLICITUD:</td>
		<td width='15%' align='left' class='variantes'>".$cid_solicitud."</td>
		<td width='6%' align='right' class='fijos'>CONCEPTO:</td>
		<td width='29%' align='left' class='variantes'>".$concepto."</td>
		<td width='8%' align='right' class='fijos'>EXPEDIENTE:</td>
		<td width='24%' align='left' class='variantes'>".$cid_expediente."</td>				
	</tr>
	<tr>
		<td class='fijos' align='right'>DOCTO. SOPORTE:</td>
		<td class='variantes' align='left' colspan='2'> CARTA SOL. REEMBOLSO</td>
		<td align='right' class='fijos'>FECHA:</td>
		<td class='variantes' colspan='2'>".$fecha." ".$hora."</td>
	</tr>
	<tr>
		<td height='15' align='right' class='fijos'>IMPORTE:</td>
		<td align='center' colspan='2' class='variantes'>".$impte_soli." ".$moneda."</td>
		<td align='left' colspan='3' class='variantes'>".$impte_letras."</td>
	</tr>
	<tr>
		<td height='15' colspan='6' align='left'  style='border-top:1px solid' >&nbsp;&nbsp;&nbsp;&nbsp;<span class='titulos' >INFORMACION GENERAL DE LA VENTA</span></td>
	</tr>	
	<tr>
		<td width='18%'  align='right' height='15' class='fijos'>VENTAS:</td>
		<td width='15%' align='left' class='variantes'>".$ejec."</td>
		<td width='6%' align='right' class='fijos'>SALIDA:</td>
		<td width='29%' align='left' class='variantes'>".$fsalida."</td>
		<td width='8%' align='right' class='fijos'>T.C.C:</td>
		<td width='24%' align='left' class='variantes'>".$tc."</td>				
	</tr>
	<tr>
		<td width='18%'  align='right' height='15' class='fijos'>CLIENTE:</td>
		<td align='left' class='variantes' colspan='2'>".$cliente."</td>
		<td align='right' class='fijos'>TIPO DE VENTA:</td>
		<td align='left' colspan='2' class='variantes'>".$tventa."</td>				
	</tr>	
	<tr>
		<td width='18%' height='19'  align='right' class='fijos'>PAX:</td>
		<td align='left' class='variantes' colspan='2'>".$pax."</td>
		<td width='29%' align='right' class='fijos'>CONTACTO:</td>
		<td align='left' colspan='2' class='variantes'>".$contacto."</td>				
	</tr>			
	<tr>
		<td width='18%'  align='right' height='19' class='fijos'>PROGRAMA:</td>
		<td align='left' class='variantes' colspan='2'>".$programa."</td>
		<td align='center' colspan='3' class='variantes'>".$ncliente."</td>
	</tr>
	<tr>
		<td height='16' colspan='6' align='left' style='border-top:1px solid' >&nbsp;&nbsp;&nbsp;&nbsp;<span class='titulos' >INFORMACION FISCAL DEL CLIENTE</span></td>
	</tr>		
	<tr>
		<td height='19' align='right' class='fijos'>RAZON FISCAL:</td>
		<td align='left' class='variantes' colspan='2'>".$rfiscal."</td>
		<td align='right' class='fijos'>RFC:</td>
		<td align='left' colspan='2' class='variantes'>".$rfc."</td>		
	</tr>	
	<tr>
		<td height='19' align='right' class='fijos'>DOMICILIO:</td>
		<td align='left' class='variantes' colspan='2'>".$domicilio."</td>
		<td align='right' class='fijos'>C.P.:</td>
		<td align='left' colspan='2' class='variantes'>".$cp."</td>		
	</tr>	
	<tr>
		<td height='19' align='right' class='fijos'>COLONIA:</td>
		<td align='left' class='variantes' colspan='2'>".$colonia."</td>
		<td align='right' class='fijos'></td>
		<td align='left' colspan='2' class='variantes'></td>		
	</tr>	
	<tr>
		<td align='right' class='fijos'>MUN/DEL.:</td>
		<td align='left' class='variantes' colspan='2'>".$municipio."</td>
		<td></td>
		<td></td>	
		<td></td>			
	</tr>	
	<tr>
		<td align='right' class='fijos'>ESTADO:</td>
		<td align='left' class='variantes' colspan='2'>".$estado."</td>
		<td></td>
		<td></td>
		<td></td>				
	</tr>	
	<tr>
		<td align='right' class='fijos'>OBSERVACIONES:</td>
		<td align='left' class='variantes' colspan='3'>".$observaciones."</td>
		<td></td>
		<td></td>					
	</tr>
	<tr>
		<td height='16' colspan='6' align='left'  style='border-top:1px solid' >&nbsp;&nbsp;&nbsp;&nbsp;<span class='titulos' >DATOS PARA EL PAGO</span></td>
	</tr>
	<tr>
		<td height='19' align='right' class='fijos'>BENEFICIARIO:</td>
		<td align='left' class='variantes' colspan='2'>".$beneficiario."</td>
		<td align='right' class='fijos' colspan='2'>CVE. INTERBANCARIA:</td>
		<td align='left' class='variantes'>".$clabe."</td>				
	</tr>	
	<tr>
		<td height='15' align='right' class='fijos'>BANCO:</td>
		<td align='left' class='variantes'>".$banco."</td>
		<td align='right' class='fijos'>CUENTA:</td>
		<td align='left' class='variantes'>".$cuenta."</td>
		<td align='right' class='fijos'>SUCURSAL:</td>
		<td align='left' class='variantes'>".$sucursal."</td>		
	</tr>														
</table>
</body>
</html>";

/*$codigo		= utf8_decode($html);
$descarga	= new DOMPDF();
$descarga->set_paper("A4", "portrait");
$descarga->load_html($codigo);
ini_set("memory_limit","32M");
$descarga->render();
$descarga->stream($cid_solicitud.".pdf");*/


$codigo	= utf8_decode($html);
$dompdf	= new DOMPDF();
$dompdf->set_paper("A4", "portrait");
$dompdf->load_html($codigo);
ini_set("memory_limit","32M");
$dompdf->render();
$pdf = $dompdf->output();
file_put_contents("solicitudes/".$cid_solicitud.".pdf", $pdf);
//file_put_contents("solicitudes/pruueba_b.pdf", $pdf);
}
?>