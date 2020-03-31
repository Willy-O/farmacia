<?php
	require_once'../../modelo/conexion.php';
	require_once'../../modelo/usuario.php';
	$cedula = $_GET['id'];
	$nuevo = new Usuario();
	$result = $nuevo->consultarUsuario($db, $cedula);
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
            <td><label>Nombre</label></td>
            <td class="hh">'.$rows["nombre"].'</td>
		</tr>
		<tr>
            <td><label>Apellido</label></td>
            <td class="hh">'.$rows["apellido"].'</td>
		</tr>
        <tr>
            <td><label>Cedula</label></td>
            <td class="hh">'.$rows["cedula"].'</td>
		</tr>
		<tr>
			<td><label>Nombre de usuario</label></td>
			<td class="hh">'.$rows["nom_user"].'</td>
		</tr>
		<tr>
			<td><label>Contrasena</label></td>
			<td class="hh">'.$rows["contrasenna"].'</td>
		</tr>
		<tr>
			<td><label>Cargo</label></td>
			<td class="hh">'.$rows["cargo"].'</td>
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