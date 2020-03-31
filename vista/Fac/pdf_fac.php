<?php require_once '../../modelo/factura.php';  ?>
<?php require_once '../../modelo/conexion.php'; ?>
<?php
    $id = $_GET['id'];
    $factura = new Factura();
    $consulta = $factura->consultarAllFactura($db, $id);   

$html='
    <style>
        h1{font-size: 30px; color:#444; margin-top: 0px; text-align: center;}
        label {font-weight: bold; color: #444; font-size: 16px; width: 15%; text-align: justify;}
        body{font-family: Arial;}
        table{width: 100%; padding: 10px; border-collapse: collapse;}
        .hh {width: 85%; text-aling: justify;}
        .left{float: left;}
        .right{float: right;}
        .firsthead{background: #8295A4;}
        .contend{margin-left: 15px; margin-right:15px; margin-top:30px;}
        th,td{padding: 8px;}
        thead{text-align: center;}
        .footer {position: absolute; bottom: 10px; width: 90%; color: white;}
    </style>
    <div class="contend">
        <header class="header" style="">
            <div class="logo">
                <img src="../../recursos/img/logo_mpprij.png" style="width:80px; float: left; margin-top: -20px;">
                <img src="../../recursos/img/logo_FASMIJ.png" style="width:130px; float: right; margin-top: -20px">
                <h1 style= "float: auto; margin-top: 40px;">MEDICAMENTOS RECIBIDOS</h1>
                <br>
            </div>
        </header>
        <body>
            <div class="up">
                <div class="left">
                    <label>Proveedor:</label>
                    <label>'.$consulta[0]["proveedor"].'</label>
                    <br>
                    <label>Número de factura:</label>
                    <label>'.$consulta[0]["num_factura"].'</label>
                    <br>
                    <label>Observación:</label>
                    <label>'.$consulta[0]["informacion"].'</label>
                </div>
                <div class="right">
                    <label>Fecha de factura:</label>
                    <label >'.$consulta[0]["fecha_factura"].'</label>
                    <br>
                    <label>Monto total:</label>
                    <label>'.$consulta[0]["precio_total_factura"].'</label>
                </div>
            </div>
            <table align="center">
                    <thead class="firsthead">
                        <tr>
                            <td style="width: 200px">Nombre</td>
                            <td>Concentración</td>
                            <td>Presentacion</td>
                            <td>Fecha de vencimiento</td>
                            <td>Cantidad</td>
                            <td>Precion base</td>
                            <td>Precio total</td>
                            <td>Precio venta unitario</td>
                        </tr>
                    </thead>';
                    foreach ($consulta as $rows) {
                    $total = $rows['cantidad_medicamento'] * $rows['precio_facturado'];
                    $html.='
                <tbody>
                    <tr>
                        <td>'.$rows['nombre'].'</td>
                        <td>'.$rows['concentracion'].' '.$rows['dosis'].'</td>
                        <td>'.$rows['forma_farmaceutica'].'</td>
                        <td>'.$rows['fecha_vencimiento'].'</td>
                        <td>'.$rows['cantidad_medicamento'].'</td>
                        <td>'.$rows['precio_facturado'].'</td>
                        <td>'.$total.'</td>
                        <td>'.$rows['precio_facturado'].'</td>
                    </tr>
                </tbody>';
                }
                $html.='
            </table>
            <div class="footer">
                <table style="border: solid 1px black;">
                    <thead style="border: solid 1px black;">
                        <tr>
                            <td style="border: solid 1px black;">ELABORADO POR</td>
                            <td>REVISADO POR</td>
                        </tr>
                    </thead>
                    <tbody style="border: solid 1px black;">
                        <tr>
                            <td style="border: solid 1px black;">
                                Nombre:
                                <br>
                                C.I:
                                <hr style="width: 150px; float: right;">
                                <br>
                                <label style="float: right;">Firma<label>
                            </td>
                            <td style="widht: 50%; border: solid 1px black;">
                                Nombre:
                                <br>
                                C.I:
                                <hr style="width: 150px; float: right;">
                                <br>
                                <label style="float: right;">Firma<label>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </body>
    </div>';

$path = (getenv('MPDF_ROOT')) ? getenv('MPDF_ROOT') : __DIR__;
include '../../recursos/mpdf/autoload.php';
$mpdf = new \Mpdf\Mpdf(['mode' => 'c', 'format' => 'A4-L']);
$mpdf->WriteHTML($html);
$mpdf->Output();

?>

