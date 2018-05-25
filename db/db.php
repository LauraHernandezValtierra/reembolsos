<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "laxmegat_rmbo";
		

class Conectar{
    public static function conexion(){
        $conexion=new mysqli("localhost", "root", "", "laxmegat_rmbo");
        $conexion->query("SET NAMES 'utf8'");
        return $conexion;
    }
}
?>