<?php
class reembolsos_model{
    private $db;
    private $reembolsos;
 
    public function __construct(){
        $this->db=Conectar::conexion();
        $this->reembolsos=array();
    }
    public function get_reembolsos(){
        $consulta=$this->db->query("select * from reembolsos_web ;");
        while($filas=$consulta->fetch_assoc()){
            $this->reembolsos[]=$filas;
        }
        return $this->reembolsos;
    }

    public function consulta_reembolso($expediente, $nconsolidado){
         $consulta=$this->db->query("select * from reembolsos_web 
            where cid_expediente = '".$expediente."'
            and nconsolidado = '".$nconsolidado."' ;");
            $filas=$consulta->fetch_assoc();
            $this->reembolsos=$filas;
        return $this->reembolsos;
    }
}
?>