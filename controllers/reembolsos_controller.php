<?php
require_once("../models/reembolsos_model.php");
require_once("../funciones/funciones.php");
require_once("../db/db.php");

$per=new reembolsos_model();
		$datos=$per->consulta_reembolso($expediente, $nconsolidado);
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
					$observaciones	= $datos['n_observaciones'];
					$banco			= $datos['n_banco'];
					$sucursal		= $datos['n_sucursal'];
					$no_cuenta		= $datos['n_cuenta'];
					$beneficiario	= $datos['n_beneficiario'];
					if($beneficiario == ''){
						$beneficiario = $cliente;
					}                       
					$clabe			= $datos['n_clabe'];
					$mail			= $datos['n_mail'];
					$solicitud		= $datos['cid_solicitud'];
					$nom_empresa	= $datos['nom_empresa'];
					$contacto		= $datos['contacto'];
					$fecha			=trim(strchr($datos['fproceso']," ",true));

					$bg	= "style='background:#0077b3;color: #FFF;text-shadow: #081E82 1px 1px;border-radius: 10px 0px 0px 10px;padding: 3px 3px;'";
					$bg2 = "style='background:#173a6a;color: #FFF;text-shadow: #081E82 1px 1px;border-radius: 10px 0px 0px 10px;padding: 3px 3px;'";

					$id		= "expe=".$expediente.'&id='.$nconsolidado;
					$liga			= "expe=".$expediente."&id=".$nconsolidado;
					$liga_mail		= "expe=".$expediente."&id=".$nconsolidado."&mail=1";


					
			

}else{
		require_once("../views/denegado_view.phtml");
		exit;
}

?>