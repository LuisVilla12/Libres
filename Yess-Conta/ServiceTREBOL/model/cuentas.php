<?php
 class cuentas{
    public $Codigo_Cuenta;
    public $Nombre_Cuenta;
    public $table="cuentas";

    function __construct($Codigo_Cuenta=null, $Nombre_Cuenta=null) {
        $this->Codigo_Cuenta = $Codigo_Cuenta;
        $this->Nombre_Cuenta = $Nombre_Cuenta;
        
    }

  function selectCodigo($Nombre_Cuenta){
    return "select Codigo_Cuenta from $this->table WHERE Nombre_Cuenta='$Nombre_Cuenta'";
  }  

   }   
?>