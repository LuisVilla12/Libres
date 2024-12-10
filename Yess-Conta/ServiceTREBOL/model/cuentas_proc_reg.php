<?php
 class cuentas_proc_reg{
    public $Codigo_Proc_Reg;
    public $Codigo_Cuenta;
    public $table="cuentas_proc_reg";

    function __construct($Codigo_Proc_Reg=null, $Codigo_Cuenta=null) {
        $this->Codigo_Proc_Reg = $Codigo_Proc_Reg;
        $this->Codigo_Cuenta = $Codigo_Cuenta;
        
    }

    function selectCuentaProc($Codigo_Proc_Reg, $Codigo_Cuenta){
    	return "SELECT cuentas.Codigo_Cuenta, cuentas.Nombre_Cuenta FROM cuentas INNER JOIN cuentas_proc_reg ON cuentas_proc_reg.Codigo_Cuenta=cuentas.Codigo_Cuenta INNER JOIN procedimiento_reg ON procedimiento_reg.Codigo_Proc_Reg=cuentas_proc_reg.Codigo_Proc_Reg WHERE cuentas_proc_reg.Codigo_Proc_Reg=$Codigo_Proc_Reg AND cuentas_proc_reg.Codigo_Cuenta='$Codigo_Cuenta'";
    }

   }   
?>