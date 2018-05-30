<?php
class municipios_model{
    private $db;
    private $municipios;
 
    public function __construct(){
        $this->db=Conectar::conexion();
        $this->muni=array();
    }

    public function get_municipios(){
        $consulta=$this->db->query("select * from municipios;");
        while($filas=$consulta->fetch_assoc()){
            $this->muni[]=$filas;
        }
        return $this->muni;
    }

}
?>