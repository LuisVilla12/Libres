<?php
session_start();
header("Content-Type: text/html; charset=utf-8"); //Cabecera de datos
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE"); 

require_once '../model/inicioSesion.php';
require_once '../db/ConnectDB.php';

$metodo=$_SERVER["REQUEST_METHOD"];
$db=new ConnectDB();
$db->connect();
switch ($metodo) {
    case 'GET':
        /*$prod=new usuarios();
		$r=$db->select($prod->selectAllUsuariosStr());
		echo json_encode($r);*/
        break;

       case 'POST':

		  $E=json_decode(file_get_contents("php://input"));
		  //print_r($E);
		   $Email="";
		   $Contrasena="";
		   $response = [];
           if(isset($E->Email)){$Email=$E->Email;}
           if(isset($E->Contrasena)){$Contrasena=$E->Contrasena;}

		if($Email=="" && $Contrasena==""){//Consulta de sesión al inicio de la carga de la aplicación
			echo 0;
		} 
		else if($Email!="" && $Contrasena!=""){
			$p=new usuarios($Email, $Contrasena);
		  //echo $p->insertProductosStr();
		  $resp=$db->select($p->selectUsuario($Email, $Contrasena));
		  //print_r($resp);
		  if($resp){  
		  	       //session_start();
		  	       $_SESSION[$Email]=$resp;
		  	       $response['Datos']=$resp;
		  	       $response['status'] = 'loggedin';
		  	       echo json_encode($response);
		  	       //session_destroy();
					  /*$miArreglo=array("success"=>true);
					  echo json_encode($miArreglo);*/	    

		  }else{
		  	      $_SESSION['Datos']=0;
			  /*$miArreglo=array("success"=>false);
			  echo json_encode($miArreglo);*/
		  	       echo json_encode($_SESSION['Datos']);

		  }
		   
		}
		else if($Email!=""){

               if(isset($_SESSION[$Email])){
               	$_SESSION[$Email];
                 $Datos=[];
				$Datos['datos']= $_SESSION[$Email];
				 $D=$Datos['datos'][0]["Email"];
				if($D==$Email){
                   //print_r($D);
				   echo 2;
				}/*else{
					echo 1;
				}*/
               }else{
               
				echo 1;

		    }
			
		}        						
		 
		  break;

  }               
?>   