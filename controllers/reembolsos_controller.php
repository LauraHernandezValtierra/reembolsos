<?php
require_once("../models/reembolsos_model.php");
require_once("../funciones/funciones.php");
require_once("../db/db.php");
$cid_expediente=$_POST['cid_expediente'];
$nconsolidado=$_POST['nconsolidado'];

$per=new reembolsos_model();
		$datos=$per->consulta_reembolso($cid_expediente, $nconsolidado);
	 		if (isset($datos)) {
	 			$cancelado		= $datos['cancelado'];		
					$cid_expediente	= $datos['cid_expediente'];
					$cid_cliente	= $datos['cid_cliente'];
					$cliente		= $datos['ncliente'];
					$nconsolidado	= $datos['nconsolidado'];
					$pax_principal	= $datos['pax_principal'];
					$paquete		= $datos['cdestpack'];
					$fsalida		= $datos['fsalida'];
					$correo			= $datos['mail'];
					$impte_soli		= $datos['impte_soli'];
					$tc				= $datos['tc'];
					$tipo			= $datos['concepto'];
					$comision_mxn	= $datos['comision_mxn']; // COMISION AGENCIA MXN
					$comision_usd	= $datos['comision_usd']; // COMISION AGENCIA USD
					$excedente_mxn	= $datos['excedente_mxn']; // EXCEDENTE DE PAGO MXN
					$excedente_usd	= $datos['excedente_usd']; // EXCEDENTE DE PAGO USD
					$serv_mxn		= $datos['serv_mxn'];	//SERVICIOS NO PRESTADOS MXN
					$serv_usd		= $datos['serv_usd']; //SERVICIOS NO PRESTADOS USD
					$canc_usd		= $datos['canc_usd']; //CANCELACIÓN DE SERVICIOS USD
					$canc_mxn		= $datos['canc_mxn']; //CANCELACIÓN DE SERVICIOS MXN		
					$moneda			= $datos['moneda'];
					$ejecutivo		= $datos['ejecutivo'];
					$observaciones	= $datos['observaciones'];
					$proc			= $datos['proc'];
					$estatus		= $datos['estatus'];
					$archivo		= $datos['archivo'];
					$fproceso		= $datos['fproceso'];
					$hora			= strstr($fproceso,' ');
					$hora			= substr($hora,0,-3);
					$fproceso		= strstr($fproceso,' ',true);
					$fiscales		= $datos['fiscales'];
					$identificacion	= $datos['identificacion'];	
					$tcliente		= $datos['tcliente'];
					$n_fiscales		= $datos['n_fiscales'];
					$id_rmbo		= $datos['id_rmbo'];

				
					
			

}
echo "hola2";
?>