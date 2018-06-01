<?php

require_once("../models/reembolsos_model.php");
require_once("../funciones/funciones.php");
require_once("../db/db.php");
require_once("../funciones/fecha.php");
require_once("../views/head_view.phtml");


	if($_POST){


		$action  = $_POST['action'];
		$expediente=$_POST['expediente'];
		$nconsolidado=$_POST['nconsolidado'];
		
		include('../controllers/reembolsos_controller.php');
		if (isset($datos)) {
		


		if($action=='Enviar Datos' || $action=='Imprimir Solicitud'){
			$seccion = $_POST['secc'];
			if($seccion == 1){

				require_once("../views/head_view.phtml");
				require_once("../controllers/confirmarDatos_controller.php");
			}
			elseif($seccion == 2){

				require_once("../controllers/guardarSolicitud_controller.php");
			
					
			}
		}
		elseif($action=='Corregir Datos'){
			require_once("../controllers/importes_controller.php");
			require_once("../controllers/conceptos_controller.php");
				require_once("../views/head_view.phtml");
				require_once("../views/corregirDatos_view.phtml");
		}
		elseif($action=='Subir Carta'){
				require_once('../controllers/cargarCarta_controller.php');
		}
		elseif($action == 'Subir Archivo'){
			include('../controllers/reembolsos_controller.php');
				require_once('../controllers/guardarCarta_controller.php');

		}
		elseif($action == 'ENVIAR'){
			
			include('../controllers/reembolsos_controller.php');
				require_once('../controllers/guardaFiscales_controller.php');
		}
		elseif($action == 'Cargar Carta'){
				include('cartaSube.php');
		}
	}else{
		require_once("../views/denegado_view.phtml");
	}

}else{
	decode_($_SERVER["REQUEST_URI"]);
	if($_GET){
		if(isset($_GET['mail'])){
			$expediente	= strtoupper($_GET['expe']);
			$nconsolidado	= $_GET['id'];
			include('../controllers/reembolsos_controller.php');
			if($estatus=='A' &&  $archivo == 'S'){
				require_once("../views/completo_view.phtml");
			}else{
			
			require_once("../controllers/conceptos_controller.php");
			require_once('../controllers/correo_controller.php');
			}
		}
		else{
			$expediente	= strtoupper($_GET['expe']);
			$nconsolidado	= $_GET['id'];

			include('../controllers/reembolsos_controller.php');
			if($estatus=='A' &&  $archivo == 'S'){
				require_once("../views/completo_view.phtml");
			}else{
				require_once('../controllers/cargarCarta_controller.php');
			}
			
		}
	}else{


		require_once("../views/denegado_view.phtml");
	}
}

require_once("../views/footer_view.phtml");	
?>