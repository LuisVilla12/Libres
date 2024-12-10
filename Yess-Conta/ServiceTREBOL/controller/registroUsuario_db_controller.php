<?php
header("Content-Type: text/html; charset=utf-8"); //Cabecera de datos
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE"); 

require_once '../model/registro.php';
require_once '../db/ConnectDB.php';

$metodo=$_SERVER["REQUEST_METHOD"];
$db=new ConnectDB();
$db->connect();
switch ($metodo) {
    case 'GET':
        $prod=new usuarios();
		$r=$db->select($prod->selectAllUsuariosStr());
		echo json_encode($r);
        break;

       case 'POST':
		  $E=json_decode(file_get_contents("php://input"));
		  //print_r($E);
		  $Nombre=$E->Nombre;
		  $APP=$E->APP;
		  $APM=$E->APM;
		  $Tel=$E->Tel;
		  $Email=$E->Email;
          $Contrasena=$E->Contrasena;
          									
		  $p=new usuarios($Nombre, $APP, $APM, $Tel,  $Email, $Contrasena);
		  $t=new usuarios($Email);
		  //echo $p->insertProductosStr();
		  $resp1=$db->select($t->selectUsuario($Email));
		  if($resp1){
					  
					  echo 1;
		  }else{

			  $resp=$db->insert($p->insertUsuarioStr());
			  
			  if($resp){
					  $miArreglo=array("success"=>true);
					  echo json_encode($miArreglo);
		      }else{
			  $miArreglo=array("success"=>false);
			  echo json_encode($miArreglo);
		    }
		  }

		  
		  break;

  }        
?>   
      

