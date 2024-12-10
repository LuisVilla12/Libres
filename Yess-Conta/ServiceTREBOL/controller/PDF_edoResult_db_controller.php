<?php

///// obtengo la libreria mPDF //////
require_once __DIR__ . '/../mPDF/vendor/autoload.php';
///// Se manda a traer los archivos donde obtendremos las consultas //// 
require_once '../model/reg_cuentas.php';
require_once '../model/ejercicio_fiscal.php';
require_once '../model/empresa.php';
require_once '../model/inicioSesion.php';
require_once '../model/procedimiento_reg.php';
require_once '../db/ConnectDB.php';
$db=new ConnectDB();
$db->connect();



//echo $Num_Poliza;
$idEjercicio=$_GET['idEjercicio'];
//echo $idEjercicio;

$idEmpresa=$_GET['IdEmpresa'];
//$Cargo=$_GET['Cargo'];
//$Abono=$_GET['Abono'];
//$Saldo=$_GET['Saldo'];
$Email=$_GET['Email'];


$v= new reg_cuentas($idEjercicio);
$R=$db->select($v->selectDatosEdoResult($idEjercicio));
//print_r($R);

$Ventas= $R[0]['Ventas_Netas'];
    //console.log($scope.Ventas);
$Servicios=$R[0]['Ingreso_servicios'];
$IngresosTotales=$R[0]['Ingresos_Totales'];
$CostoVentas=$R[0]['Costo_ventas'];
$UtilidadBruta=$R[0]['Utilidad_Bruta'];
$GastosVentas=$R[0]['Gastos_Ventas'];
$GastosAdmin=$R[0]['Gastos_administracion'];
$dato1 = $UtilidadBruta;
$dato2 = $GastosVentas;
$dato3 = $GastosAdmin;
$UtilidadOperacion= $dato1-($dato2+$dato3);
//print_r($UtilidadOperacion);
$NomUtilidad="";
    //console.log($scope.UtilidadOperacion);
    if($UtilidadOperacion>=0){
      $NomUtilidad="Utilidad de Operación";
    }else{
      $NomUtilidad="Pérdida de Operación";
    }
$PTU=$R[0]['Saldo_PTU'];
$OtrosGastos=$R[0]['OtroGastos'];
$OtrosIngresos=$R[0]['OtrosIngresos'];
$datoUtilidadOpe= $UtilidadOperacion;
$dato4 = $PTU;
$dato5 = $OtrosGastos;
$dato6 = $OtrosIngresos;
$UtilidadAI= $datoUtilidadOpe+$dato6-($dato4+$dato5);
     //console.log($scope.UtilidadAI);
$Nom2Utilidad="";
   if($UtilidadAI>=0){
      $Nom2Utilidad="Utilidad Antes de Impuestos";
    }else{
      $Nom2Utilidad="Pérdida antes de Impuestos";
    }
$Impuestos=$R[0]['Impuestos'];
$datoUtilidadAI = $UtilidadAI;
$dato7 = $Impuestos;

$UtilidadNeta= $datoUtilidadAI-$dato7;
$Nom3Utilidad="";
    if($UtilidadNeta>=0){
      $Nom3Utilidad="Utilidad Neta";
    }else{
      $Nom3Utilidad="Pérdida Neta";
    }

$s= new Usuarios($Email);
$n=$db->select($s->selectUsua($Email));
$Usuario=$n[0]['Nombre'];
$APP=$n[0]['APP'];
$APM=$n[0]['APM'];
//print_r($TotalCargo);
//echo $tipoPoliza;
//echo json_encode($x);
//print_r($x);
/*$a= new reg_cuentas($Nombre_Cuenta, $idEjercicio);
$resp=$db->select($a->selectDatosCuenta($Nombre_Cuenta, $idEjercicio));
if($resp){ 
$Asientos=dibujarCampPolizas($resp);
  //exit();
}*/

$m= new empresa($idEmpresa);
$r=$db->select($m->selectEmpresaIDStr($idEmpresa));
//echo $r;
$a= new ejercicio_fiscal($idEjercicio);
$w=$db->select($a->selectEjercicio($idEjercicio));
//print_r($w);
//print_r($cuentas_Codigo_Cuenta);
$Nombre_Empresa=$r[0]['Nombre'];
$Mes=$w[0]['Mes'];
$Proc_Reg=$w[0]['Proc_Reg'];
$b= new procedimiento_reg($Proc_Reg);
$c=$db->select($b->selectProcedimiento($Proc_Reg));
//print_r($c);

$Procedimiento=$c[0]['Nombre'];

/*$Fecha_Factura=$resp[0]['Fecha_Factura'];
setlocale(LC_TIME, 'spanish');
$Fecha_FacturaMof = strftime("%A, %d de %B del %Y", strtotime($Fecha_Factura));
$Fecha_Reg=$resp[0]['Fecha_Reg'];
setlocale(LC_TIME, 'spanish');
$Fecha_RegMof = strftime("%A, %d de %B del %Y", strtotime($Fecha_Reg));
//print_r($Fecha_Reg);*/

$Year = date("Y");



$mpdf = new \Mpdf\Mpdf(['format' => 'Letter']);
$css = file_get_contents('../../css/formato.css');
$mpdf->WriteHTML($css,1);
$HTML='<!DOCTYPE html>
<html>
<head>
<title>Edo. Resultados del Mes de '.$Mes.'</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<style>
                @page {
                    header: html_myHeader;
                    footer: html_myFooter;
                    content: html_myContent;
                    margin-top: 6.8cm;
                    margin-bottom: 5cm;
                }

                #header-content {
                    position: fixed;
                   
                }

                #footer-content {
                    position: fixed;
                    bottom: 0;
                      
                }

                
                #absolute-element-footer2 {
                    position: fixed;
                    bottom: 0; 

                }      
          </style>
</head>
<body>
<htmlpageheader name="myHeader">

           <div id="header-content">

             <table class="table" width="100%" >
                <thead>
                  <tr>
                    <th align="left" class="noborde style1" style="width:25%"><img src="../../img/IGE.png" width="38" style="padding-top:2px; padding-bottom:2px; padding-left:5px;"></th>

                    <th colspan="2" class="noborde style1" align="center">
                        <h3>'.$Nombre_Empresa.'</h3>
                    </th>
              
                    <th id="logo" class="noborde style1" style="width:25%" align="right"> <img src="../../img/ITSLibres.png" style="padding-top:2px; padding-bottom:2px;" width="50" class="imgITSL"></th>
                </thead>
                <tbody>
                  <tr>
                    <td colspan="2" align="left" class="tam12 style1">PROCEDIMIENTO DE REGISTRO:</td>
                    <td align="center" class="tam12 style1" colspan="2">'.$Procedimiento.'</td>
                  </tr>
                  <tr>
                    <td colspan="2" align="left" class="tam12 style1">PERIODO:</td>
                    <td align="center" class="tam12 style1" colspan="2">'.$Mes.'</td>
                  </tr>

                </tbody>
             </table>
             <br>
             <h3 align="center">'.$Nombre_Empresa.'</h3>
             <h5 align="center">Estado de Resultados del Mes de '.$Mes.' del '.$Year.'</h5>
           </div>
        </htmlpageheader>

        <htmlpagefooter name="myFooter">

     <div id="absolute-element-footer2">

          <table id="footer-content" style="page-break-inside:avoid" class="table" width="100%">

             <tr>

                   <td class="noborde tam12 centerFirma" style="width:33%" align="center">

                                    ELABORÓ  
                                     <br>
                                    &nbsp; <br>
                                    &nbsp; 
                                             
                                   
                                      <hr>
                        '.$Usuario.' '.$APP.' '.$APM.'
                                    &nbsp; <br>
                                    &nbsp; <br>
                                    &nbsp; <br>
                                    &nbsp;

                    </td>


                    <td class="noborde tam12 centerFirma" style="width:34%" align="center">

                                    Vo.Bo.
                                     <br>
                                    &nbsp; <br>
                                    &nbsp; 
                                              
                             
                                     <hr>
                            JEFE ADMINISTRATIVO
                                    &nbsp; <br>
                                    &nbsp; <br>
                                    &nbsp; <br>
                                <h3>{PAGENO}/{nbpg}</h3>
                     </td>



                     <td class="noborde tam12 centerFirma" style="width:33%" align="center">

                           AUTORIZÓ
                                      <br>
                                    &nbsp; <br>
                                    &nbsp; 
                                             
                             
                                     <hr>
                                 GERENTE ADMINISTRATIVO
                                    &nbsp; <br>
                                    &nbsp; <br>
                                    &nbsp; <br>
                                    &nbsp;
                           
                     </td>
           
              </tr>     
          </table>
    </div> 
                
</htmlpagefooter>

<table class="table" width="100%">
                    ';
                     $HTML.=Encabezados();
                     $HTML .='
                <tbody>
                <tr>
              
              <td align="center" style="height:30px;">Ventas Netas</td>
              <td align="right">$ '.number_format($Ventas, 2, '.', ',').'</td>

            </tr>
            <tr>
              
              <td align="center" style="height:30px;">Ingreso por Servicios</td>
              <td align="right">$ '.number_format($Servicios, 2, '.', ',').'</td>

            </tr>
            <tr>
              <td align="center" style="height:30px;">Ingreso totales</td>
              <td align="right">$ '.number_format($IngresosTotales, 2, '.', ',').'</td>

            </tr>
            <tr>
              
              <td align="center" style="height:30px;">Costo de Ventas</td>
              <td align="right">$ '.number_format($CostoVentas, 2, '.', ',').'</td>
            </tr>
            <tr>
              <td align="center" style="height:30px;"><strong>Utilidad Bruta</strong></td>
              <td align="right"><strong>$ '.number_format($UtilidadBruta, 2, '.', ',').'</strong></td>
            </tr>
            <tr>
              
              <td align="center" style="height:30px;">Gastos de Venta</td>
              <td align="right">$ '.number_format($GastosVentas, 2, '.', ',').'</td>
            </tr>
            <tr>
              
              <td align="center" style="height:30px;">Gatos de Administración</td>
              <td align="right">$ '.number_format($GastosAdmin, 2, '.', ',').'</td>
            </tr>
            
            <tr>
              
              <td align="center" style="height:30px;"><strong>'.$NomUtilidad.'</strong></td>
              <td align="right"><strong>$ '.number_format($UtilidadOperacion, 2, '.', ',').'</strong></td>
            </tr>
            <tr>
              <td align="center" style="height:30px;">PTU</td>
              <td align="right">$ '.number_format($PTU, 2, '.', ',').'</td>
            </tr>
            <tr>
             
              <td align="center" style="height:30px;">Otros Gastos</td>
              <td align="right">$ '.number_format($OtrosGastos, 2, '.', ',').'</td>
            </tr>
            <tr>
         
              <td align="center" style="height:30px;">Otros Ingresos</td>
              <td align="right">$ '.number_format($OtrosIngresos, 2, '.', ',').'</td>
            </tr>
            <tr>
              
              <td align="center" style="height:30px;"><strong>'.$Nom2Utilidad.'</strong></td>
              <td align="right"><strong>$ '.number_format($UtilidadAI, 2, '.', ',').'</strong></td>
            </tr>
            <tr>
             
              <td align="center" style="height:30px;">Impuestos</td>
              <td align="right">$ '.number_format($Impuestos, 2, '.', ',').'</td>
            </tr>
            <tr>
             
              <td align="center" style="height:30px;"><strong>'.$Nom3Utilidad.'</strong></td>
              <td align="right"><strong>$ '.number_format($UtilidadNeta, 2, '.', ',').'</strong></td>
            </tr>
                </tbody>
             </table>

</body>';

// Write some HTML code:
$mpdf->WriteHTML($HTML);

// Output a PDF file directly to the browser
$mpdf->Output('Edo. Result del Mes de '.$Mes.'.pdf','i');

/*function dibujarCampPolizas($resp){
  $docReporte="";
  foreach ($resp as $cuenta)
    {  
      setlocale(LC_TIME, 'spanish');
      $docReporte .= '<tr> 
       <td class="noborde centrar tam12 style1">'.$cuenta['Num_Poliza'].'</td>
       <td class="noborde centrar tam12 style1" style="text-align: justify;">'.utf8_encode(strftime("%A, %d de %B del %Y", strtotime($cuenta['Fecha_Factura']))).'</td>
       </tr>';
     }
  return $docReporte;
}*/

function Encabezados(){
  return '<thead>
           <tr style="background-color: #1C2D66;">
             <td class="noborde negrita centrar  style1" style="width:50%;">CUENTAS</td>
             <td class="noborde negrita centrar  style1" style="">SALDO</td>
           </tr>
         </thead>';

}


?>