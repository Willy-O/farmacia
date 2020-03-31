<!DOCTYPE html><html><head><title>Cursos aprende a programar</title><meta charset="utf-8"> 
<style type="text/css"> 
*{font-family:sans-serif;} a:link {text-decoration:none;} select{font-size:18px;} 
div div {color: blue; background-color:#F1FEC6; font-size: 20px; float:left; border:solid; margin: 20px; 
padding:15px;} 
</style> 
<script> 
function mostrarSugerencia(str) { 
var xmlhttp; 
var contenidosRecibidos = new Array(); 
var nodoMostrarResultados = document.getElementById('listaCiudades'); 
var contenidosAMostrar = ''; 
if (str.length==0) { document.getElementById("txtInformacion").innerHTML=""; 
nodoMostrarResultados.innerHTML = ''; return; } 
xmlhttp=new XMLHttpRequest(); 
xmlhttp.onreadystatechange = function() { 
if (xmlhttp.readyState==4 && xmlhttp.status==200) { 
contenidosRecibidos = xmlhttp.responseText.split(","); 
document.getElementById("txtInformacion").innerHTML=contenidosRecibidos[0]; 
for (var i=1; i<contenidosRecibidos.length;i++) { 
 contenidosAMostrar = contenidosAMostrar+'<div id="ciudades'+i+'"> <a 
href="http://aprenderaprogramar.com">' + contenidosRecibidos[i]+ '</a></div>'; 
} 
 nodoMostrarResultados.innerHTML = contenidosAMostrar; 
} 
} 
xmlhttp.open("GET","datosCIUDAD.php?pais="+str); 
xmlhttp.send(); 
} 
</script> 
</head>
<body style="margin:20px;"> 
<h2>Elige un país:</h2>
<form action=""> 
<select onchange="mostrarSugerencia(this.value)"> 
<option value="none">Elige</option> 
<option value="spain">España</option> 
<option value="mexico">México</option> 
<option value="argentina">Argentina</option> 
<option value="colombia">Colombia</option> 
</select> 
</form> 
<br/> 
<p>Informacion sobre operacion en segundo plano con Ajax: <spanstyle="color:brown;" 
id="txtInformacion"></span></p> 
<div id="listaCiudades"> </div> 
</body> 
</html>