<?php 
//include($_SERVER['DOCUMENT_ROOT'].'/php/webserver.php');	
require_once('models/estados_model.php');
$per=new estados_model();
$estados=$per->get_estados();

	
	/*if (mysqli_num_rows($res) > 0) {
    	while($row = mysqli_fetch_assoc($res)) {
    		
        	$select.= "<option value='".$row['estado']."'>".$row['estado']."</option>";
    	}
	} 
	else {
		$select.= "<option selected='selected'>Presiona la tecla f5</option>";
	}*/
?>