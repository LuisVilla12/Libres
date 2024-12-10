<?php
 class cuentas_info{
    public $Codigo_Cuenta;
    public $Nombre_Cuenta;
    public $Tipo_recurso;
    public $Codigo_Proc_Reg;
    public $table="cuentas_info";

    function __construct($Codigo_Cuenta=null, $Nombre_Cuenta=null, $Tipo_recurso=null, $Codigo_Proc_Reg=null) {
        $this->Codigo_Cuenta = $Codigo_Cuenta;
        $this->Nombre_Cuenta = $Nombre_Cuenta;
        $this->Tipo_recurso = $Tipo_recurso;
        $this->Codigo_Proc_Reg = $Codigo_Proc_Reg;
        
    }


  function selectCuentasInfo($Codigo_Proc_Reg){
    return "select *from $this->table WHERE Codigo_Proc_Reg='$Codigo_Proc_Reg'";
  } 
}   
?>