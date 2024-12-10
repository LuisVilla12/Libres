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
$Saldo_CS=$_GET['CapitalContable'];
$SaldoTotalActivos=$_GET['SaldoTotalActivos'];
$TotalPasivoCapital=$_GET['TotalPasivoCapital'];
//Activo circulante
$A1= new reg_cuentas($idEjercicio);
$r1=$db->select($A1->selectActivoC($idEjercicio));
//print_r($r1);
if($r1){ 
$CuentasActivo=dibujarCampActivosC($r1);
  //exit();
}else{
$CuentasActivo=camposVacios();
}

//Saldo activo circulante
$A2= new reg_cuentas($idEjercicio);
$r2=$db->select($A2->selectSaldoActivoC($idEjercicio));
$Saldo_AC=$r2[0]['Saldo_ActivoC'];
//print_r($r2);
$A3= new reg_cuentas($idEjercicio);
$r3=$db->select($A3->selectActivoNC($idEjercicio));
if($r3){ 
$CuentasActivoNC=dibujarCampActivoNC($r3);
  //exit();
}else{
$CuentasActivoNC=camposVacios();
}
//print_r($Saldo_AC);
$A4= new reg_cuentas($idEjercicio);
$r4=$db->select($A4->selectSaldoActivoNC($idEjercicio));
//print_r($r4);
$Saldo_ANC=$r4[0]['Saldo_ActivoNC'];

$A5= new reg_cuentas($idEjercicio);
$r5=$db->select($A5->selectOtrosActivos($idEjercicio));
if($r5){
$CuentasOActivos= dibujarCampActivosOA($r5);
}else{
$CuentasOActivos=camposVacios();
}
$A6= new reg_cuentas($idEjercicio);
$r6=$db->select($A6->selectSaldoOActivos($idEjercicio));
//print_r($r6);
$Saldo_OA=$r6[0]['Saldo_OtrosActivos'];

$A7= new reg_cuentas($idEjercicio);
$r7=$db->select($A7->selectPasivoCP($idEjercicio));
if($r7){ 
$CuentasPasivoC=dibujarCampPasivoC($r7);
  //exit();
}else{
$CuentasPasivoC=camposVacios();
}
$A8= new reg_cuentas($idEjercicio);
$r8=$db->select($A8->selectSaldoPasivoCP($idEjercicio));
//print_r($r8);
$Saldo_PC= $r8[0]['Saldo_PasivoCP'];

$A9= new reg_cuentas($idEjercicio);
$r9=$db->select($A9->selectPasivoLP($idEjercicio));
if($r9){ 
$CuentasPasivoL=dibujarCampPasivoL($r7);
  //exit();
}else{
$CuentasPasivoL=camposVacios();
}

$A10= new reg_cuentas($idEjercicio);
$r10=$db->select($A10->selectSaldoPasivoLP($idEjercicio));
//print_r($r10);
$Saldo_PL=$r10[0]['Saldo_PasivoLP'];

$A11= new reg_cuentas($idEjercicio);
$r11=$db->select($A11->selectOPasivos($idEjercicio));
if($r11){ 
$CuentasOtrosPasivos=dibujarCampOPasivos($r11);
  //exit();
}else{
$CuentasOtrosPasivos=camposVacios();
}

$A12= new reg_cuentas($idEjercicio);
$r12=$db->select($A12->selectSaldoOPasivos($idEjercicio));
//print_r($r12);
$Saldo_OP=$r12[0]['Saldo_OPasivos'];

$A13= new reg_cuentas($idEjercicio);
$r13=$db->select($A13->selectCapital($idEjercicio));
print_r($r13);
if($r13){ 
$CuentasCapitalS=dibujarCampCapital($r13);
  //exit();
}else{
$CuentasCapitalS=camposVacios();
}

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
<title>Balance Gral. del Mes de '.$Mes.'</title>
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
             <h5 align="center">Balance General del Mes de '.$Mes.' del '.$Year.'</h5>
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

<table width="100%">
                    ';
                     $HTML.=Encabezados();
                     $HTML .='
                <tbody>
                <tr>
              
              <td align="center" class="noborde" style="padding: 5px;">
              <table class="table" width="100%" style="margin-top:3px;">
              <thead style="color: white; background-color: #1C2D66;">
                <tr>
                  <th  colspan="2" style="background-color: white; color:black; font-size:12px;">Activo Circulante</th>
                </tr>
                <tr>
                  
                  <th style="font-size:12px; background-color: #1C2D66; color:white;" >Cuenta</th>
                  <th style="font-size:12px; background-color: #1C2D66; color:white;">Saldo</th>
                </tr>
              </thead>
              <tbody >
                ';
                   $HTML.=$CuentasActivo;
                   //$HTML.=camposVacios();
                   $HTML .='
              </tbody>
              <tfoot>
          <tr>
            <td align="center" style="background-color: white; font-size:12px;"><strong>Saldo Total:</strong></td>
            <td align="right" style=" font-size:10px;">$ '.number_format($Saldo_AC, 2, '.', ',').'</td>
          </tr>
            </tfoot>
            </table>
              </td>
              <td align="center" class="noborde" style="padding: 5px;">
              <table class="table" width="100%" style="">
              <thead style="color: white; background-color: #1C2D66;">
                <tr>
                  <th  colspan="2" style="background-color: white; color:black; font-size:12px;">Pasivo a Corto Plazo</th>
                </tr>
                <tr>
                  
                  <th style="font-size:12px;background-color: #1C2D66; color:white;">Cuenta</th>
                  <th style="font-size:12px;background-color: #1C2D66; color:white;">Saldo</th>
                </tr>
              </thead>
              <tbody>
                ';
                   $HTML.=$CuentasPasivoC;
                   //$HTML.=camposVacios();
                   $HTML .='
              </tbody>
                 <tfoot>
          <tr>
            <td align="center" style="background-color: white; font-size:12px;"><strong>Saldo Total:</strong></td>
            <td align="right" style=" font-size:10px;">$ '.number_format($Saldo_PC, 2, '.', ',').'</td>
          </tr>
            </tfoot>
            </table>
              </td>

            </tr>
            <tr>
              
              <td align="center" class="noborde" style="padding: 5px;">
              <table class="table" width="100%">
              <thead style="color: white; background-color: #1C2D66;">
                <tr>
                  <th  colspan="2" style="background-color: white; color:black; font-size:12px;">Activo No Circulante</th>
                </tr>
                <tr>
                  
                  <th style="font-size:12px;background-color: #1C2D66; color:white;" >Cuenta</th>
                  <th style="font-size:12px;background-color: #1C2D66; color:white;">Saldo</th>
                </tr>
              </thead>
              <tbody >
                ';
                   $HTML.=$CuentasActivoNC;
                   //$HTML.=camposVacios();
                   $HTML .='
              </tbody>
              <tfoot>
          <tr>
            <td align="center" style="background-color: white; font-size:12px;"><strong>Saldo Total:</strong></td>
            <td align="right" style=" font-size:10px;">$ '.number_format($Saldo_ANC, 2, '.', ',').'</td>
          </tr>
            </tfoot>
            </table>
              </td>
              <td align="center" class="noborde" style="padding: 5px;">
              <table class="table" width="100%" style="">
              <thead style="color: white; background-color: #1C2D66;">
                <tr>
                  <th  colspan="2" style="background-color: white; color:black; font-size:12px;">Pasivo a Largo Plazo</th>
                </tr>
                <tr>
                  
                  <th style="font-size:12px;background-color: #1C2D66; color:white;">Cuenta</th>
                  <th style="font-size:12px;background-color: #1C2D66; color:white;">Saldo</th>
                </tr>
              </thead>
              <tbody>
                ';
                   $HTML.=$CuentasPasivoL;
                   //$HTML.=camposVacios();
                   $HTML .='
              </tbody>
                 <tfoot>
          <tr>
            <td align="center" style="background-color: white; font-size:12px;"><strong>Saldo Total:</strong></td>
            <td align="right" style=" font-size:10px;">$ '.number_format($Saldo_PL, 2, '.', ',').'</td>
          </tr>
            </tfoot>
            </table>
              </td>

            </tr>
                            <tr>
              
              <td align="center" class="noborde" style="padding: 5px;">
              <table class="table" width="100%" style="margin-top:3px;">
              <thead style="color: white; background-color: #1C2D66;">
                <tr>
                  <th  colspan="2" style="background-color: white; color:black; font-size:12px;">Otros Activos</th>
                </tr>
                <tr>
                  
                  <th style="font-size:12px;background-color: #1C2D66; color:white;" >Cuenta</th>
                  <th style="font-size:12px;background-color: #1C2D66; color:white;">Saldo</th>
                </tr>
              </thead>
              <tbody >
                ';
                   $HTML.=$CuentasOActivos;
                   //$HTML.=camposVacios();
                   $HTML .='
              </tbody>
              <tfoot>
          <tr>
            <td align="center" style="background-color: white; font-size:12px;"><strong>Saldo Total:</strong></td>
            <td align="right" style=" font-size:10px;">$ '.number_format($Saldo_OA, 2, '.', ',').'</td>
          </tr>
            </tfoot>
            </table>
              </td>
              <td align="center" class="noborde" style="padding: 5px;">
              <table class="table" width="100%" style="">
              <thead style="color: white; background-color: #1C2D66;">
                <tr>
                  <th  colspan="2" style="background-color: white; color:black; font-size:12px;">Otros Pasivos</th>
                </tr>
                <tr>
                  
                  <th style="font-size:12px;background-color: #1C2D66; color:white;">Cuenta</th>
                  <th style="font-size:12px;background-color: #1C2D66; color:white;">Saldo</th>
                </tr>
              </thead>
              <tbody>
                ';
                   $HTML.=$CuentasOtrosPasivos;
                   //$HTML.=camposVacios();
                   $HTML .='
              </tbody>
                 <tfoot>
          <tr>
            <td align="center" style="background-color: white; font-size:12px;"><strong>Saldo Total:</strong></td>
            <td align="right" style=" font-size:10px;">$ '.number_format($Saldo_OP, 2, '.', ',').'</td>
          </tr>
            </tfoot>
            </table>
              </td>

            </tr>

                     <tr>
              
              <td align="center" class="noborde" style="padding: 5px;">
              
              </td>
              <td align="center" class="noborde" style="padding: 5px;">
              <h3 align="center">Capital contable</h3>
              <br>
              <table class="table" width="100%" style="">
              <thead style="color: white; background-color: #1C2D66;">
                <tr>
                  <th  colspan="2" style="background-color: white; color:black; font-size:12px;">Capital social</th>
                </tr>
                <tr>
                  
                  <th style="font-size:12px;background-color: #1C2D66; color:white;">Cuenta</th>
                  <th style="font-size:12px;background-color: #1C2D66; color:white;">Saldo</th>
                </tr>
              </thead>
              <tbody>
                ';
                   $HTML.=$CuentasCapitalS;
                   //$HTML.=camposVacios();
                   $HTML .='

       <tr> 
       <td class=" centrar tam12 style1">'.$Nom3Utilidad.'</td>
       <td class=" centrar tam12 style1" style="text-align: right;">$ '.number_format($UtilidadNeta, 2, '.', ',').'</td>
       </tr>
              </tbody>
                 <tfoot>
          <tr>
            <td align="center" style="background-color: white; font-size:12px;"><strong>Saldo Total:</strong></td>
            <td align="right" style=" font-size:10px;">$ '.number_format($Saldo_CS, 2, '.', ',').'</td>
          </tr>
            </tfoot>
            </table>
              </td>

            </tr>
             <tr>
              
              <td align="center" class="noborde" style="padding: 5px; margin-top:20px;">
              <br>
              <br>
               <h3>Saldo Total: $ '.number_format($SaldoTotalActivos, 2, '.', ',').'</h3>
              </td>
              <td align="center" class="noborde" style="padding: 5px;">
              <br>
              <h3>Saldo Total: $ '.number_format($TotalPasivoCapital, 2, '.', ',').'</h3>
              </td>
              </tr>
                </tbody>
             </table>

</body>';

// Write some HTML code:
$mpdf->WriteHTML($HTML);

// Output a PDF file directly to the browser
$mpdf->Output('Balance Gral. del Mes de '.$Mes.'.pdf','i');

function dibujarCampActivosC($r1){
  $AC="";
  foreach ($r1 as $ActivoC)
    {  
      setlocale(LC_TIME, 'spanish');
      $AC .= '<tr> 
       <td class=" centrar tam12 style1">'.$ActivoC['Nombre_Cuenta'].'</td>
       <td class=" centrar tam12 style1" style="text-align: right;">$ '.number_format($ActivoC['Saldo'], 2, '.', ',').'</td>
       </tr>';
     }
  return $AC;
}
function dibujarCampActivoNC($r3){
  $ANC="";
  foreach ($r3 as $ActivoNC)
    {  
      setlocale(LC_TIME, 'spanish');
      $ANC .= '<tr> 
       <td class=" centrar tam12 style1">'.$ActivoNC['Nombre_Cuenta'].'</td>
       <td class=" centrar tam12 style1" style="text-align: right;">$ '.number_format($ActivoNC['Saldo'], 2, '.', ',').'</td>
       </tr>';
     }
  return $ANC;
}
function dibujarCampActivosOA($r5){
  $OA="";
  foreach ($r5 as $OActivos)
    {  
      setlocale(LC_TIME, 'spanish');
      $OA .= '<tr> 
       <td class=" centrar tam12 style1">'.$OActivos['Nombre_Cuenta'].'</td>
       <td class=" centrar tam12 style1" style="text-align: right;">$ '.number_format($OActivos['Saldo'], 2, '.', ',').'</td>
       </tr>';
     }
  return $OA;
}

function dibujarCampPasivoC($r7){
  $PC="";
  foreach ($r7 as $PasivoC)
    {  
      setlocale(LC_TIME, 'spanish');
      $PC .= '<tr> 
       <td class=" centrar tam12 style1">'.$PasivoC['Nombre_Cuenta'].'</td>
       <td class=" centrar tam12 style1" style="text-align: right;">$ '.number_format($PasivoC['Saldo'], 2, '.', ',').'</td>
       </tr>';
     }
  return $PC;
}
function dibujarCampPasivoL($r9){
  $PL="";
  foreach ($r9 as $PasivoL)
    {  
      setlocale(LC_TIME, 'spanish');
      $PL .= '<tr> 
       <td class=" centrar tam12 style1">'.$PasivoL['Nombre_Cuenta'].'</td>
       <td class=" centrar tam12 style1" style="text-align: right;">$ '.number_format($PasivoL['Saldo'], 2, '.', ',').'</td>
       </tr>';
     }
  return $PL;
}
function dibujarCampOPasivos($r11){
  $OP="";
  foreach ($r11 as $OPasivos)
    {  
      setlocale(LC_TIME, 'spanish');
      $OP .= '<tr> 
       <td class=" centrar tam12 style1">'.$OPasivos['Nombre_Cuenta'].'</td>
       <td class=" centrar tam12 style1" style="text-align: right;">$ '.number_format($OPasivos['Saldo'], 2, '.', ',').'</td>
       </tr>';
     }
  return $OP;
}
function dibujarCampCapital($r13){
  $Cap="";
  foreach ($r13 as $Capital)
    {  
      setlocale(LC_TIME, 'spanish');
      $Cap .= '<tr> 
       <td class=" centrar tam12 style1">'.$Capital['Nombre_Cuenta'].'</td>
       <td class=" centrar tam12 style1" style="text-align: right;">$ '.number_format($Capital['Saldo'], 2, '.', ',').'</td>
       </tr>';
     }
  return $Cap;
}
function Encabezados(){
  return '<thead>
           <tr>
             <td class="noborde  centrar  style1" style="width:50%;"><h3>Activos</h3></td>
             <td class="noborde  centrar  style1" style=""><h3>Pasivos</h3></td>
           </tr>
         </thead>';

}
function camposVacios(){
  return '<tr>
          <td class="tam12">&nbsp;</td>
          <td class="tam12">&nbsp;</td>
          
        </tr>
        <tr>
          <td class="tam12">&nbsp;</td>
          <td class="tam12">&nbsp;</td>
          
        </tr>
        <tr>
          <td class="tam12">&nbsp;</td>
          <td class="tam12">&nbsp;</td>
          
        </tr>';
}




?>