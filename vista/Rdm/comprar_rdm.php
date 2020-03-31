<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h2>COMPRAR</h2></center>
            <form action="../../controlador/rdm/con_comprado_rdm.php" method="POST">
                <b>Medicamento</b>
                    <input type="text" name="medicamento" placeholder="Medicamento">
                <b>Factura de proveedor</b>
                    <input type="text" name="facdpro" placeholder="Factura de provedor">
                <b>Número de pedido</b>
                    <input type="text" name="npedido" placeholder="npedido">
                <b>Fecha</b>
                    <input type="text" name="#" value="" readonly>
                <br><input type="submit" value="Guardar" name="guardar">
                <input type="button" value="Volver" onClick="history.go(-1);">    
            </form>
</body>
</html>