<?php
header("Content-Type: text/html; charset=utf-8"); //Cabecera de datos
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE"); 


require_once '../model/usuario_empresa.php';
require_once '../db/ConnectDB.php';

$metodo=$_SERVER["REQUEST_METHOD"];
$db=new ConnectDB();
$db->connect();
switch ($metodo) {
    case 'GET':
        /*$emp=new empresa();
		$r=$db->select($emp->selectAllEmpresasUserStr("ricardomtnezhdez@gmail.com"));
		echo json_encode($r);*/
        break;
    case 'POST':
    	$empre=json_decode(file_get_contents("php://input"));
		  //print_r($empre);
             $idEmpresa= $empre->idEmpresa;
             $Email= $empre->Email; 

             $regisEmp= new usuarios_empresa($Email,$idEmpresa);
             $result=$db->insert($regisEmp->insertUsuaEmpStr());
             if($result){
                echo 1;
             }else{
                echo 0;
             }

    	  

       	  break;
  
}
?>
