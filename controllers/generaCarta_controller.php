<?php
require_once("../funciones/funciones.php");
require_once("../db/db.php");
require_once("../models/reembolsos_model.php");

 set_time_limit ( 720 );
decode_($_SERVER["REQUEST_URI"]);//funciones/funciones.php



	if(isset($_GET['expe']) && isset($_GET['id'])){
				$cad=strtoupper($_GET['id']);
				$c=explode('%', $cad);
				$expediente	= strtoupper($_GET['expe']);
				$nconsolidado	= $c[0];
				include('../controllers/reembolsos_controller.php');
				if (isset($datos)) {
		
					require_once("../controllers/importes_controller.php");
					require_once("../views/carta_view.phtml");

					}
		}	
?>