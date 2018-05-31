<?php
require_once("../models/reembolsos_model.php");
require_once("../funciones/funciones.php");
require_once("../db/db.php");
$up=new reembolsos_model();
				$correo 		=  htmlspecialchars(trim(strtoupper($_POST['Correo'])));
				$banco 			=  htmlspecialchars(trim(strtoupper($_POST['banco'])));
				$sucursal 		=  htmlspecialchars(trim(strtoupper($_POST['Sucursal'])));
				$cuenta 		=  $_POST['Cuenta'];
				$clabe 			=  htmlspecialchars(trim(strtoupper($_POST['Clabe'])));
				$Beneficiario 	=  htmlspecialchars(trim(strtoupper($_POST['Beneficiario'])));
				$observacion	=  htmlspecialchars(trim(strtoupper($_POST['Observaciones'])));

				$proc 			= 'S';
				$estatus		= 'D';
				$archivo		= 'N';
				$identificacion	= 'S';
				$fproceso		= date('Y-m-d H:i:s');
				
				if($tcliente=='A'){
					
					$data=$up->updateReembolsoA($expediente, $nconsolidado, $correo, $banco, $sucursal, $cuenta, $clabe, $Beneficiario, $proc, $estatus, $archivo,$fproceso, $observacion);
					if($data){
						
						$id		= "expe=".$expediente.'&id='.$nconsolidado;
						header('Location:../controllers/generaCarta_controller.php?'.$id.'');
					}else{
						require_once('../views/error_view.phtml');
					}
					
				}elseif($tcliente=='D'){

					$data=$up->updateReembolsoD($expediente, $nconsolidado, $correo, $banco, $sucursal, $cuenta, $clabe, $Beneficiario, $identificacion, $proc, $estatus, $archivo,$fproceso, $observacion);
					if($data){
						$id		= "expe=".$expediente.'&id='.$nconsolidado;
						header('Location:../controllers/generaCarta_controller.php?'.$id.'');
					}else{
						require_once('../views/error_view.phtml');
					}
				}





?>
