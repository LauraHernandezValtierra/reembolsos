<?php
require_once("../controllers/reembolsos_controller.php");

$banco=$_POST['banco'];
$sucursal=$_POST['Sucursal'];
$cuenta=$_POST['Cuenta'];
$clabe=$_POST['Clabe'];
$beneficiario=$_POST['Beneficiario'];
$correo=$_POST['Correo'];
$identificacion="";
if($tcliente=='D'){
	$identificacion=$_POST['archivo[]'];
}

$observaciones=$_POST['Observaciones'];



?>
