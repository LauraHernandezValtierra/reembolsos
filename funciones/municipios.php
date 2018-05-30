<?php 
//include($_SERVER['DOCUMENT_ROOT'].'/php/webserver.php');	
include('db/db.php');
	require_once('models/municipios_model.php');

	//$edos=$_GET['edo'];
	$edos = $_POST['edo'];
	$per=new municipios_model();
	$municipios=$per->get_municipios();
	$html= "<option value='0'>Seleccionar Municipio</option>";
	
	foreach($municipios as $municipio=>$muni) {
							$municipio= $muni['municipio'];
							$estado=$muni['estado'];
		if($estado ==$edos)
	{
		$html.= "<option value='".$municipio."'>".$municipio."</option>";
	}


	/*$busqueda 	= "select municipio from municipios where estado='".$_GET['edo']."'";
	$res		= mysqli_query($conx, $busqueda);
	if (mysqli_num_rows($res) > 0) {
		echo "<option value=''>SELECCIONA TU MUNICIPIO</option>";
			while($row = mysqli_fetch_assoc($res)) {
				echo "<option value='".$row['municipio']."'>".$row['municipio']."</option>";
			}
		} 
	else{
		echo "<option selected='selected'>".$busqueda."</option>";
		}*/
	}
echo $html;
?>