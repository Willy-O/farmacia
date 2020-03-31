<?php include "../include/header.php";?>
<?php 
    if($_SESSION['cargo'] == 'administrador'){
        include "../include/menu_administrador.php";
    }
    if($_SESSION['cargo'] == 'farmaceuta'){
        include "../include/menu_farmaceuta.php";
    }
    if($_SESSION['cargo'] == 'auxiliar'){
        include "../include/menu_auxiliar.php";
    }
 ?>>
<?php
 session_start();
 $fedes = $_SESSION['fedes'];
 			//{y: <?php echo $consulta['pera']; , label: "Pera"},
			//{ y: <?php echo $consulta['pinna']; , label: "Pinna" },
			//{ y: <?php echo $consulta['durazno']; , label: "Durazno" },
			//{ y: <?php echo $consulta['patilla']; , label: "Patilla" },
			//{ y: <?php echo $consulta['fresa']; , label: "Fresa" } 
?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="UTF-8">
<script>
window.onload = function () {

var chart = new CanvasJS.Chart("chartContainer", {
	exportEnabled: true,
	theme: "light2",
	animationEnabled: true,
	title: {
		text: "DESPACHOS POR FECHAS",
	},
	//subtitles: [{
	//	text: "United Kingdom, 2016",
	//	fontSize: 16
	//}],
	data: [{
		type: "pie",
		indexLabelFontSize: 18,
		radius: 150,
		indexLabel: "{label} - {y}",
		yValueFormatString: "###0",
		click: explodePie,
		dataPoints: [
			<?php foreach($fedes as $row) {?>
			{ y: <?php echo $row['cant']; ?>, label: "<?php echo $row['fecha_despacho']; ?>" },
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
<div id="chartContainer" style="height: 370px; max-width: 920px; margin: 0px auto; margin-top: 50px;"></div>
<script src="../../recursos/js/canvasjs.min.js"></script>
</div>
<?php include "../include/footer.php";?>