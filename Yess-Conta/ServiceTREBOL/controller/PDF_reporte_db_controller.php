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
$Cargo=$_GET['Cargo'];
$Abono=$_GET['Abono'];
$Saldo=$_GET['Saldo'];
$Email=$_GET['Email'];

$Nombre_Cuenta= $_GET['NombreCuenta'];


$s= new Usuarios($Email);
$n=$db->select($s->selectUsua($Email));
$Usuario=$n[0]['Nombre'];
$APP=$n[0]['APP'];
$APM=$n[0]['APM'];
//print_r($TotalCargo);
//echo $tipoPoliza;
//echo json_encode($x);
//print_r($x);
$a= new reg_cuentas($Nombre_Cuenta, $idEjercicio);
$resp=$db->select($a->selectDatosCuenta($Nombre_Cuenta, $idEjercicio));
if($resp){ 
$Asientos=dibujarCampPolizas($resp);
  //exit();
}

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

$Fecha_Factura=$resp[0]['Fecha_Factura'];
setlocale(LC_TIME, 'spanish');
$Fecha_FacturaMof = strftime("%A, %d de %B del %Y", strtotime($Fecha_Factura));
$Fecha_Reg=$resp[0]['Fecha_Reg'];
setlocale(LC_TIME, 'spanish');
$Fecha_RegMof = strftime("%A, %d de %B del %Y", strtotime($Fecha_Reg));
//print_r($Fecha_Reg);

$mpdf = new \Mpdf\Mpdf(['format' => 'Letter']);
$css = file_get_contents('../../css/formato.css');
$mpdf->WriteHTML($css,1);
$HTML='<!DOCTYPE html>
<html>
<head>
<title>Reporte de '.$Nombre_Cuenta.'</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<style>
                @page {
                    header: html_myHeader;
                    footer: html_myFooter;
                    content: html_myContent;
                    margin-top: 8.3cm;
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

                  </tr>
                  <tr style="background-color: #1C2D66;">
                  <td colspan="4" align="center" class="style1 negrita">
                  <h3>Reporte de cuentas</h3>
                  </td>
                  </tr> 
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
                  <tr>
                    <td colspan="2" align="left" class="tam12 style1">FECHA DE CONTABILIZACIÓN:</td>
                    <td align="center" class="tam12 style1" colspan="2">'.utf8_encode($Fecha_RegMof).'</td>
                  </tr>
                  <tr>
                    <td colspan="2" align="left" class="tam12 style1">FECHA DEL DOCUMENTO:</td>
                    <td align="center" class="tam12 style1" colspan="2">'.utf8_encode($Fecha_FacturaMof).'</td>
                  </tr>

                </tbody>
             </table>
             <br>
             <h3 align="center">'.$Nombre_Cuenta.'</h3>
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
                <tbody>';
                   $HTML.=$Asientos;
                   //$HTML.=camposVacios();
                   $HTML .='
                </tbody>
                <tfoot>
                 <tr>
            <td align="center"  style="width:15%;font-size:11px; background-color: rgba(255,255,255,0.2);"><strong>Totales:
            </td>
            <td align="right" style="font-size:11px; width:10%; color: white; background-color: #1C2D66;"><strong>Cargo:</strong></td>
            <td align="right" colspan="2" style=" font-size:11px;" ><strong>$ '.number_format($Cargo, 2, '.', ',').'</strong></td>
            <td align="right" style="font-size:11px; width:10%; color: white; background-color: #1C2D66;"><strong>Abono:</strong></td>
            <td align="right" style="width:15%; font-size:11px;" ><strong>$ '.number_format($Abono, 2, '.', ',').'</strong>
            <td align="right" style="font-size:11px; color: white; background-color: #1C2D66;width:10%;"><strong>Saldo:</strong></td>
            <td align="right" style="width:15%; font-size:11px;" ><strong>$ '.number_format($Saldo, 2, '.', ',').'</strong></td>
            </td>
          </tr>
                </tfoot>
             </table>

</body>';

// Write some HTML code:
$mpdf->WriteHTML($HTML);

// Output a PDF file directly to the browser
$mpdf->Output('Reporte de '.$Nombre_Cuenta.'.pdf','i');

function dibujarCampPolizas($resp){
  $docReporte="";
  foreach ($resp as $cuenta)
    {  
      setlocale(LC_TIME, 'spanish');
      $docReporte .= '<tr> 
       <td class="noborde centrar tam12 style1">'.$cuenta['Num_Poliza'].'</td>
       <td class="noborde centrar tam12 style1" style="text-align: justify;">'.utf8_encode(strftime("%A, %d de %B del %Y", strtotime($cuenta['Fecha_Factura']))).'</td>
       <td class="noborde centrar tam12 style1" style="text-align: justify;">'.utf8_encode(strftime("%A, %d de %B del %Y", strtotime($cuenta['Fecha_Reg']))).'</td>
       <td class="noborde centrar tam12 style1">'.$cuenta['cuentas_Codigo_Cuenta'].'</td>
       <td class="noborde centrar tam12 style1">'.$cuenta['Nombre_Cuenta'].'</td>
       <td class="noborde tam12 style1" style="text-align: justify;">'.$cuenta['Concepto'].'</td>
       <td class="noborde centrar tam12 style1">$ '.number_format($cuenta['Monto'], 2, '.', ',').'</td>
       <td class="noborde centrar tam12 style1">'.$cuenta['Codigo_Naturaleza'].'</td></tr>';
     }
  return $docReporte;
}

function Encabezados(){
  return '<thead>
           <tr style="background-color: #1C2D66;">
             <td class="noborde negrita centrar tam12 style1" style="width:7%">No. PÓLIZA</td>
             <td class="noborde negrita centrar tam12 style1" style="width:12%">FECHA DE FACTURA</td>
             <td class="noborde negrita centrar tam12 style1" style="width:12%">FECHA DE REGISTRO</td>
             <td class="noborde negrita centrar tam12 style1" style="width:12%">CÓDIGO DE LA CUENTA</td>
             <td class="noborde negrita centrar tam12 style1" style="width:10.5%">CUENTA</td>
             <td class="noborde negrita centrar tam12 style1" style="width:20%;">CONCEPTO</td>
             <td class="noborde negrita centrar tam12 style1" style="width:15%">MONTO</td>
             <td class="noborde negrita centrar tam12 style1" style="width:11.5%">NATURALEZA</td> 
           </tr>
         </thead>';

}


?>