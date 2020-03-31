/*	var document = $(document).ready(function(){
	var bt_add =$('#bt_add').click(function(){
			agregar();
			
		});
		var bt_del =	$('#bt_del').click(function(){
			eliminar(id_fila_selected);
		});
		

	});
	var cont=0;
	var id_fila_selected=[];
	function agregarDes(){
	cont++;
		//$.ajax({
          //  url: '../../controlador/des/json_des.php',
            //success: function(respuesta) {
              //  console.log(respuesta);
                //var medicamentos = JSON.parse(respuesta);
                //for(var i in medicamentos){
					//var fila='<tr class="selected" id="fila'+cont+'" onclick="seleccionar(this.id);">   <td id="id_med'+cont+'">'/+medicamentos[i].id_med+'</td>   <td id="nombre'+cont+'">'+medicamentos[i].nombre+'</td>   <td id="concentracion'+cont+'">'+medicamentos[i].concentracion+'</td>   <td id="dosis'+cont+'">'+medicamentos[i].dosis+'</td>   <td id="forma_farmaceutica'+cont+'">'+medicamentos[i].forma_farmaceutica+'</td>    <td id="precio_unitario'+cont+'"></td>      <td><input name="" id="cantidad_despacho'+cont+'" type="text" style="height: 30px;"></td>   </tr>';
					var fila='<tr class="selected" id="fila'+cont+'" onclick="seleccionar(this.id);">   <td id="id_med'+cont+'"></td>   <td id="nombre'+cont+'"></td>   <td id="concentracion'+cont+'"></td>   <td id="dosis'+cont+'"></td>   <td id="forma_farmaceutica'+cont+'"></td>    <td id="precio_unitario'+cont+'"></td>      <td><input name="" id="cantidad_despacho'+cont+'" type="text" style="height: 30px;"></td>   </tr>';
					$('#tabla').append(fila);
					reordenar();                
				//}
           // },
           // error: function(xhr, status) {
            //    console.log("No se ha podido obtener la información");
           // },
           // complete : function(xhr, status) {
           //     console.log('Petición realizada');
           // }
        //});
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
		$('#'+id_fila).remove();
		reordenar();
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

	}*/