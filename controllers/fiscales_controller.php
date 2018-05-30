<?php

		if($fiscales=='' && $tcliente == 'A' && $n_fiscales == ''){ //SIN DATOS FISCALES
			$main="";
			require_once("funciones/estado.php");
			//include("funciones/municipios.php");
			require_once("db/db.php");
			require_once("views/datosFiscales_view.phtml");
		}
		elseif($fiscales!='' || $n_fiscales!=''){ //CON DATOS FISCALES
			$credencial="";
			
				if($proc == 'S' && $estatus == 'D' && $archivo == 'N'){
					require_once("views/head_view.phtml");
					require_once("views/procesoPendiente1_view.phtml");
				}
				else{
					require_once("controllers/datosReembolso_controller.php");

				}
				
			
}
			


?>