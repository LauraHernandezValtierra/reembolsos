<?php

function decode_($string){
	$cad = explode("?",$string); 
	//separo la url desde el ?
	$n=count($cad);
	if ($n>1) {
		$string = $cad[1]; //capturo la url desde el separador ? en adelante
		if(isset($cad[1]))//confirmo que tenga datos
		 {
			$cad_get = explode("&",$string); //separo la url por &
		
		foreach($cad_get as $value)
		{
			$val_get = explode("=",$value); //asigno los valosres al GET
			$_GET[$val_get[0]]=utf8_decode($val_get[1]);
		}
	 	return $_GET;
		
		}
	}
	
}
function encode_this($string) 
{
	$string 	= utf8_encode($string);
	$control 	= "qwerty"; //defino la llave para encriptar la cadena, cambiarla por la que deseamos usar
	$string 	= $control.$string.$control; //concateno la llave para encriptar la cadena
	$string 	= base64_encode($string);//codifico la cadena
	return($string);
} 

function decode1($string){
	$cad = explode("?",$string); 
	//separo la url desde el ?
	$string = $cad[1];
	 //capturo la url desde el separador ? en adelante 
	$cad_get = explode("=",$string); //separo la url por &
	$edo=$cad_get[1];
	
 	return $edo;
}

function info($tipo){
			if($tipo == 'A'){
				echo " <script> alert('¡ATENCIÓN!\nLa solicitud de su reembolso debe ser impresa en hoja membretada de la agencia que lo solicita.'); </script>
				";
		
			}
			else if ($tipo == 'D'){
				echo "<scrip>alert('¡ATENCIÓN!\nLa solicitud de su reembolso debe ser impresa en hoja blanca.');	</script> ";
					
			}
	}

    
function unidad($numuero){
	switch ($numuero)
	{
		case 9:
		{
			$numu = "NUEVE";
			break;
		}
		case 8:
		{
			$numu = "OCHO";
			break;
		}
		case 7:
		{
			$numu = "SIETE";
			break;
		}		
		case 6:
		{
			$numu = "SEIS";
			break;
		}		
		case 5:
		{
			$numu = "CINCO";
			break;
		}		
		case 4:
		{
			$numu = "CUATRO";
			break;
		}		
		case 3:
		{
			$numu = "TRES";
			break;
		}		
		case 2:
		{
			$numu = "DOS";
			break;
		}		
		case 1:
		{
			$numu = "UN";
			break;
		}		
		case 0:
		{
			$numu = "";
			break;
		}		
	}
	return $numu;	
}

function decena($numdero){
	
		if ($numdero >= 90 && $numdero <= 99)
		{
			$numd = "NOVENTA ";
			if ($numdero > 90)
				$numd = $numd."Y ".(unidad($numdero - 90));
		}
		else if ($numdero >= 80 && $numdero <= 89)
		{
			$numd = "OCHENTA ";
			if ($numdero > 80)
				$numd = $numd."Y ".(unidad($numdero - 80));
		}
		else if ($numdero >= 70 && $numdero <= 79)
		{
			$numd = "SETENTA ";
			if ($numdero > 70)
				$numd = $numd."Y ".(unidad($numdero - 70));
		}
		else if ($numdero >= 60 && $numdero <= 69)
		{
			$numd = "SESENTA ";
			if ($numdero > 60)
				$numd = $numd."Y ".(unidad($numdero - 60));
		}
		else if ($numdero >= 50 && $numdero <= 59)
		{
			$numd = "CINCUENTA ";
			if ($numdero > 50)
				$numd = $numd."Y ".(unidad($numdero - 50));
		}
		else if ($numdero >= 40 && $numdero <= 49)
		{
			$numd = "CUARENTA ";
			if ($numdero > 40)
				$numd = $numd."Y ".(unidad($numdero - 40));
		}
		else if ($numdero >= 30 && $numdero <= 39)
		{
			$numd = "TREINTA ";
			if ($numdero > 30)
				$numd = $numd."Y ".(unidad($numdero - 30));
		}
		else if ($numdero >= 20 && $numdero <= 29)
		{
			if ($numdero == 20)
				$numd = "VEINTE ";
			else
				$numd = "VEINTI".(unidad($numdero - 20));
		}
		else if ($numdero >= 10 && $numdero <= 19)
		{
			switch ($numdero){
			case 10:
			{
				$numd = "DIEZ ";
				break;
			}
			case 11:
			{		 		
				$numd = "ONCE ";
				break;
			}
			case 12:
			{
				$numd = "DOCE ";
				break;
			}
			case 13:
			{
				$numd = "TRECE ";
				break;
			}
			case 14:
			{
				$numd = "CATORCE ";
				break;
			}
			case 15:
			{
				$numd = "QUINCE ";
				break;
			}
			case 16:
			{
				$numd = "DIECISEIS ";
				break;
			}
			case 17:
			{
				$numd = "DIECISIETE ";
				break;
			}
			case 18:
			{
				$numd = "DIECIOCHO ";
				break;
			}
			case 19:
			{
				$numd = "DIECINUEVE ";
				break;
			}
			}	
		}
		else
			$numd = unidad($numdero);
	return $numd;
}

	function centena($numc){
		if ($numc >= 100)
		{
			if ($numc >= 900 && $numc <= 999)
			{
				$numce = "NOVECIENTOS ";
				if ($numc > 900)
					$numce = $numce.(decena($numc - 900));
			}
			else if ($numc >= 800 && $numc <= 899)
			{
				$numce = "OCHOCIENTOS ";
				if ($numc > 800)
					$numce = $numce.(decena($numc - 800));
			}
			else if ($numc >= 700 && $numc <= 799)
			{
				$numce = "SETECIENTOS ";
				if ($numc > 700)
					$numce = $numce.(decena($numc - 700));
			}
			else if ($numc >= 600 && $numc <= 699)
			{
				$numce = "SEISCIENTOS ";
				if ($numc > 600)
					$numce = $numce.(decena($numc - 600));
			}
			else if ($numc >= 500 && $numc <= 599)
			{
				$numce = "QUINIENTOS ";
				if ($numc > 500)
					$numce = $numce.(decena($numc - 500));
			}
			else if ($numc >= 400 && $numc <= 499)
			{
				$numce = "CUATROCIENTOS ";
				if ($numc > 400)
					$numce = $numce.(decena($numc - 400));
			}
			else if ($numc >= 300 && $numc <= 399)
			{
				$numce = "TRESCIENTOS ";
				if ($numc > 300)
					$numce = $numce.(decena($numc - 300));
			}
			else if ($numc >= 200 && $numc <= 299)
			{
				$numce = "DOSCIENTOS ";
				if ($numc > 200)
					$numce = $numce.(decena($numc - 200));
			}
			else if ($numc >= 100 && $numc <= 199)
			{
				if ($numc == 100)
					$numce = "CIEN ";
				else
					$numce = "CIENTO ".(decena($numc - 100));
			}
		}
		else
			$numce = decena($numc);
		
		return $numce;	
}

	function miles($nummero){
		if ($nummero >= 1000 && $nummero < 2000){
			$numm = "MIL ".(centena($nummero%1000));
		}
		if ($nummero >= 2000 && $nummero <10000){
			$numm = unidad(Floor($nummero/1000))." MIL ".(centena($nummero%1000));
		}
		if ($nummero < 1000)
			$numm = centena($nummero);
		
		return $numm;
	}

	function decmiles($numdmero){
		if ($numdmero == 10000)
			$numde = "DIEZ MIL";
		if ($numdmero > 10000 && $numdmero <20000){
			$numde = decena(Floor($numdmero/1000))."MIL ".(centena($numdmero%1000));		
		}
		if ($numdmero >= 20000 && $numdmero <100000){
			$numde = decena(Floor($numdmero/1000))." MIL ".(miles($numdmero%1000));		
		}		
		if ($numdmero < 10000)
			$numde = miles($numdmero);
		
		return $numde;
	}		

	function cienmiles($numcmero){
		if ($numcmero == 100000)
			$num_letracm = "CIEN MIL";
		if ($numcmero >= 100000 && $numcmero <1000000){
			$num_letracm = centena(Floor($numcmero/1000))." MIL ".(centena($numcmero%1000));		
		}
		if ($numcmero < 100000)
			$num_letracm = decmiles($numcmero);
		return $num_letracm;
	}	
	
	function millon($nummiero){
		if ($nummiero >= 1000000 && $nummiero <2000000){
			$num_letramm = "UN MILLON ".(cienmiles($nummiero%1000000));
		}
		if ($nummiero >= 2000000 && $nummiero <10000000){
			$num_letramm = unidad(Floor($nummiero/1000000))." MILLONES ".(cienmiles($nummiero%1000000));
		}
		if ($nummiero < 1000000)
			$num_letramm = cienmiles($nummiero);
		
		return $num_letramm;
	}	

	function decmillon($numerodm){
		if ($numerodm == 10000000)
			$num_letradmm = "DIEZ MILLONES";
		if ($numerodm > 10000000 && $numerodm <20000000){
			$num_letradmm = decena(Floor($numerodm/1000000))."MILLONES ".(cienmiles($numerodm%1000000));		
		}
		if ($numerodm >= 20000000 && $numerodm <100000000){
			$num_letradmm = decena(Floor($numerodm/1000000))." MILLONES ".(millon($numerodm%1000000));		
		}
		if ($numerodm < 10000000)
			$num_letradmm = millon($numerodm);
		
		return $num_letradmm;
	}

	function cienmillon($numcmeros){
		if ($numcmeros == 100000000)
			$num_letracms = "CIEN MILLONES";
		if ($numcmeros >= 100000000 && $numcmeros <1000000000){
			$num_letracms = centena(Floor($numcmeros/1000000))." MILLONES ".(millon($numcmeros%1000000));		
		}
		if ($numcmeros < 100000000)
			$num_letracms = decmillon($numcmeros);
		return $num_letracms;
	}	

	function milmillon($nummierod){
		if ($nummierod >= 1000000000 && $nummierod <2000000000){
			$num_letrammd = "MIL ".(cienmillon($nummierod%1000000000));
		}
		if ($nummierod >= 2000000000 && $nummierod <10000000000){
			$num_letrammd = unidad(Floor($nummierod/1000000000))." MIL ".(cienmillon($nummierod%1000000000));
		}
		if ($nummierod < 1000000000)
			$num_letrammd = cienmillon($nummierod);
		
		return $num_letrammd;
	}	
			
		
	function convertir($numero,$moneda){
		//$numf = cienmillon($numero);
		$numf	= cienmillon(strstr($numero, '.', true));
		if ($numero == 0.01)
		{
			$num_letras = "01/100 ";
		}
		else
		{
			$decimal= trim(strchr($numero,"."),".");
			if($decimal!='')
				{
					if (strlen($decimal)==1)
					{
						$decimal= $decimal."0";
					}
					elseif(strlen($decimal)>=3){
						$decimal= substr($decimal,0,2);	
/*						$decimal	= round($decimal);
						$segundo= substr($decimal,1,1);
							if($segundo>=5){
								$decimal	= $decimal+1;
							}*/
					}
				}
				else
			{
				$decimal="00";
			}
				
			$num_letras = $decimal."/100";
		}
		
		switch($moneda){
			case 'MXN':
				$mletras	= 'PESOS';
			break;
			case 'USD':
				$mletras	= 'DÓLARES';
			break;	
		}
		
		return $numf." ".$mletras." ".$num_letras;
}


?>