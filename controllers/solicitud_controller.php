<?php
	if($_POST){
		$seccion = $_POST['secc'];
		$action  = $_POST['action'];
		
		
		if($action=='Enviar Datos' || $action=='Imprimir Solicitud'){
			if($seccion == 1){
				include('if.php'); 
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


	
?>