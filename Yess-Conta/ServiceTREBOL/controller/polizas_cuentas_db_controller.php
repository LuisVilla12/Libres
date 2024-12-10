<?php
header("Content-Type: text/html; charset=utf-8"); //Cabecera de datos
header("Access-Control-Allow-Origin:*");
header("Access-Control-Allow-Methods:","GET,POST,OPTIONS, PUT, DELETE");
header("Access-Control-Allow-Headers:","X-Requested-with, content-type");

require_once '../model/reg_cuentas.php';
require_once '../model/cuentas.php';
require_once '../db/ConnectDB.php';

$metodo=$_SERVER["REQUEST_METHOD"];
$db=new ConnectDB();
$db->connect();
switch ($metodo) {
	case 'GET':
	     if(isset($_GET['idEjer'])){
            $ejer_idEjercicio_Fiscal= $_GET['idEjer'];
            $h= new reg_cuentas($ejer_idEjercicio_Fiscal);
            $y=$db->select($h->selectAllPolizas($ejer_idEjercicio_Fiscal));
            echo json_encode($y);

	     }else if(isset($_GET['datosPoliza'])){
            $C= json_decode($_GET['datosPoliza']);
            $Num_Poliza= $C->NumPoliza;
            $ejer_idEjercicio_Fiscal= $C->idEjer;
            $t= new reg_cuentas($Num_Poliza, $ejer_idEjercicio_Fiscal);
            $x=$db->select($t->selectDatosPoliza($Num_Poliza, $ejer_idEjercicio_Fiscal));
            echo json_encode($x);
         }else if(isset($_GET['IDEjercicio'])){
            $ejer_idEjercicio_Fiscal= $_GET['IDEjercicio'];
            $s= new reg_cuentas($ejer_idEjercicio_Fiscal);
            $w=$db->select($s->selectAllCuentas($ejer_idEjercicio_Fiscal));
            echo json_encode($w);

         }else if(isset($_GET['datosCuenta'])){
            $E= json_decode($_GET['datosCuenta']);
            $Nombre_Cuenta= $E->NombreCuenta;
            $ejer_idEjercicio_Fiscal= $E->idEjer;
            $a= new reg_cuentas($Nombre_Cuenta, $ejer_idEjercicio_Fiscal);
            $m=$db->select($a->selectDatosCuenta($Nombre_Cuenta, $ejer_idEjercicio_Fiscal));
            echo json_encode($m);
         }else if(isset($_GET['Saldocargo'])){
            $U= json_decode($_GET['Saldocargo']);
            $Codigo_Naturaleza= $U->cargo;
            $Num_Poliza= $U->NumeroPoliza;
            $ejer_idEjercicio_Fiscal= $U->idEjercicio;
            $l= new reg_cuentas($Num_Poliza,$Codigo_Naturaleza, $ejer_idEjercicio_Fiscal);
            $b=$db->select($l->selectSaldoCPoliza($Num_Poliza,$Codigo_Naturaleza, $ejer_idEjercicio_Fiscal));
            echo json_encode($b);
         }else if(isset($_GET['Saldoabono'])){
            $j= json_decode($_GET['Saldoabono']);
            $Codigo_Naturaleza= $j->abono;
            $Num_Poliza= $j->NumeroPoliza;
            $ejer_idEjercicio_Fiscal= $j->idEjercicio;
            $q= new reg_cuentas($Num_Poliza,$Codigo_Naturaleza, $ejer_idEjercicio_Fiscal);
            $z=$db->select($q->selectSaldoAPoliza($Num_Poliza,$Codigo_Naturaleza, $ejer_idEjercicio_Fiscal));
            echo json_encode($z);
         }else if(isset($_GET['Salcargo'])){
            $U= json_decode($_GET['Salcargo']);
            $Codigo_Naturaleza= $U->cargo;
            $Nombre_Cuenta= $U->NomCuenta;
            $ejer_idEjercicio_Fiscal= $U->idEjercicio;
            $l= new reg_cuentas($Nombre_Cuenta,$Codigo_Naturaleza, $ejer_idEjercicio_Fiscal);
            $b=$db->select($l->selectSaldoDCuentas($Nombre_Cuenta,$Codigo_Naturaleza, $ejer_idEjercicio_Fiscal));
            echo json_encode($b);
         }else if(isset($_GET['Salabono'])){
            $j= json_decode($_GET['Salabono']);
            $Codigo_Naturaleza= $j->abono;
            $Nombre_Cuenta= $j->NomCuenta;
            $ejer_idEjercicio_Fiscal= $j->idEjercicio;
            $q= new reg_cuentas($Nombre_Cuenta,$Codigo_Naturaleza, $ejer_idEjercicio_Fiscal);
            $z=$db->select($q->selectSaldoHCuentas($Nombre_Cuenta,$Codigo_Naturaleza, $ejer_idEjercicio_Fiscal));
            echo json_encode($z);
         }else if(isset($_GET['SaldoTotal'])){
            $H= json_decode($_GET['SaldoTotal']);
            $cuentas_Codigo_Cuenta= $H->Codigo;
            $ejer_idEjercicio_Fiscal= $H->idEjercicio;
            $S= new reg_cuentas($cuentas_Codigo_Cuenta, $ejer_idEjercicio_Fiscal);
            $t=$db->select($S->selectSaldoTotal($cuentas_Codigo_Cuenta, $ejer_idEjercicio_Fiscal));
            echo json_encode($t);
         }else if(isset($_GET['NomCuenta'])){
            $Nombre_Cuenta= $_GET['NomCuenta'];
            $S= new cuentas($Nombre_Cuenta);
            $t=$db->select($S->selectCodigo($Nombre_Cuenta));
            echo json_encode($t);
         }

     
        break;

  }        
?>