<?php

require_once("../models/reembolsos_model.php");
require_once("../funciones/funciones.php");
require_once("../db/db.php");

	if($_POST){

		$seccion = $_POST['secc'];
		$action  = $_POST['action'];
		$expediente=$_POST['expediente'];
		$nconsolidado=$_POST['nconsolidado'];
		$per=new reembolsos_model();
		$datos=$per->consulta_reembolso($expediente, $nconsolidado);
	 		if (isset($datos)) {
	 			$cancelado		= $datos['cancelado'];		
					
					$cid_cliente	= $datos['cid_cliente'];
					$cliente		= $datos['ncliente'];
					
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

		if($action=='Enviar Datos' || $action=='Imprimir Solicitud'){
			if($seccion == 1){
				require_once("../views/head_view.phtml");
				require_once("../controllers/confirmarDatos_controller.php");
			}
			elseif($seccion == 2){
				require_once("../controllers/guardarSolicitud_controller.php");
			
					
			}
		}
		elseif($action=='Corregir Datos'){
				include('corregir.php');
		}
		elseif($action=='Subir Carta'){
				include('carga.php');
		}
		elseif($action == 'Subir Archivo'){
				include('sube.php');
		}
		elseif($action == 'ENVIAR'){
				include('guardafiscal.php');
		}
		elseif($action == 'Cargar Carta'){
				include('cartaSube.php');
		}
	}

}
	
?>