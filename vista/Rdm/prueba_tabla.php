<?php include "../include/header.php";?>
<?php include "../include/menu_administrador.php";?>
<style>
	#content{
		position: absolute;
		min-height: 50%;
		width: 80%;
		top: 20%;
		left: 5%;
	}

	.selected{
		cursor: pointer;
	}
	.selected:hover{
		background-color: #0585C0;
		color: white;
	}
	.seleccionada{
		background-color: #0585C0;
		color: white;
	}
</style>
<script>



//$("#boton-usuarios").on("click", getUsers);


	var document = $(document).ready(function(){
	var bt_add =$('#bt_add').click(function(){
			agregar();
		});
		var bt_del =	$('#bt_del').click(function(){
			eliminar(id_fila_selected);
		});
		

	});
	var cont=0;
	var id_fila_selected=[];
	function agregar(){
		cont++;
		var fila='<tr class="selected" id="fila'+cont+'" onclick="seleccionar(this.id);">   <td></td>   <td></td>   <td></td>   <td></td>   <td></td>    <td><input type="date"></td>    <td><input type="text" style="height: 30px;"></td>  <td><input type="text" style="height: 30px;"></td> </tr>';
		$('#tabla').append(fila);
		reordenar();
	}

	function seleccionar(id_fila){
		if($('#'+id_fila).hasClass('seleccionada')){
			$('#'+id_fila).removeClass('seleccionada');
		}
		else{
			$('#'+id_fila).addClass('seleccionada');
		}
		//2702id_fila_selected=id_fila;
		id_fila_selected.push(id_fila);
	}

	function eliminar(id_fila){
		/*$('#'+id_fila).remove();
		reordenar();*/
		for(var i=0; i<id_fila.length; i++){
			$('#'+id_fila[i]).remove();
		}
		reordenar();
	}

	function reordenar(){
		var num=1;
		$('#tabla tbody tr').each(function(){
			$(this).find('td').eq(0).text(num);
			num++;
		});
	}
	function eliminarTodasFilas(){
$('#tabla tbody tr').each(function(){
			$(this).remove();
		});

	}

	/*$.ajax({

		data: {<?php //echo $consulta?>},
		type: "GET",
		dataType: "json",
		url: "../fasmij/controlador/des/json_des.php",
		})
		.done(function( data, textStatus, jqXHR ) {
			if ( console && console.log ) {
				console.log( "La solicitud se ha completado correctamente." );
			}
		})
		.fail(function( jqXHR, textStatus, errorThrown ) {
			if ( console && console.log ) {
				console.log( "La solicitud a fallado: " +  textStatus);
			}
		});
*/
    
/*.done(function(response) {
            
            //done() es ejecutada cuándo se recibe la respuesta del servidor. response es el objeto JSON recibido
            if (response.success) {
                
                var output = "<h1>" + response.data.message + "</h1>";
                
                // recorremos cada usuario
                $.each(response.data.users, function(key, value) {
                    
                    output += "<h2>Detalles del usuario " + value['ID'] + "</h2>";
                    
                    // recorremos los valores de cada usuario
                    $.each(value, function(userkey, uservalue) {
                        
                        output += '<ul>';
                        output += '<li>' + userkey + ': ' + uservalue + "</li>";
                        output += '</ul>';
                        
                    });
                    
                });
                
                // Actualizamos el HTML del elemento con id="#response-container"
                $("#response-container").html(output);
                
                } else {
                
                //response.success no es true
                $("#response-container").html('No ha habido suerte: ' + response.data.message);
                
            }
            
        })
        
        .fail(function(jqXHR, textStatus, errorThrown) {
            
            $("#response-container").html("Algo ha fallado: " + textStatus);
            
        });
        
    });
    
});*/

$(document).ready(function(){
    var getdetails = function(id){
        return $.getJSON( "personas.php", { "id" : id });
    }
    
    $('#prueba').click(function(e){
        e.preventDefault();
        $("#respuesta").html("<p>Buscando...</p>");
        //this hace referencia al elemento que ha lanzado el evento click
        //con el método .data('user') obtenemos el valor del atributo data-user de dicho elemento y lo pasamos a la función getdetails definida anteriormente
        getdetails($(this).data('user'))
        .done( function( response ) {
            //done() es ejecutada cuándo se recibe la respuesta del servidor. response es el objeto JSON recibido
            if( response.success ) {
                
                var output = "<h1>" + response.data.message + "</h1>";
                //recorremos cada usuario
                $.each(response.data.users, function( key, value ) {
                    output += "<h2>Detalles del usuario " + value['ID'] + "</h2>";
                    //recorremos los valores de cada usuario
                    $.each( value, function ( userkey, uservalue) {
                        output += '<ul>';
                        output += '<li>' + userkey + ': ' + uservalue + "</li>";
                        output += '</ul>';
                    });
                });
                
                //Actualizamos el HTML del elemento con id="#response-container"
                $("#response-container").html(output);
                
                } else {
                //response.success no es true
                $("#response-container").html('No ha habido suerte: ' + response.data.message);
            }
        })
        .fail(function( jqXHR, textStatus, errorThrown ) {
            $("#response-container").html("Algo ha fallado: " +  textStatus);
        });
    });
});     
</script>

	<div style="margin-top:100px;"> 
		<input type="button" value="enviar" id="prueba">
		<div id="repuesta"></div>
	</div>
  <div id="response-container"></div>

	<div id="content" style="margin-top:100px;">
		<label>Agregar filas de forma dinámica con JQuery</label>
		<button id="bt_add" class="btn btn-default">Agregar</button>
		<button id="bt_del" class="btn btn-default">Eliminar</button>
		<table id="tabla" class="table table-bordered">
		<thead>
			<tr>
				<td>ID</td>
				<td>Nombre</td>
				<td>Concentración</td>
				<td>Dosis</td>
				<td>Forma farmaceutica</td>
				<td>Fecha de vencimiento</td>
				<td>Cantidad</td>
				<td>Precio unitario</td>
			</tr>
		</thead>
	</table>
	</div>


<?php include "../include/footer.php";?>

<!---   www.megapeliculasrip.com   -->
