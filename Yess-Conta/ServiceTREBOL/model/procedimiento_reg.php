<?php
 class procedimiento_reg{
    public $Codigo_Proc_Reg;
    public $Nombre;
    public $table="procedimiento_reg";

    function __construct($Codigo_Proc_Reg=null, $Nombre=null) {
        $this->Codigo_Proc_Reg = $Codigo_Proc_Reg;
        $this->Nombre = $Nombre;
        
    }
    function selectAllProcedimientosStr(){
    	return "select *from $this->table";
    }
    function selectProcedimiento($Codigo_Proc_Reg){
        return "select Nombre from $this->table where Codigo_Proc_Reg='$Codigo_Proc_Reg'";
    }
  }   
?>