<?php

class Conectar2{
    public static function conexion(){
        $conexion=new mysqli("localhost", "root", "", "general");
        $conexion->query("SET NAMES 'utf8'");
        return $conexion;
    }
}
?>