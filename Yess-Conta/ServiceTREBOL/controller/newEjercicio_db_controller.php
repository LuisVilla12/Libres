<?php
header("Content-Type: text/html; charset=utf-8"); //Cabecera de datos
header("Access-Control-Allow-Origin:*");
header("Access-Control-Allow-Methods:","GET,POST,OPTIONS, PUT, DELETE");
header("Access-Control-Allow-Headers:","X-Requested-with, content-type");

require_once '../model/ejercicio_fiscal.php';
require_once '../db/ConnectDB.php';

$metodo=$_SERVER["REQUEST_METHOD"];
$db=new ConnectDB();
$db->connect();
switch ($metodo) {
	case 'GET':
        if(isset($_GET['idEmpresa'])){
        $Empresa_idEmpresa= $_GET['idEmpresa'];
        $e= new ejercicio_fiscal($Empresa_idEmpresa);
        $resp=$db->select($e->selectEjerciciosIDStr($Empresa_idEmpresa));
         //print_r($resp);
          echo json_encode($resp); 
        
      }else if(isset($_GET['id'])){
        $idEjercicio_Fiscal= $_GET['id'];
        $e= new ejercicio_fiscal($idEjercicio_Fiscal);
        $resp=$db->select($e->selectMes($idEjercicio_Fiscal));
         //print_r($resp);
          echo json_encode($resp); 
      }else if(isset($_GET['idEjercicio'])){
        $idEjercicio_Fiscal= $_GET['idEjercicio'];
        $e= new ejercicio_fiscal($idEjercicio_Fiscal);
        $resp=$db->select($e->selectEjercicio($idEjercicio_Fiscal));
         //print_r($resp);
          echo json_encode($resp); 
      }

        break;
    case 'POST':
    	$E= json_decode(file_get_contents("php://input"));
    	$idEjericio_Fiscal="";
    	$Fecha=$E->Fecha;
    	$Mes=$E->Mes;
    	$Proc_Reg= $E->Proc_Reg;
    	$Estado=$E->Estado;
    	$Fecha_Fin="";
    	$Observaciones=$E->Observaciones;
    	$Empresa_idEmpresa=$E->idEmpresa;

    	$n=new ejercicio_fiscal($idEjericio_Fiscal, $Fecha, $Mes, $Proc_Reg, $Estado, 
    		$Fecha_Fin, $Observaciones, $Empresa_idEmpresa);
    	$resp=$db->insert($n->insertnewEjercicioStr());
    	if($resp){
          echo json_encode($resp);
    	}else{
          echo 0;
    	}
    	break;
      case 'DELETE':
      if(isset($_GET['idEjercicio_Fiscal'])){
        $idEjercicio_Fiscal=$_GET['idEjercicio_Fiscal'];  
        $p=new ejercicio_fiscal($idEjercicio_Fiscal);   
        $resp=$db->delete($p->deleteEjercicioStr($idEjercicio_Fiscal));
        if($resp){
          echo true;
        }else{
          echo 0;
        }
      }

      break;
      case 'PUT':
        
        $datos= json_decode(file_get_contents('php://input'));
        $idEjercicio_Fiscal=$datos->idEjercicio_Fiscal;
        $Estado=$datos->Estado;
        $Fecha_Fin=$datos->Fecha_Fin;
        $Empresa_idEmpresa=$datos->Empresa;

        $r= new ejercicio_fiscal($idEjercicio_Fiscal,$Estado,$Fecha_Fin,$Empresa_idEmpresa);
        $resp=$db->update($r->updateDatosEjercicio($idEjercicio_Fiscal,$Estado,$Fecha_Fin,$Empresa_idEmpresa));
        if($resp){
          echo json_encode($resp);
        }else{
          echo 0;
        }


      break; 
}        
?>