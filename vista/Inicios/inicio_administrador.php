<?php require_once '../../modelo/estadisticas.php';  ?>
<?php require_once '../../modelo/conexion.php'; ?>
<?php  
 $fecha = date("Y-m-d");
 $fecha2 = date("Y-m-d", strtotime($fecha."+ 2 month"));
 $nuevo = new Estadistica();
 $feven = $nuevo->prontosVencer($db, $fecha, $fecha2);
 $stock = $nuevo->stock($db);
?> 
<?php include "../include/header.php";?>
<?php include "../include/menu_administrador.php";?>


<!-- GRAFICO DE MEDICAMENTOS A VENCER EM LOS SIGUIENTES 2 MESES  -->


    <div class="contenedor-form col-6" style="width:50%; margin-top: 100px; float: left;">
        <div class="formulario1">

                <?php
                $espacio = " / ";
                ?>

                    <script>
                    window.onload = function () {

                    var chart = new CanvasJS.Chart("chartContainer", {
                        exportEnabled: true,
                        theme: "light2",
                        animationEnabled: true,
                        title: {
                            text: "Medicamentos a vencer en los siguientes 2 meses",
                        },
                        data: [{
                            type: "pie",
                            indexLabelFontSize: 18,
                            radius: 150,
                            indexLabel: "{label} - {y}",
                            yValueFormatString: "0",
                            click: explodePie,
                            dataPoints: [
                                <?php foreach($feven as $row) {?>
                                { y: <?php echo $row['cantidad_medicamento']; ?>, label: "<?php echo $row['nombre']; echo $espacio; echo $row['fecha_vencimiento']; ?>" },
                                <?php } ?>
                            ]
                        }]
                    });
                    chart.render();

                    function explodePie(e) {
                        for(var i = 0; i < e.dataSeries.dataPoints.length; i++) {
                            if(i !== e.dataPointIndex)
                                e.dataSeries.dataPoints[i].exploded = false;
                        }
                    }
                    
                    }
                    </script>
                    <div id="chartContainer" style="height: 370px; max-width: 920px; margin: 0px auto;"></div>
                    <script src="../../recursos/js/canvasjs.min.js"></script>
            </form>
        </div>
    </div>

<!-- GRAFICO DE MEDICAMENTOS BAJOS DE STOCK  -->

<div class="contenedor-form col-6" style="margin-top: 81px; float: left;">
    <iframe class="col-12" src="../include/stockPie.php" frameborder="0" style="height: 400px;"></iframe>
</div>

<!-- FIN  -->

<?php include "../include/footer.php";?>