<?php 
function selectHora(){
	for($i=0 ; $i<24 ; $i++){
		$i = str_pad($i, 2, '0', STR_PAD_LEFT);
		echo "<option value='".$i."'>".$i."</option>";
	}
}

function selectMin(){
	for($i=0 ; $i<60 ; $i++){
		$i = str_pad($i, 2, '0', STR_PAD_LEFT);
		echo "<option value='".$i."'>".$i."</option>";
	}
} 

function recortaHora($tiempo){
	$tiempo = trim(strchr($tiempo,":",true));
	return $tiempo;
}

function recortaMin($tiempo){
	$tiempo = trim(strchr($tiempo,":"),":");
	$tiempo = trim(strchr($tiempo,":",true));
	return $tiempo;
}

function fechames($fech){
	global $arrayMeses;
	$anio = trim(strchr($fech,"-",true));
	$fech = trim(strchr($fech,"-"),"-");
	$mes = trim(strchr($fech,"-",true));
	$fech = trim(strchr($fech,"-"),"-");
	return $fech."-".strtoupper($arrayMeses[$mes-1])."-".$anio;
}

function fHoy(){
	echo date("Y-m-d");
}

function volteaFecha($fech,$identifica,$separa){
	$fech1 = trim(strchr($fech,$identifica,true));
	$fech = trim(strchr($fech,$identifica),$identifica);
	$fech2 = trim(strchr($fech,$identifica,true));
	$fech = trim(strchr($fech,$identifica),$identifica);
	return $fech.$separa.$fech2.$separa.$fech1;
}

function ddmmmaaaa($fech){
	global $arrayMeses;
	$anio = trim(strchr($fech,"-",true));
	$fech = trim(strchr($fech,"-"),"-");
	$mes = trim(strchr($fech,"-",true));
	$fech = trim(strchr($fech,"-"),"-");
	return $fech."-".substr(strtoupper($arrayMeses[$mes-1]), 0, 3)."-".$anio;
}

function restaDias($fech,$resta){
//recibe la variable en formato año-mes-dia, el numero de dias a restar y devuelve el año-mes-dia
	$anio = trim(strchr($fech,"-",true));
	$fech = trim(strchr($fech,"-"),"-");
	$mes = trim(strchr($fech,"-",true));
	$fech = trim(strchr($fech,"-"),"-");
	return date('Y-m-d', mktime(0,0,0,$mes,$fech-$resta,$anio));
}
 

$dias = array("Domingo","Lunes","Martes","Mi&eacute;rcoles","Jueves","Viernes","S&aacute;bado");

$arrayMeses = array('Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre');
  
?>