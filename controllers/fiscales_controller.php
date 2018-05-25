<?php
		if($fiscales=='' && $tcliente == 'A' && $n_fiscales == ''){ //SIN DATOS FISCALES
			$main="";
			require_once("views/datosFiscales_view.phtml");
		}
		elseif($fiscales!='' || $n_fiscales!=''){ //CON DATOS FISCALES
			$credencial="";
			
				
				require_once("views/datosReembolso_view.phtml");
			
}
			


?>