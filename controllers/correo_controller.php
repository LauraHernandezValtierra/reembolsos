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
	$data=$up->updateSolicitud($expediente, $nconsolidado, $estatus, $archivo, $fproceso);
	if($data){
		generaPapeleta($expediente,$nconsolidado,$solicitud,$concepto);
		require_once('../views/solicitudCompletada_view.phtml');
					
	}else{
		require_once('../views/error_view.phtml');
	}
?>