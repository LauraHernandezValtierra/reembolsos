<?php
				$correo 		=  htmlspecialchars(trim(strtoupper($_POST['Correo'])));
				$banco 			=  htmlspecialchars(trim(strtoupper($_POST['banco'])));
				$sucursal 		=  htmlspecialchars(trim(strtoupper($_POST['Sucursal'])));
				$cuenta 		=  $_POST['Cuenta'];
				$clabe 			=  htmlspecialchars(trim(strtoupper($_POST['Clabe'])));
				$Beneficiario 	=  htmlspecialchars(trim(strtoupper($_POST['Beneficiario'])));
				$observacion	=  htmlspecialchars(trim(strtoupper($_POST['Observaciones'])));
				
				require_once("../views/confirmarDatos_view.phtml");
