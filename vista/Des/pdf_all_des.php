<?php
	require_once'../../modelo/conexion.php';
	require_once'../../modelo/despacho.php';
	$consulta = new Despacho();
    $result = $consulta->listarAllDespacho($db);
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
    <table align="center">
    <thead>
        <tr>
            <th>Id despacho</th>
            <th>Id pedido</th>
            <th>Fecha despacho</th>
            <th>Opciones</th>
        </tr>
    </thead>
    <tbody>';
	foreach($result as $row) {
    $html .='
    <tr>
            <td><?php echo '.$row[id_despacho].' ?></td>
            <td><?php echo '.$row[id_pedido].' ?></td>
            <td><?php echo '.$row[fecha_despacho].' ?></td>	
    </tr>';
	}
    $html.='
    </tbody> 
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
?>