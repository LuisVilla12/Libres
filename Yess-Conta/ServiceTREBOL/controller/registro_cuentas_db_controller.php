<?php
header("Content-Type: text/html; charset=utf-8"); //Cabecera de datos
header("Access-Control-Allow-Origin:*");
header("Access-Control-Allow-Methods:","GET,POST,OPTIONS, PUT, DELETE");
header("Access-Control-Allow-Headers:","X-Requested-with, content-type");

require_once '../model/naturaleza.php';
require_once '../model/cuentas_proc_reg.php';
require_once '../model/reg_cuentas.php';
require_once '../model/cuentas_info.php';
require_once '../db/ConnectDB.php';

$metodo=$_SERVER["REQUEST_METHOD"];
$db=new ConnectDB();
$db->connect();
switch ($metodo) {
	case 'GET':
	     if(isset($_GET['idEjercicio'])){
            $ejer_idEjercicio_Fiscal= $_GET['idEjercicio'];
            $t= new reg_cuentas($ejer_idEjercicio_Fiscal);
            $w=$db->select($t->selectAllRegistStr($ejer_idEjercicio_Fiscal));
		    echo json_encode($w);

	     }else if(isset($_GET['RegistroConsul'])){
            $Codigo_Proc_Reg= $_GET['RegistroConsul'];
            $t= new cuentas_info($Codigo_Proc_Reg);
            $w=$db->select($t->selectCuentasInfo($Codigo_Proc_Reg));
            echo json_encode($w);

       }else if( isset($_GET['Arreglo'])){
           
           //$Codigo_Proc_Reg= $_GET['idProc'];
           $C= json_decode($_GET['Arreglo']);
           $Codigo_Proc_Reg= $C->idProc;
           $Codigo_Cuenta= $C->idCuenta;
           //print_r($Codigo_Proc_Reg);
           $c= new cuentas_proc_reg($Codigo_Proc_Reg, $Codigo_Cuenta);
           $resp=$db->select($c->selectCuentaProc($Codigo_Proc_Reg, $Codigo_Cuenta));
           if($resp){
            echo json_encode($resp);
           }else{
            echo 0;
           }

         }else if(isset($_GET['datos'])){
            //print_r($_GET['datos']);
            $D = json_decode($_GET['datos']);
            $Codigo_Naturaleza= $D->cargo;
            $ejer_idEjercicio_Fiscal= $D->idEjercicio;
            $s= new reg_cuentas($Codigo_Naturaleza, $ejer_idEjercicio_Fiscal);
            $m=$db->select($s->selectSaldoCargo($Codigo_Naturaleza, $ejer_idEjercicio_Fiscal));
            echo json_encode($m);

       }else if(isset($_GET['Abono'])){
            //print_r($_GET['datos']);
            $A = json_decode($_GET['Abono']);
            $Codigo_Naturaleza= $A->abono;
            $ejer_idEjercicio_Fiscal= $A->idEjercicio;
            $t= new reg_cuentas($Codigo_Naturaleza, $ejer_idEjercicio_Fiscal);
            $n=$db->select($t->selectSaldoAbono($Codigo_Naturaleza, $ejer_idEjercicio_Fiscal));
            echo json_encode($n);

       }else if(isset($_GET['id'])){
            $ejer_idEjercicio_Fiscal= $_GET['id'];
            $t= new reg_cuentas($ejer_idEjercicio_Fiscal);
            $w=$db->select($t->selectDatosEdoResult($ejer_idEjercicio_Fiscal));
        echo json_encode($w);

       }else if(isset($_GET['id2'])){
            $ejer_idEjercicio_Fiscal= $_GET['id2'];
            $t= new reg_cuentas($ejer_idEjercicio_Fiscal);
            $w=$db->select($t->selectDatosEdoResult2($ejer_idEjercicio_Fiscal));
        echo json_encode($w);

       }else if(isset($_GET['valor1'])){
            $ejer_idEjercicio_Fiscal= $_GET['valor1'];
            $t= new reg_cuentas($ejer_idEjercicio_Fiscal);
            $w=$db->select($t->selectActivoC($ejer_idEjercicio_Fiscal));
        echo json_encode($w);

       }else if(isset($_GET['valor2'])){
            $ejer_idEjercicio_Fiscal= $_GET['valor2'];
            $t= new reg_cuentas($ejer_idEjercicio_Fiscal);
            $w=$db->select($t->selectSaldoActivoC($ejer_idEjercicio_Fiscal));
        echo json_encode($w);

       }else if(isset($_GET['valor3'])){
            $ejer_idEjercicio_Fiscal= $_GET['valor3'];
            $t= new reg_cuentas($ejer_idEjercicio_Fiscal);
            $w=$db->select($t->selectActivoNC($ejer_idEjercicio_Fiscal));
        echo json_encode($w);

       }else if(isset($_GET['valor4'])){
            $ejer_idEjercicio_Fiscal= $_GET['valor4'];
            $t= new reg_cuentas($ejer_idEjercicio_Fiscal);
            $w=$db->select($t->selectSaldoActivoNC($ejer_idEjercicio_Fiscal));
        echo json_encode($w);

       }else if(isset($_GET['valor5'])){
            $ejer_idEjercicio_Fiscal= $_GET['valor5'];
            $t= new reg_cuentas($ejer_idEjercicio_Fiscal);
            $w=$db->select($t->selectOtrosActivos($ejer_idEjercicio_Fiscal));
        echo json_encode($w);

       }else if(isset($_GET['valor6'])){
            $ejer_idEjercicio_Fiscal= $_GET['valor6'];
            $t= new reg_cuentas($ejer_idEjercicio_Fiscal);
            $w=$db->select($t->selectSaldoOActivos($ejer_idEjercicio_Fiscal));
        echo json_encode($w);

       }else if(isset($_GET['valorSaldo'])){
            $ejer_idEjercicio_Fiscal= $_GET['valorSaldo'];
            $t= new reg_cuentas($ejer_idEjercicio_Fiscal);
            $w=$db->select($t->selectSaldoTotalActivos($ejer_idEjercicio_Fiscal));
        echo json_encode($w);

       }else if(isset($_GET['valor7'])){
            $ejer_idEjercicio_Fiscal= $_GET['valor7'];
            $t= new reg_cuentas($ejer_idEjercicio_Fiscal);
            $w=$db->select($t->selectPasivoCP($ejer_idEjercicio_Fiscal));
        echo json_encode($w);

       }else if(isset($_GET['valor8'])){
            $ejer_idEjercicio_Fiscal= $_GET['valor8'];
            $t= new reg_cuentas($ejer_idEjercicio_Fiscal);
            $w=$db->select($t->selectSaldoPasivoCP($ejer_idEjercicio_Fiscal));
        echo json_encode($w);

       }else if(isset($_GET['valor9'])){
            $ejer_idEjercicio_Fiscal= $_GET['valor9'];
            $t= new reg_cuentas($ejer_idEjercicio_Fiscal);
            $w=$db->select($t->selectPasivoLP($ejer_idEjercicio_Fiscal));
        echo json_encode($w);

       }else if(isset($_GET['valor10'])){
            $ejer_idEjercicio_Fiscal= $_GET['valor10'];
            $t= new reg_cuentas($ejer_idEjercicio_Fiscal);
            $w=$db->select($t->selectSaldoPasivoLP($ejer_idEjercicio_Fiscal));
        echo json_encode($w);

       }else if(isset($_GET['valor11'])){
            $ejer_idEjercicio_Fiscal= $_GET['valor11'];
            $t= new reg_cuentas($ejer_idEjercicio_Fiscal);
            $w=$db->select($t->selectOPasivos($ejer_idEjercicio_Fiscal));
        echo json_encode($w);

       }else if(isset($_GET['valor12'])){
            $ejer_idEjercicio_Fiscal= $_GET['valor12'];
            $t= new reg_cuentas($ejer_idEjercicio_Fiscal);
            $w=$db->select($t->selectSaldoOPasivos($ejer_idEjercicio_Fiscal));
        echo json_encode($w);

       }else if(isset($_GET['valor13'])){
            $ejer_idEjercicio_Fiscal= $_GET['valor13'];
            $t= new reg_cuentas($ejer_idEjercicio_Fiscal);
            $w=$db->select($t->selectCapital($ejer_idEjercicio_Fiscal));
        echo json_encode($w);

       }else{
         $n=new naturaleza();
		 $r=$db->select($n->selectAllStr());
		 echo json_encode($r);	
         }

        break;
    case 'POST':
    	$reg=json_decode(file_get_contents('php://input'));
         
        $idReg_Cuentas="";
        $Num_Poliza=$reg->Num_Poliza;
    	$Fecha_Factura=$reg->Fecha_Factura;
        $Fecha_Reg=$reg->Fecha_Reg;
    	$cuentas_Codigo_Cuenta=$reg->cuentas_Codigo_Cuenta;
    	$Nombre_Cuenta=$reg->Nombre_Cuenta;
    	$Concepto=$reg->Concepto;
    	$Monto=$reg->Monto;
    	$Codigo_Naturaleza=$reg->Codigo_Naturaleza;
    	$ejer_idEjercicio_Fiscal=$reg->ejer_idEjercicio_Fiscal;

    	$r= new reg_cuentas($idReg_Cuentas, $Num_Poliza, $Fecha_Factura, $Fecha_Reg,
    		$cuentas_Codigo_Cuenta, $Nombre_Cuenta, $Concepto, $Monto, $Codigo_Naturaleza, $ejer_idEjercicio_Fiscal);
    	$resp=$db->insert($r->insertRegistroStr());
    	if($resp){
          echo json_encode($resp);
    	}else{
          echo 0;
    	}

    	break;
      case 'PUT':
      $reg=json_decode(file_get_contents('php://input'));
         
        $idReg_Cuentas=$reg->idReg_Cuentas;
        $Num_Poliza=$reg->Num_Poliza;
      $Fecha_Factura=$reg->Fecha_Factura;
        $Fecha_Reg=$reg->Fecha_Reg;
      $cuentas_Codigo_Cuenta=$reg->cuentas_Codigo_Cuenta;
      $Nombre_Cuenta=$reg->Nombre_Cuenta;
      $Concepto=$reg->Concepto;
      $Monto=$reg->Monto;
      $Codigo_Naturaleza=$reg->Codigo_Naturaleza;
      $ejer_idEjercicio_Fiscal=$reg->ejer_idEjercicio_Fiscal;

      $r= new reg_cuentas($idReg_Cuentas, $Num_Poliza, $Fecha_Factura, $Fecha_Reg,
      $cuentas_Codigo_Cuenta, $Nombre_Cuenta, $Concepto, $Monto, $Codigo_Naturaleza, $ejer_idEjercicio_Fiscal);
      $resp=$db->update($r->updateRegistroStr());
      if($resp){
          echo json_encode($resp);
      }else{
          echo 0;
      }

      break;
      case 'DELETE':
      if(isset($_GET['idRegistro'])){
        $idReg_Cuentas=$_GET['idRegistro'];  
        $p=new reg_cuentas($idReg_Cuentas);   
        $r=$db->delete($p->deleteAsientoStr());
        if($r){
          echo json_encode($r);
        }else{
          echo 0;
        }
      } else if(isset($_GET['RegistroId'])){
        $ejer_idEjercicio_Fiscal=intval($_GET['RegistroId']);
        //print_r($ejer_idEjercicio_Fiscal);
        $t= new reg_cuentas($ejer_idEjercicio_Fiscal);
        $resp= $db->delete($t->deleteAllRegistStr($ejer_idEjercicio_Fiscal));
        if($resp){
          echo true;
        }else{
          echo 0;
        }
      }      

      break;  
}        
?>