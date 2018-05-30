<?php

			$uploadDir 		= "../carta";
			$inputFileNam 	= trim($solicitud);
		 	$pdf= require_once('../funciones/upload_files.php');
		 	print_r($pdf);
			if ( $pdf == 'Archivo cargado'){
				echo  "<script>alert('¡Solicitud Cargada!');</script><meta http-equiv='refresh' content='0; url=../controllers/solicitud_controller.php?".$liga_mail."'>";
			}
			else{
				echo  "<script>alert('¡Error al cargar Solicitud!');</script><meta http-equiv='refresh' content='0; url=../controllers/solicitud_controller.php?".$liga."'>";
			}		

?>