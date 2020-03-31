<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Consultar ente</title>
</head>
<body>
<div class="contenedor-form">
    <div class="formulario"><center>
        <h2>Consultar ente</h2></center>
        <form action="editar2_en.php" method="POST">
            <b>Nombre del ente:</b>
            <input type="text" name="nombre" placeholder="nombre">
                <br><input type="submit" value="Consultar" name="editar">
                <input type="button" value="Volver" onClick="history.go(-1);">    
            </form>
    </div>
</div>
</body>
</html>