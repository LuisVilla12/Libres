<?php
class clasificacion_cuentas{
	public $Clasificacion_Cuentas;
	public $Cuentas_Codigo_Cuenta;
    public $ClasifPrincipal_id_Recurso;       
    public $table="clasificacion_cuentas";

    function __construct($Clasificacion_Cuentas=null, $Cuentas_Codigo_Cuenta=null, $ClasifPrincipal_id_Recurso=null) {
        $this->Clasificacion_Cuentas = $Clasificacion_Cuentas;
        $this->Cuentas_Codigo_Cuenta = $Cuentas_Codigo_Cuenta;
        $this->ClasifPrincipal_id_Recurso = $ClasifPrincipal_id_Recurso;
    }

    function selectTipo($Cuentas_Codigo_Cuenta){
    	return "select ClasifPrincipal_id_Recurso from $this->table where Cuentas_Codigo_Cuenta='$Cuentas_Codigo_Cuenta'";
    }
 }
?>