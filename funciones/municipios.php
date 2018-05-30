<?php 
//include($_SERVER['DOCUMENT_ROOT'].'/php/webserver.php');	
require_once("../db/db.php");
	require_once('../models/municipios_model.php');
	
	$edos=$_GET['edo'];
	
	$per=new municipios_model();
	$municipios=$per->get_municipios();
	$html= "<option value='0'>Seleccionar Municipio</option>";
	
	foreach($municipios as $municipio=>$muni) {
							$municipio= $muni['municipio'];
							$estado=$muni['estado'];
		if($estado ==$edos){
			$html.= "<option value='".$municipio."'>".$municipio."</option>";
		}
	
		
	
	}
	echo $html;
?>