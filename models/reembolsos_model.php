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

    public function updateReembolsoD($expediente, $nconsolidado, $correo, $banco, $sucursal, $cuenta, $clabe, $Beneficiario, $identificacion, $proc, $estatus, $archivo,$fproceso, $observacion){
         $update="UPDATE reembolsos_web SET
             n_observaciones = '".$observacion."',
             n_banco = '".$banco."',
             n_sucursal = '".$sucursal."',
             n_cuenta = '".$cuenta."',
             n_beneficiario = '".$Beneficiario."',
             n_clabe = '".$clabe."',
             n_mail = '".$correo."',
             proc = '".$proc."',
             estatus = '".$estatus."',
             archivo = '".$archivo."',
             identificacion = '".$identificacion."',
             fproceso       ='".$fproceso."'
             WHERE 
             cid_expediente = '".$expediente."' and
             nconsolidado = '".$nconsolidado."';";
             if ($this->db->query($update)) {
                
                     return TRUE;
                }else{
                    return FALSE;
                }
               
            
    }
    public function updateReembolsoA($expediente, $nconsolidado, $correo, $banco, $sucursal, $cuenta, $clabe, $beneficiario, $proc, $estatus, $archivo,$fproceso, $observacion){
         $update="UPDATE  reembolsos_web SET
             n_observaciones = '".$observacion."',
             n_banco = '".$banco."',
             n_sucursal = '".$sucursal."',
             n_cuenta = '".$cuenta."',
             n_beneficiario = '".$beneficiario."',
             n_clabe = '".$clabe."',
             n_mail = '".$correo."',
             proc = '".$proc."',
             estatus = '".$estatus."',
             archivo = '".$archivo."',
             fproceso       ='".$fproceso."'
            
             WHERE 
             cid_expediente = '".$expediente."' and
             nconsolidado = '".$nconsolidado."';";
            if ($this->db->query($update)) {
                
                     return TRUE;
                }else{
                    return FALSE;
                }
    }
}
?>