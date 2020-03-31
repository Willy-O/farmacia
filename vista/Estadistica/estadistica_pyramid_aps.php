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
 ?>
<?php
 	session_start();
 	$status = $_SESSION['status'];
?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="UTF-8">
<script> 
window.onload = function () {

var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	exportEnabled: true,
	theme: "light1",
	title:{
		text: "Pacientes por status"
	},
	data: [{
		type: "pyramid",
		yValueFormatString: "#'%'",
		indexLabelFontColor: "black",
		indexLabelFontSize: 16,
		indexLabel: "{label} - {y}",
		//reversed: true, // Reverses the pyramid
		dataPoints: [
			<?php foreach($status as $row) {?>
			{ y: <?php echo $row['cant']; ?>, label: "<?php if($row['statu'] == '1'){
                                                        echo 'Activos';
                                                    }else{
                                                        echo 'Jubilados';
                                                    }  ?>" },
			<?php } ?>
		]
	}]
});
chart.render();

}
</script>
<div id="chartContainer" style="height: 370px; max-width: 920px; margin: 0px auto; margin-top: 50px;"></div>
<script src="../../recursos/js/canvasjs.min.js"></script>
</div>
<?php include "../include/footer.php";?>