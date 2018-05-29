<?php
require_once("../models/reembolsos_model.php");
require_once("../funciones/funciones.php");
require_once("../db/db.php");

$up=new reembolsos_model();

	$cid_cliente	= htmlspecialchars(trim(strtoupper($_POST['cid_cliente'])));
	$expediente			= htmlspecialchars(trim(strtoupper($_POST['expediente'])));
	$nconsolidado	= htmlspecialchars(trim(strtoupper($_POST['nconsolidado'])));
	$vrazon			= htmlspecialchars(trim(strtoupper($_POST['vrazon'])));
	$vdomicilio		= htmlspecialchars(trim(strtoupper($_POST['vdomicilio'])));
	$vcolonia		= htmlspecialchars(trim(strtoupper($_POST['vcolonia'])));
	$cmunicipio		= htmlspecialchars(trim(strtoupper($_POST['cmunicipio'])));
	$vcp			= htmlspecialchars(trim(strtoupper($_POST['vcp'])));
	$rfc			= htmlspecialchars(trim(strtoupper($_POST['rfc']))); 
	$vtelefono		= htmlspecialchars(trim(strtoupper($_POST['vtelefono'])));
	$cestado		= htmlspecialchars(trim(strtoupper($_POST['cestado'])));
	$observ			= htmlspecialchars(trim(strtoupper($_POST['observ'])));

	$fiscales		= $vrazon.'§'.$vdomicilio.'§'.$vcolonia.'§'.$cmunicipio.'§'.$cestado.'§'.$vcp.'§'.$rfc.'§'.$vtelefono;

	$data=$up->updateFiscales($expediente, $nconsolidado, $fiscales);
					if($data){
						
						$uploadDir 			= "../rfc";
						$inputFileNam 		= trim($cid_cliente);
						$pdf = include('../funciones/upload_files.php');
						$id		= "expe=".$expediente.'&id='.$nconsolidado;

						echo "<meta http-equiv='refresh' content='0; url=principal_controller.php?$id>";
			}
					else{
						
						require_once('../views/error_view.phtml');
					}


?>