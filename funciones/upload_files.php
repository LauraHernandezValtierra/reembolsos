<?php
function moveFiles($files, $uploadDirectory, $nombrearch)
{
    //print_r($files); exit;
	$inputFileName = "archivo"; //nombre del Input origen (ejemplo name="archivo[]" --tomar solo--> archivo
//	$uploadDirectory = "subidas"; //ubicacion y nombre del directorio donde se guarda
    $fileLocations = array();
    $validExtensions = array('pdf'); //extensiones permitidas
	//$validExtensions =  array('pdf','jpeg','jpg','png','gif');
 
     if (file_exists($uploadDirectory) && is_writable($uploadDirectory)) { //comprueba si el directorio existe y si es posible escribir
        if (isset($files[$inputFileName]["error"])) {
            foreach ($files[$inputFileName]["error"] as $key => $error) {
                if ($error == 0) {
                    $pieces = explode(".", $files[$inputFileName]["name"][$key]); //obtenemos la extensiÃ³n
                    $extension = strtolower(end($pieces)); //la pasamos a minuscula

                    $validFileExtension = false;
                    foreach ($validExtensions as $type) { //comprobamos que sea una extensiÃ³n permitida
                        if ($type == $extension) {
                            $validFileExtension = true;
                        }
                    }

                    if ($validFileExtension) { //si el archivo es valido lo intentamos mover
                        $fileName = str_replace(' ', '_',$nombrearch) . "." . $extension; //generamos un nombre personalizable
                        $currentLocation = $files[$inputFileName]["tmp_name"][$key]; //ubicacion original y temporal del archivo
                        if (!move_uploaded_file($currentLocation, "$uploadDirectory/$fileName")) {
                           echo "No se puede mover el archivo \n";
                        } else {
                            $fileLocations[] = $fileName;
                        }
                    } else {
                        echo "Extension de archivo no valida \n";
                    }
                } else {
                    if ($error != 0 and $error != 4) { //Si no subieron archivos No enviar ninguna advertencia
                        $errorMessage = getErrorMessage($files[$inputFileName]["error"][$key]);
                       echo $errorMessage . " Intente nuevamente. \n";
                        die;
                    }
                }
            }
            return $fileLocations;
        } //fin del existe error
        else {
            echo "Uno de los archivos sobrepasa la capacidad establecida por el servidor";
        }
    } else {
        echo "No existe la carpeta para subir archivos o no tiene los permisos suficientes.".$uploadDirectory;
    }
} // Termina la funcion



if (!empty($_FILES)) {
    $existingFile = false;
    //Comprobamos que por lo menos haya un archivo
    foreach ($_FILES as $uploadedFile => $dataFile) {
        for ($i = 0; $i < count($dataFile["name"]); $i++) {
            if ($dataFile["name"][$i] != "") {
                $existingFile = true;
            };
        }
    }
    if ($existingFile) {
        //llamamos a la funcion que mueve y comprueba los archivos
        $filesUploaded = moveFiles($_FILES, $uploadDir, $inputFileNam);
		
		if (isset($filesUploaded) and !empty($filesUploaded)) {
			return "Archivo cargado";
			foreach ($filesUploaded as $singleFile) {
		//        echo "<iframe allowtransparency='yes' width='95%' height='600px' frameborder='1' src='subidas/".$singleFile."'></iframe>";
		//		'<hr>';
			}
		}
    } else {
		return "No hay un archivo para procesar";
        die();
    }
} else {
	return "No se enviaron archivos";
    die();
}
?>