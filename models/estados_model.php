<?php
class estados_model{
    private $db;
    private $estados;
 
    public function __construct(){
        $this->db=Conectar2::conexion();
        $this->estados=array();
    }

    public function get_estados(){
        $consulta=$this->db->query("select estado from municipios group by estado ;");
        while($filas=$consulta->fetch_assoc()){
            $this->estados[]=$filas;
        }
        return $this->estados;
    }

}
?>