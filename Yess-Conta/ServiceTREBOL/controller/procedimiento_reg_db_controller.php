<?php
header("Content-Type: text/html; charset=utf-8"); //Cabecera de datos
header("Access-Control-Allow-Origin:*");
header("Access-Control-Allow-Methods:","GET,POST,OPTIONS, PUT, DELETE");
header("Access-Control-Allow-Headers:","X-Requested-with, content-type");

require_once '../model/procedimiento_reg.php';
require_once '../db/ConnectDB.php';

$metodo=$_SERVER["REQUEST_METHOD"];
$db=new ConnectDB();
$db->connect();
switch ($metodo) {
	case 'GET':
		$p=new procedimiento_reg();
		$r=$db->select($p->selectAllProcedimientosStr());
		echo json_encode($r);
        break;



        }        
?>