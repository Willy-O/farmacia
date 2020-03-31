<?php
	require_once'../../modelo/conexion.php';
	require_once'../../modelo/entes.php';
	$id_ente = $_GET['id'];
	$nuevo = new Ente();
	$result = $nuevo->consultarEnte($db, $id_ente);
	if (!$result){
	echo "ocurrio un error.\n";
	exit;}
	$row[] = $result;
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
            <td><label>id_ente</label></td>
            <td class="hh">'.$rows["id_ente"].'</td>
		</tr>
		
		<tr>
            <td><label>id_pedido</label></td>
            <td class="hh">'.$rows["id_pedido"].'</td>
		</tr>
        <tr>
            <td><label>fecha_despacho</label></td>
            <td class="hh">'.$rows["fecha_despacho"].'</td>
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

$path = (getenv('MPDF_ROOT')) ? getenv('MPDF_ROOT') : __DIR__;
include '../../recursos/mpdf/autoload.php';
$mpdf = new \Mpdf\Mpdf(['mode' => 'c']);
$mpdf->WriteHTML($html);
$mpdf->Output();

//	$mpdf = new mPDF('c', 'A4');
//	$mpdf->writeHTML($html);
//	$mpdf->Output('reporte.pdf', 'I');
?>