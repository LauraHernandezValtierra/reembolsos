<?php
require_once("../funciones/funciones.php");
require_once("../db/db.php");
require_once("../models/reembolsos_model.php");

decode_($_SERVER["REQUEST_URI"]);//funciones/funciones.php



	if(isset($_GET['expe']) && isset($_GET['id'])){
				$cad=strtoupper($_GET['id']);
				$c=explode('%', $cad);
				$cid_expediente	= strtoupper($_GET['expe']);
				$nconsolidado	= $c[0];
		$per=new reembolsos_model();
		$datos=$per->consulta_reembolso($cid_expediente, $nconsolidado);
	 		if (isset($datos)) {
	 				$cid_expediente	= $datos['cid_expediente'];
					$nconsolidado	= $datos['nconsolidado'];
					$cid_solicitud	= $datos['cid_solicitud'];
					$pax_principal	= $datos['pax_principal'];
					$paquete		= $datos['cdestpack'];
					$fsalida		= $datos['fsalida'];
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
					$observaciones	= $datos['n_observaciones'];
					$banco			= $datos['n_banco'];
					$sucursal		= $datos['n_sucursal'];
					$no_cuenta		= $datos['n_cuenta'];
					$beneficiario	= $datos['n_beneficiario'];
					$clabe			= $datos['n_clabe'];
					$fecha			= trim(strchr($datos['fproceso']," ",true));
					//$dfecha			= volteaFecha($fecha,'-','/');
					//$fechaexp		= explode('/',$dfecha);
					//	$fecha			= strtoupper($fechaexp[0] ." de ". $arrayMeses[$fechaexp[1]-1]."del ". $fechaexp[2].".");	
					}
		}	
			?>