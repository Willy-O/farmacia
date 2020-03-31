<?php
	require_once'../modelo/conexion.php';
	require_once'../modelo/circular.php';
//	require_once('../mpdf-6.0.0/mpdf.php');
	$id = (int)$_GET['id'];
	$nuevo = new Circular();
	$result = $nuevo->consultarCircular($conexion, $id);
	if (!$result){
	echo "ocurrio un error.\n";
	exit;}
	$row[] = pg_fetch_assoc($result);
	//foreach ($row as $rows) {
		# code...
	//}
	$html= '
	<style>
	h1{font-size: 30px; color:#444; margin-top: 50px; text-align: center;}
	label {font-weight: bold; color: #444; font-size: 16px; width: 15%; text-align: justify;}
	input {font-size: 14px; padding: 1px 20px; width: 70%; margin-bottom: 10px; margin-left: 20px; border:none; text-align: justify;}
	.hh {width: 85%; text-aling: justify;}
	</style>
	<header class="header">
<div id="logo">
	<img src="../Imagenes/encabezado_pnf.png">
</div>
<h1>CIRCULAR</h1><hr>
</header>
<main>
	<table align="center">';
	foreach ($row as $rows) {
	$html .='
		<tr>
                    <td><label>Fecha</label></td>
                    <td class="hh">'.$rows["date"].'</td>
		</tr>
		
		<tr>
                    <td><label>Señor (A)</label></td>
                    <td class="hh">'.$rows["motivo"].'</td>
		</tr>
                <tr>
                    <td><label>Remitente</label></td>
                    <td class="hh">'.$rows["remitente"].'</td>
		</tr>
		<tr>
                    <td><label>Notas</label></td>
                    <td class="hh">'.$rows["notas"].'</td>
		</tr>
		<tr>
                    <td><label>Anexos</label></td>
                    <td class="hh">'.$rows["anexo"].'</td>
		</tr>';
	}
	$html.='
	</table>
		<br>
	<br>
	<br>
	<br>
	<label class="ll">Emitido por:</label>
	<br>
	<label class="ll">Cargo:</label>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<label class="ww">Firma:</label>
</main>';
/*
'.$rows['date'].'
'.$rows['motivo'].'
'.$rows['remitente'].'
'.$rows['notas'].'
'.$rows['anexos'].'
*/
//include("../MPDF57/mpdf.php");
//$mpdf=new mPDF(); 
//$mpdf->WriteHTML($html);
//$mpdf->Output(); exit;
//$s = $mpdf->Output('','S');  echo nl2br(htmlspecialchars($s));  exit;
//exit;

$path = (getenv('MPDF_ROOT')) ? getenv('MPDF_ROOT') : __DIR__;
include '../mpdf/autoload.php';
$mpdf = new \Mpdf\Mpdf(['mode' => 'c']);
$mpdf->WriteHTML($html);
$mpdf->Output();

//	$mpdf = new mPDF('c', 'A4');
//	$mpdf->writeHTML($html);
//	$mpdf->Output('reporte.pdf', 'I');
?>