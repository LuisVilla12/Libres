<?php
header("Content-Type: text/html; charset=utf-8"); //Cabecera de datos
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE"); 

require_once '../model/empresa.php';
//require_once '../model/usuario_empresa.php';
require_once '../db/ConnectDB.php';

$metodo=$_SERVER["REQUEST_METHOD"];
$db=new ConnectDB();
$db->connect();
switch ($metodo) {
    case 'GET':
        if(isset($_GET['Email'])){
        $emp=new empresa();
        $Email=$_GET['Email'];
        //print_r($Email);
		    $r=$db->select($emp->selectAllEmpresasUserStr($Email));
		    echo json_encode($r);
      }else if(isset($_GET['idEmpresa'])){
        $idEmpresa= $_GET['idEmpresa'];
        $e= new empresa($idEmpresa);
        $resp=$db->select($e->selectEmpresaIDStr($idEmpresa));
        if($resp){
          echo json_encode($resp); 
        }else{
          echo 0;
        }

      }else if(isset($_GET['id'])){
      	$idEmpresa= $_GET['id'];
        $e= new empresa($idEmpresa);
        $resp=$db->select($e->selectEmpresa($idEmpresa));
        echo json_encode($resp);

      }

        break;
    case 'POST':
    	$empre=json_decode(file_get_contents("php://input"));
		  //print_r($emp);
           $Nombre=$empre->Nombre;	
		  $Direccion=$empre->Direccion;
		  $Telefono=$empre->Telefono;
		  $RFC=$empre->RFC;
		  $Giro=$empre->Giro;
		  $e=new empresa(0, $Nombre, $Direccion, $Telefono, $Giro, $RFC);
		  $t=new empresa($Nombre);
		  $consul=$db->select($t->selectEmpresaStr($Nombre));
		  if($consul){
			  echo 0;
		  }else{
		  $resp=$db->insert($e->insertEmpresaStr());
		  $c= new empresa($Nombre); 	 

          if($resp){
					  //$miArreglo=array("success"=>true);
					  //json_encode($miArreglo);
				//print_r($consulta);
          	$respuesta=[];
          	$respuesta['num']=1;
				$consulta=$db->select($c->selectEmpresaStr($Nombre));
          if($consulta){
               $respuesta['datos']=$consulta;
          }else{
               echo 3;
          }
				echo json_encode($respuesta);
		      }else{
			  //$miArreglo=array("success"=>false);
			  echo 0;//json_encode($miArreglo);
		    }
		 }
    	  break;

/*    case 'PUT':
        $E = json_decode(file_get_contents("php://input"));
		$idProductos=$E->idProductos;
		$CodBarras=$E->CodBarras;
		$NomProducto=$E->NomProducto;
 		$PrecioMayoreo=$E->PrecioMayoreo;
 		$PrecioVenta=$E->PrecioVenta;
 		$Existencias=$E->Existencias;
 		$Medida=$E->Medida;
 		$Status=$E->Status;
		$Observaciones=$E->Observaciones;
        $FechaModif=date ("Y-m-d H:i:s", strtotime($E->FechaModif));
 		$idPYME=$E->idPYME;
 		$idClasificacion=$E->idClasificacion;
 		$idProveedores=$E->idProveedores;   

		$p=new Productos($idProductos,$CodBarras,$NomProducto,$PrecioMayoreo,$PrecioVenta,$Existencias,$Medida,$Status,$Observaciones,$FechaModif,$idPYME,$idClasificacion,$idProveedores);		
		$r=$db->update($p->updateProductoStr());
		if($r){
			echo "El producto fue actualizado";
		}else{
			echo "Error";
		}
        break;    
    case 'POST':
        $E = json_decode(file_get_contents("php://input"));
        $CodBarras=$E->CodBarras;
		$NomProducto=$E->NomProducto;
 		$PrecioMayoreo=$E->PrecioMayoreo;
 		$PrecioVenta=$E->PrecioVenta;
 		$Existencias=$E->Existencias;
 		$Medida=$E->Medida;
 		$Status=$E->Status;
 		$Observaciones=$E->Observaciones;
 		$FechaModif=date ("Y-m-d H:i:s", strtotime($E->FechaModif));
 		$idPYME=$E->idPYME;
 		$idClasificacion=$E->idClasificacion;
        $idProveedores=$E->idProveedores;

        $p=new Productos(0, $CodBarras,$NomProducto,$PrecioMayoreo,$PrecioVenta,$Existencias,$Medida,
        $Status,$Observaciones,$FechaModif,$idPYME,$idClasificacion,$idProveedores);				
        $r=$db->insert($p->insertProdcutoStr());

        if($r){
			echo "El producto fue agregado";
		}else{
			echo "Error";
		}
        break;      
    case 'DELETE':
        $idProductos=$_GET["idProductos"];	
		$p=new Productos($idProductos);		
		$r=$db->delete($p->deleteProductoStr());
		if($r){
			echo "El producto fue eliminado";
		}else{
			echo "Error";
		}
        break; 
    default:
        echo "Opción de envío invalida";
        break; */   
}
?>
