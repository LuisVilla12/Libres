<?php
 class reg_cuentas{
    public $idReg_Cuentas;
    public $Num_Poliza;
    public $Fecha_Factura;
    public $Fecha_Reg;
    public $cuentas_Codigo_Cuenta;
    public $Nombre_Cuenta;
    public $Concepto;
    public $Monto;
    public $Codigo_Naturaleza;
    public $ejer_idEjercicio_Fiscal;
    public $table="reg_cuentas";

    function __construct($idReg_Cuentas=null, $Num_Poliza=null, $Fecha_Factura=null, $Fecha_Reg=null, $cuentas_Codigo_Cuenta=null, $Nombre_Cuenta=null, $Concepto=null, $Monto=null, $Codigo_Naturaleza=null, $ejer_idEjercicio_Fiscal=null ) {
        $this->idReg_Cuentas = $idReg_Cuentas;
        $this->Num_Poliza = $Num_Poliza;
        $this->Fecha_Factura = $Fecha_Factura;
        $this->Fecha_Reg = $Fecha_Reg;
        $this->cuentas_Codigo_Cuenta = $cuentas_Codigo_Cuenta;
        $this->Nombre_Cuenta  = $Nombre_Cuenta;
        $this->Concepto = $Concepto;
        $this->Monto = $Monto;
        $this->Codigo_Naturaleza = $Codigo_Naturaleza;
        $this->ejer_idEjercicio_Fiscal = $ejer_idEjercicio_Fiscal;
    }

    function insertRegistroStr(){
        return "insert into $this->table values ('$this->idReg_Cuentas','$this->Num_Poliza','$this->Fecha_Factura', 
        '$this->Fecha_Reg','$this->cuentas_Codigo_Cuenta','$this->Nombre_Cuenta', '$this->Concepto','$this->Monto', 
        '$this->Codigo_Naturaleza', '$this->ejer_idEjercicio_Fiscal')";
    }
   function updateRegistroStr(){
        return "update $this->table set Num_Poliza='$this->Num_Poliza', 
        Fecha_Factura='$this->Fecha_Factura', Fecha_Reg='$this->Fecha_Reg', cuentas_Codigo_Cuenta='$this->cuentas_Codigo_Cuenta',
         Nombre_Cuenta='$this->Nombre_Cuenta', Concepto='$this->Concepto', Monto='$this->Monto', Codigo_Naturaleza='$this->Codigo_Naturaleza',
          ejer_idEjercicio_Fiscal='$this->ejer_idEjercicio_Fiscal' 
          where idReg_Cuentas='$this->idReg_Cuentas'";
    }
  function deleteAllRegistStr($ejer_idEjercicio_Fiscal){
    return "delete from $this->table where ejer_idEjercicio_Fiscal='$ejer_idEjercicio_Fiscal'";
  }
 function deleteAsientoStr(){
        return "delete from $this->table where idReg_Cuentas='$this->idReg_Cuentas'";
    } 
 function selectAllRegistStr($ejer_idEjercicio_Fiscal){
        return "select *from $this->table where ejer_idEjercicio_Fiscal= '$ejer_idEjercicio_Fiscal'";
    }
 function selectAllPolizas($ejer_idEjercicio_Fiscal){
       return "select Num_Poliza from reg_cuentas where ejer_idEjercicio_Fiscal= '$ejer_idEjercicio_Fiscal' GROUP BY Num_Poliza ASC";
   }
function selectDatosPoliza($Num_Poliza, $ejer_idEjercicio_Fiscal){
       return "select *from reg_cuentas where Num_Poliza='$Num_Poliza' and ejer_idEjercicio_Fiscal='$ejer_idEjercicio_Fiscal'";
   }
function selectPoliza($Num_Poliza, $ejer_idEjercicio_Fiscal){
  return "select *from reg_cuentas where Num_Poliza='$Num_Poliza' AND ejer_idEjercicio_Fiscal='$ejer_idEjercicio_Fiscal'";
}
       
function selectAllCuentas($ejer_idEjercicio_Fiscal){
       return "select Nombre_Cuenta FROM reg_cuentas where ejer_idEjercicio_Fiscal='$ejer_idEjercicio_Fiscal' GROUP BY Nombre_Cuenta ASC";
   }
function selectDatosCuenta($Nombre_Cuenta, $ejer_idEjercicio_Fiscal){
       return "select *from $this->table where Nombre_Cuenta='$Nombre_Cuenta'and ejer_idEjercicio_Fiscal='$ejer_idEjercicio_Fiscal'";
   }
function selectSaldoCargo($Codigo_Naturaleza, $ejer_idEjercicio_Fiscal){
       return "select SUM(Monto) AS TotalCargo FROM reg_cuentas WHERE Codigo_Naturaleza='$Codigo_Naturaleza' and ejer_idEjercicio_Fiscal='$ejer_idEjercicio_Fiscal'";
  }
function selectSaldoAbono($Codigo_Naturaleza, $ejer_idEjercicio_Fiscal){
       return "select SUM(Monto) AS TotalAbono FROM reg_cuentas WHERE Codigo_Naturaleza='$Codigo_Naturaleza' and ejer_idEjercicio_Fiscal='$ejer_idEjercicio_Fiscal'";
  }
function selectSaldoCPoliza($Num_Poliza, $Codigo_Naturaleza, $ejer_idEjercicio_Fiscal){
       return "select SUM(Monto) AS TotalCargo FROM reg_cuentas WHERE Num_Poliza='$Num_Poliza' and Codigo_Naturaleza='$Codigo_Naturaleza' and ejer_idEjercicio_Fiscal='$ejer_idEjercicio_Fiscal'";
  }
function selectSaldoAPoliza($Num_Poliza, $Codigo_Naturaleza, $ejer_idEjercicio_Fiscal){
       return "select SUM(Monto) AS TotalAbono FROM $this->table WHERE Num_Poliza='$Num_Poliza' and Codigo_Naturaleza='$Codigo_Naturaleza' and ejer_idEjercicio_Fiscal='$ejer_idEjercicio_Fiscal'";
  }
function selectSaldoDCuentas($Nombre_Cuenta, $Codigo_Naturaleza, $ejer_idEjercicio_Fiscal){
       return "select SUM(Monto) AS TotalCargo FROM reg_cuentas WHERE Nombre_Cuenta='$Nombre_Cuenta' and Codigo_Naturaleza='$Codigo_Naturaleza' and ejer_idEjercicio_Fiscal='$ejer_idEjercicio_Fiscal'";
  }
function selectSaldoHCuentas($Nombre_Cuenta, $Codigo_Naturaleza, $ejer_idEjercicio_Fiscal){
       return "select SUM(Monto) AS TotalAbono FROM reg_cuentas WHERE Nombre_Cuenta='$Nombre_Cuenta' and Codigo_Naturaleza='$Codigo_Naturaleza' and ejer_idEjercicio_Fiscal='$ejer_idEjercicio_Fiscal'";
  }
function selectSaldoTotal($cuentas_Codigo_Cuenta, $ejer_idEjercicio_Fiscal){
    return "select ( select IFNULL(SUM(Monto),0) FROM reg_cuentas WHERE cuentas_Codigo_Cuenta='$cuentas_Codigo_Cuenta' AND Codigo_Naturaleza='40' and ejer_idEjercicio_Fiscal='$ejer_idEjercicio_Fiscal' ) - ( select IFNULL(SUM(Monto),0) FROM reg_cuentas WHERE cuentas_Codigo_Cuenta='$cuentas_Codigo_Cuenta' AND Codigo_Naturaleza='50' and ejer_idEjercicio_Fiscal='$ejer_idEjercicio_Fiscal' ) AS 'Diferencia', ClasifPrincipal_id_Recurso FROM clasificacion_cuentas WHERE clasificacion_cuentas.Cuentas_Codigo_Cuenta='$cuentas_Codigo_Cuenta'";
  }
function selectDatosEdoResult($ejer_idEjercicio_Fiscal){
  return "select ( select IFNULL(SUM(Monto),0) FROM reg_cuentas WHERE cuentas_Codigo_Cuenta='4011' AND Codigo_Naturaleza='50' and ejer_idEjercicio_Fiscal='$ejer_idEjercicio_Fiscal' ) - ( select IFNULL(SUM(Monto),0) FROM reg_cuentas WHERE cuentas_Codigo_Cuenta='4011' AND Codigo_Naturaleza='40' and ejer_idEjercicio_Fiscal='$ejer_idEjercicio_Fiscal' ) AS 'Ventas_Netas', ( select IFNULL(SUM(Monto),0) FROM reg_cuentas WHERE cuentas_Codigo_Cuenta='4012' AND Codigo_Naturaleza='50' and ejer_idEjercicio_Fiscal='$ejer_idEjercicio_Fiscal' ) - ( select IFNULL(SUM(Monto),0) FROM reg_cuentas WHERE cuentas_Codigo_Cuenta='4012' AND Codigo_Naturaleza='40' and ejer_idEjercicio_Fiscal='$ejer_idEjercicio_Fiscal' ) AS 'Ingreso_servicios',(( select IFNULL(SUM(Monto),0) FROM reg_cuentas WHERE cuentas_Codigo_Cuenta='4011' AND Codigo_Naturaleza='50' and ejer_idEjercicio_Fiscal='$ejer_idEjercicio_Fiscal' ) - ( select IFNULL(SUM(Monto),0) FROM reg_cuentas WHERE cuentas_Codigo_Cuenta='4011' AND Codigo_Naturaleza='40' and ejer_idEjercicio_Fiscal='$ejer_idEjercicio_Fiscal' )) + (( select IFNULL(SUM(Monto),0) FROM reg_cuentas WHERE cuentas_Codigo_Cuenta='4012' AND Codigo_Naturaleza='50' and ejer_idEjercicio_Fiscal='$ejer_idEjercicio_Fiscal' ) - ( select IFNULL(SUM(Monto),0) FROM reg_cuentas WHERE cuentas_Codigo_Cuenta='4012' AND Codigo_Naturaleza='40' and ejer_idEjercicio_Fiscal='$ejer_idEjercicio_Fiscal' )) AS 'Ingresos_Totales',( select IFNULL(SUM(Monto),0) FROM reg_cuentas WHERE cuentas_Codigo_Cuenta='5001' AND Codigo_Naturaleza='40' and ejer_idEjercicio_Fiscal='$ejer_idEjercicio_Fiscal' ) - ( select IFNULL(SUM(Monto),0) FROM reg_cuentas WHERE cuentas_Codigo_Cuenta='5001' AND Codigo_Naturaleza='50' and ejer_idEjercicio_Fiscal='$ejer_idEjercicio_Fiscal' ) AS 'Costo_ventas',((( select IFNULL(SUM(Monto),0) FROM reg_cuentas WHERE cuentas_Codigo_Cuenta='4011' AND Codigo_Naturaleza='50' and ejer_idEjercicio_Fiscal='$ejer_idEjercicio_Fiscal' ) - ( select IFNULL(SUM(Monto),0) FROM reg_cuentas WHERE cuentas_Codigo_Cuenta='4011' AND Codigo_Naturaleza='40' and ejer_idEjercicio_Fiscal='$ejer_idEjercicio_Fiscal' )) + (( select IFNULL(SUM(Monto),0) FROM reg_cuentas WHERE cuentas_Codigo_Cuenta='4012' AND Codigo_Naturaleza='50' and ejer_idEjercicio_Fiscal='$ejer_idEjercicio_Fiscal' ) - ( select IFNULL(SUM(Monto),0) FROM reg_cuentas WHERE cuentas_Codigo_Cuenta='4012' AND Codigo_Naturaleza='40' and ejer_idEjercicio_Fiscal='$ejer_idEjercicio_Fiscal' )))-(( select IFNULL(SUM(Monto),0) FROM reg_cuentas WHERE cuentas_Codigo_Cuenta='5001' AND Codigo_Naturaleza='40' and ejer_idEjercicio_Fiscal='$ejer_idEjercicio_Fiscal' ) - ( select IFNULL(SUM(Monto),0) FROM reg_cuentas WHERE cuentas_Codigo_Cuenta='5001' AND Codigo_Naturaleza='50' and ejer_idEjercicio_Fiscal='$ejer_idEjercicio_Fiscal' ))as 'Utilidad_Bruta', ( select IFNULL(SUM(Monto),0) FROM reg_cuentas WHERE cuentas_Codigo_Cuenta in ('6111','6112','6113','6114','6115','6116','6117','6118','6119','61110','61111','61112','61113') AND Codigo_Naturaleza='40' and ejer_idEjercicio_Fiscal='$ejer_idEjercicio_Fiscal' ) - ( select IFNULL(SUM(Monto),0) FROM reg_cuentas WHERE cuentas_Codigo_Cuenta in ('6111','6112','6113','6114','6115','6116','6117','6118','6119','61110','61111','61112','61113') AND Codigo_Naturaleza='50' and ejer_idEjercicio_Fiscal='$ejer_idEjercicio_Fiscal' ) as 'Gastos_administracion',( select IFNULL(SUM(Monto),0) FROM reg_cuentas WHERE cuentas_Codigo_Cuenta in ('6011','6012','6013','6014','6015','6016') AND Codigo_Naturaleza='40' and ejer_idEjercicio_Fiscal='$ejer_idEjercicio_Fiscal' ) - ( select IFNULL(SUM(Monto),0) FROM reg_cuentas WHERE cuentas_Codigo_Cuenta in ('6011','6012','6013','6014','6015','6016') AND Codigo_Naturaleza='50' and ejer_idEjercicio_Fiscal='$ejer_idEjercicio_Fiscal' ) as 'Gastos_Ventas', ( select IFNULL(SUM(Monto),0) FROM reg_cuentas WHERE cuentas_Codigo_Cuenta in ('6211','6212','6213','6214','6215') AND Codigo_Naturaleza='40' and ejer_idEjercicio_Fiscal='$ejer_idEjercicio_Fiscal' ) - ( select IFNULL(SUM(Monto),0) FROM reg_cuentas WHERE cuentas_Codigo_Cuenta in ('6211','6212','6213','6214','6215') AND Codigo_Naturaleza='50' and ejer_idEjercicio_Fiscal='$ejer_idEjercicio_Fiscal' ) as 'OtroGastos',( select IFNULL(SUM(Monto),0) FROM reg_cuentas WHERE cuentas_Codigo_Cuenta='20110' AND Codigo_Naturaleza='50' and ejer_idEjercicio_Fiscal='$ejer_idEjercicio_Fiscal' ) - ( select IFNULL(SUM(Monto),0) FROM reg_cuentas WHERE cuentas_Codigo_Cuenta='20110' AND Codigo_Naturaleza='40' and ejer_idEjercicio_Fiscal='$ejer_idEjercicio_Fiscal' ) as 'Saldo_PTU', ( select IFNULL(SUM(Monto),0) FROM reg_cuentas WHERE cuentas_Codigo_Cuenta IN('4111','4112','4113','4114') AND Codigo_Naturaleza='50' and ejer_idEjercicio_Fiscal='$ejer_idEjercicio_Fiscal' ) - ( select IFNULL(SUM(Monto),0) FROM reg_cuentas WHERE cuentas_Codigo_Cuenta in ('4111','4112','4113','4114') AND Codigo_Naturaleza='40' and ejer_idEjercicio_Fiscal='$ejer_idEjercicio_Fiscal' ) as 'OtrosIngresos',( select IFNULL(SUM(Monto),0) FROM reg_cuentas WHERE cuentas_Codigo_Cuenta IN('2016','2018','20111') AND Codigo_Naturaleza='50' and ejer_idEjercicio_Fiscal='$ejer_idEjercicio_Fiscal' ) - ( select IFNULL(SUM(Monto),0) FROM reg_cuentas WHERE cuentas_Codigo_Cuenta IN('2016','2018','20111') AND Codigo_Naturaleza='40' and ejer_idEjercicio_Fiscal='$ejer_idEjercicio_Fiscal' ) as 'Impuestos', ( select IFNULL(SUM(Monto),0) FROM reg_cuentas WHERE cuentas_Codigo_Cuenta IN('3011','3012','3013','3015') AND Codigo_Naturaleza='50' and ejer_idEjercicio_Fiscal='$ejer_idEjercicio_Fiscal' ) - ( select IFNULL(SUM(Monto),0) FROM reg_cuentas WHERE cuentas_Codigo_Cuenta IN('3011','3012','3013','3015') AND Codigo_Naturaleza='40' and ejer_idEjercicio_Fiscal='$ejer_idEjercicio_Fiscal' ) AS 'Saldo_Capital',(select IFNULL(SUM(CASE WHEN Codigo_Naturaleza='50' THEN Monto ELSE 0 END)-SUM(CASE WHEN Codigo_Naturaleza='40' THEN Monto ELSE 0 END),0))Saldo_Total from reg_cuentas INNER JOIN clasificacion_cuentas ON clasificacion_cuentas.Cuentas_Codigo_Cuenta=reg_cuentas.cuentas_Codigo_Cuenta WHERE clasificacion_cuentas.Clasificacion_Cuentas IN('20','21','22','30') and clasificacion_cuentas.Cuentas_Codigo_Cuenta not in(20112) and reg_cuentas.ejer_idEjercicio_Fiscal='$ejer_idEjercicio_Fiscal'";
 }
 function selectActivoC($ejer_idEjercicio_Fiscal){
  return "select reg_cuentas.Nombre_Cuenta,reg_cuentas.cuentas_Codigo_Cuenta,SUM(CASE WHEN Codigo_Naturaleza='40' THEN Monto ELSE 0 END)Total_Cargo, SUM(CASE WHEN Codigo_Naturaleza='50' THEN Monto ELSE 0 END)Total_Abono,SUM(CASE WHEN Codigo_Naturaleza='40' THEN Monto ELSE 0 END)-SUM(CASE WHEN Codigo_Naturaleza='50' THEN Monto ELSE 0 END)Saldo from reg_cuentas INNER JOIN clasificacion_cuentas ON clasificacion_cuentas.Cuentas_Codigo_Cuenta=reg_cuentas.cuentas_Codigo_Cuenta WHERE clasificacion_cuentas.Clasificacion_Cuentas='10' and reg_cuentas.ejer_idEjercicio_Fiscal='$ejer_idEjercicio_Fiscal' GROUP by clasificacion_cuentas.Cuentas_Codigo_Cuenta";
 }
 function selectSaldoActivoC($ejer_idEjercicio_Fiscal){
  return "select ( select IFNULL(SUM(Monto),0) FROM reg_cuentas WHERE cuentas_Codigo_Cuenta IN('1011','1012','1013','1021','1022','10221','10222','1023','10231','1024','10241','1025','1026','1027','1028','1031','1032','1033') AND Codigo_Naturaleza='40' and ejer_idEjercicio_Fiscal='$ejer_idEjercicio_Fiscal' ) - ( select IFNULL(SUM(Monto),0) FROM reg_cuentas WHERE cuentas_Codigo_Cuenta IN('1011','1012','1013','1021','1022','10221','10222','1023','10231','1024','10241','1025','1026','1027','1028','1031','1032','1033') AND Codigo_Naturaleza='50' and ejer_idEjercicio_Fiscal='$ejer_idEjercicio_Fiscal' ) AS 'Saldo_ActivoC'";
 }
 function selectActivoNC($ejer_idEjercicio_Fiscal){
  return "select reg_cuentas.Nombre_Cuenta,reg_cuentas.cuentas_Codigo_Cuenta,SUM(CASE WHEN Codigo_Naturaleza='40' THEN Monto ELSE 0 END)Total_Cargo, SUM(CASE WHEN Codigo_Naturaleza='50' THEN Monto ELSE 0 END)Total_Abono,SUM(CASE WHEN Codigo_Naturaleza='40' THEN Monto ELSE 0 END)-SUM(CASE WHEN Codigo_Naturaleza='50' THEN Monto ELSE 0 END)Saldo from reg_cuentas INNER JOIN clasificacion_cuentas ON clasificacion_cuentas.Cuentas_Codigo_Cuenta=reg_cuentas.cuentas_Codigo_Cuenta WHERE clasificacion_cuentas.Clasificacion_Cuentas='11' and reg_cuentas.ejer_idEjercicio_Fiscal='$ejer_idEjercicio_Fiscal' GROUP by clasificacion_cuentas.Cuentas_Codigo_Cuenta";
 }
 function selectSaldoActivoNC($ejer_idEjercicio_Fiscal){
  return "select ( select IFNULL(SUM(Monto),0) FROM reg_cuentas WHERE cuentas_Codigo_Cuenta IN('1111','1112','1113','1114','1121','1122','11221','1123','11231','1124','11241','1125','11251','1126','11261','1127','11271','1128','11281') AND Codigo_Naturaleza='40' and ejer_idEjercicio_Fiscal='$ejer_idEjercicio_Fiscal' ) - ( select IFNULL(SUM(Monto),0) FROM reg_cuentas WHERE cuentas_Codigo_Cuenta IN('1111','1112','1113','1114','1121','1122','11221','1123','11231','1124','11241','1125','11251','1126','11261','1127','11271','1128','11281')  AND Codigo_Naturaleza='50' and ejer_idEjercicio_Fiscal='$ejer_idEjercicio_Fiscal' ) AS 'Saldo_ActivoNC'";
 }
 function selectOtrosActivos($ejer_idEjercicio_Fiscal){
  return "select reg_cuentas.Nombre_Cuenta,reg_cuentas.cuentas_Codigo_Cuenta,SUM(CASE WHEN Codigo_Naturaleza='40' THEN Monto ELSE 0 END)Total_Cargo, SUM(CASE WHEN Codigo_Naturaleza='50' THEN Monto ELSE 0 END)Total_Abono,SUM(CASE WHEN Codigo_Naturaleza='40' THEN Monto ELSE 0 END)-SUM(CASE WHEN Codigo_Naturaleza='50' THEN Monto ELSE 0 END)Saldo from reg_cuentas INNER JOIN clasificacion_cuentas ON clasificacion_cuentas.Cuentas_Codigo_Cuenta=reg_cuentas.cuentas_Codigo_Cuenta WHERE clasificacion_cuentas.Clasificacion_Cuentas='12' and reg_cuentas.ejer_idEjercicio_Fiscal='$ejer_idEjercicio_Fiscal' GROUP by clasificacion_cuentas.Cuentas_Codigo_Cuenta";
 }
 function selectSaldoOActivos($ejer_idEjercicio_Fiscal){
  return "select ( select IFNULL(SUM(Monto),0) FROM reg_cuentas WHERE cuentas_Codigo_Cuenta IN('1131','1132','1133','1134','1141','1142','1143','1144','1145','1146','1151','1152','1153') AND Codigo_Naturaleza='40' and ejer_idEjercicio_Fiscal='$ejer_idEjercicio_Fiscal' ) - ( select IFNULL(SUM(Monto),0) FROM reg_cuentas WHERE cuentas_Codigo_Cuenta IN('1131','1132','1133','1134','1141','1142','1143','1144','1145','1146','1151','1152','1153') AND Codigo_Naturaleza='50' and ejer_idEjercicio_Fiscal='$ejer_idEjercicio_Fiscal' ) AS 'Saldo_OtrosActivos'";
 }
 function selectSaldoTotalActivos($ejer_idEjercicio_Fiscal){
  return "select SUM(CASE WHEN Codigo_Naturaleza='40' THEN Monto ELSE 0 END)-SUM(CASE WHEN Codigo_Naturaleza='50' THEN Monto ELSE 0 END)Saldo from reg_cuentas INNER JOIN clasificacion_cuentas ON clasificacion_cuentas.Cuentas_Codigo_Cuenta=reg_cuentas.cuentas_Codigo_Cuenta WHERE clasificacion_cuentas.Clasificacion_Cuentas IN('10','11','12') and reg_cuentas.ejer_idEjercicio_Fiscal='$ejer_idEjercicio_Fiscal'";
 }
 function selectPasivoCP($ejer_idEjercicio_Fiscal){
  return "select reg_cuentas.Nombre_Cuenta,reg_cuentas.cuentas_Codigo_Cuenta,SUM(CASE WHEN Codigo_Naturaleza='40' THEN Monto ELSE 0 END)Total_Cargo, SUM(CASE WHEN Codigo_Naturaleza='50' THEN Monto ELSE 0 END)Total_Abono,SUM(CASE WHEN Codigo_Naturaleza='50' THEN Monto ELSE 0 END)-SUM(CASE WHEN Codigo_Naturaleza='40' THEN Monto ELSE 0 END)Saldo from reg_cuentas INNER JOIN clasificacion_cuentas ON clasificacion_cuentas.Cuentas_Codigo_Cuenta=reg_cuentas.cuentas_Codigo_Cuenta WHERE clasificacion_cuentas.Clasificacion_Cuentas='20' and reg_cuentas.cuentas_Codigo_Cuenta  NOT IN('20112') AND reg_cuentas.ejer_idEjercicio_Fiscal='$ejer_idEjercicio_Fiscal' GROUP by clasificacion_cuentas.Cuentas_Codigo_Cuenta";
 }
 function selectSaldoPasivoCP($ejer_idEjercicio_Fiscal){
   return "select ( select IFNULL(SUM(Monto),0) FROM reg_cuentas WHERE cuentas_Codigo_Cuenta IN('2011','2012','2013','2014','2015','2016','2017','2018','2019','20111','2010','20110') AND Codigo_Naturaleza='50' and ejer_idEjercicio_Fiscal='$ejer_idEjercicio_Fiscal' ) - ( select IFNULL(SUM(Monto),0) FROM reg_cuentas WHERE cuentas_Codigo_Cuenta IN('2011','2012','2013','2014','2015','2016','2017','2018','2019','20111','2010','20110') AND Codigo_Naturaleza='40' and ejer_idEjercicio_Fiscal='$ejer_idEjercicio_Fiscal' ) AS 'Saldo_PasivoCP'";
 }
 function selectPasivoLP($ejer_idEjercicio_Fiscal){
  return "select reg_cuentas.Nombre_Cuenta,reg_cuentas.cuentas_Codigo_Cuenta,SUM(CASE WHEN Codigo_Naturaleza='40' THEN Monto ELSE 0 END)Total_Cargo, SUM(CASE WHEN Codigo_Naturaleza='50' THEN Monto ELSE 0 END)Total_Abono,SUM(CASE WHEN Codigo_Naturaleza='50' THEN Monto ELSE 0 END)-SUM(CASE WHEN Codigo_Naturaleza='40' THEN Monto ELSE 0 END)Saldo from reg_cuentas INNER JOIN clasificacion_cuentas ON clasificacion_cuentas.Cuentas_Codigo_Cuenta=reg_cuentas.cuentas_Codigo_Cuenta WHERE clasificacion_cuentas.Clasificacion_Cuentas='21' AND reg_cuentas.ejer_idEjercicio_Fiscal='$ejer_idEjercicio_Fiscal' GROUP by clasificacion_cuentas.Cuentas_Codigo_Cuenta";
 }
 function selectSaldoPasivoLP($ejer_idEjercicio_Fiscal){
   return "select ( select IFNULL(SUM(Monto),0) FROM reg_cuentas WHERE cuentas_Codigo_Cuenta IN('2111','2112','2113','2114') AND Codigo_Naturaleza='50' and ejer_idEjercicio_Fiscal='$ejer_idEjercicio_Fiscal' ) - ( select IFNULL(SUM(Monto),0) FROM reg_cuentas WHERE cuentas_Codigo_Cuenta IN('2111','2112','2113','2114') AND Codigo_Naturaleza='40' and ejer_idEjercicio_Fiscal='$ejer_idEjercicio_Fiscal' ) AS 'Saldo_PasivoLP'";
 }
 function selectOPasivos($ejer_idEjercicio_Fiscal){
  return "select reg_cuentas.Nombre_Cuenta,reg_cuentas.cuentas_Codigo_Cuenta,SUM(CASE WHEN Codigo_Naturaleza='40' THEN Monto ELSE 0 END)Total_Cargo, SUM(CASE WHEN Codigo_Naturaleza='50' THEN Monto ELSE 0 END)Total_Abono,SUM(CASE WHEN Codigo_Naturaleza='50' THEN Monto ELSE 0 END)-SUM(CASE WHEN Codigo_Naturaleza='40' THEN Monto ELSE 0 END)Saldo from reg_cuentas INNER JOIN clasificacion_cuentas ON clasificacion_cuentas.Cuentas_Codigo_Cuenta=reg_cuentas.cuentas_Codigo_Cuenta WHERE clasificacion_cuentas.Clasificacion_Cuentas='22' AND reg_cuentas.ejer_idEjercicio_Fiscal='$ejer_idEjercicio_Fiscal' GROUP by clasificacion_cuentas.Cuentas_Codigo_Cuenta";
 }
 function selectSaldoOPasivos($ejer_idEjercicio_Fiscal){
   return "select ( select IFNULL(SUM(Monto),0) FROM reg_cuentas WHERE cuentas_Codigo_Cuenta IN('2211') AND Codigo_Naturaleza='50' and ejer_idEjercicio_Fiscal='$ejer_idEjercicio_Fiscal' ) - ( select IFNULL(SUM(Monto),0) FROM reg_cuentas WHERE cuentas_Codigo_Cuenta IN('2211') AND Codigo_Naturaleza='40' and ejer_idEjercicio_Fiscal='$ejer_idEjercicio_Fiscal' ) AS 'Saldo_OPasivos'";
 }
 function selectCapital($ejer_idEjercicio_Fiscal){
  return "select reg_cuentas.Nombre_Cuenta,reg_cuentas.cuentas_Codigo_Cuenta,SUM(CASE WHEN Codigo_Naturaleza='40' THEN Monto ELSE 0 END)Total_Cargo, SUM(CASE WHEN Codigo_Naturaleza='50' THEN Monto ELSE 0 END)Total_Abono,SUM(CASE WHEN Codigo_Naturaleza='50' THEN Monto ELSE 0 END)-SUM(CASE WHEN Codigo_Naturaleza='40' THEN Monto ELSE 0 END)Saldo from reg_cuentas INNER JOIN clasificacion_cuentas ON clasificacion_cuentas.Cuentas_Codigo_Cuenta=reg_cuentas.cuentas_Codigo_Cuenta WHERE clasificacion_cuentas.Clasificacion_Cuentas='30' AND reg_cuentas.ejer_idEjercicio_Fiscal='$ejer_idEjercicio_Fiscal' GROUP by clasificacion_cuentas.Cuentas_Codigo_Cuenta";
 }
 
}   
?>