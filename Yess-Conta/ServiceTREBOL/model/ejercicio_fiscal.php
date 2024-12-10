<?php
 class ejercicio_fiscal{
    public $idEjercicio_Fiscal;
    public $Fecha;
    public $Mes;
    public $Proc_Reg;
    public $Estado;
    public $Fecha_Fin;
    public $Observaciones;
    public $Empresa_idEmpresa;
    public $table="ejercicio_fiscal";

    function __construct($idEjercicio_Fiscal=null, $Fecha=null, $Mes=null, $Proc_Reg=null, $Estado=null, $Fecha_Fin=null, $Observaciones=null, $Empresa_idEmpresa=null) {
        $this->idEjercicio_Fiscal = $idEjercicio_Fiscal;
        $this->Fecha = $Fecha;
        $this->Mes = $Mes;
        $this->Proc_Reg = $Proc_Reg;
        $this->Estado = $Estado;
        $this->Fecha_Fin  = $Fecha_Fin;
        $this->Observaciones = $Observaciones;
        $this->Empresa_idEmpresa  = $Empresa_idEmpresa;
    }

    function insertnewEjercicioStr(){
        return "insert into $this->table values ('$this->idEjercicio_Fiscal','$this->Fecha','$this->Mes', 
        '$this->Proc_Reg','$this->Estado','$this->Fecha_Fin', '$this->Observaciones','$this->Empresa_idEmpresa')";
    }
    function selectAllEjerciciosStr(){
        return "select *from $this->table";
    }
    function selectMes($idEjercicio_Fiscal){
        return "select Mes from $this->table where idEjercicio_Fiscal='$idEjercicio_Fiscal'";
    }
    function updateDatosEjercicio($idEjercicio_Fiscal,$Estado,$Fecha_Fin,$Empresa_idEmpresa){
        return "update $this->table set Estado='$Estado', Fecha_Fin='$Fecha_Fin' where idEjercicio_Fiscal='$idEjercicio_Fiscal' and Empresa_idEmpresa='$Empresa_idEmpresa'";
    }

    function selectEjercicio($idEjercicio_Fiscal){
        return "select *from $this->table where idEjercicio_Fiscal='$idEjercicio_Fiscal'";
    }

    function deleteEjercicioStr($idEjercicio_Fiscal){
        return "delete from $this->table where idEjercicio_Fiscal='$idEjercicio_Fiscal'";
    }

    function selectEjerciciosIDStr($Empresa_idEmpresa){
        return "select *from $this->table INNER JOIN procedimiento_reg ON procedimiento_reg.Codigo_Proc_Reg=ejercicio_fiscal.Proc_Reg where Empresa_idEmpresa= '$Empresa_idEmpresa'";
    }

 }  
?>