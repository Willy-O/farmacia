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
		var fila='<tr class="selected" id="fila'+cont+'" onclick="seleccionar(this.id);">   <td></td>   <td></td>   <td></td>   <td></td>   <td></td>    <td><input name="fechaVen" type="date" id="fechaVen"></td>    <td><input name="cantidad_total_factura" type="text" style="height: 30px;"></td>  <td><input name="precio_unitario" type="text" style="height: 30px;"></td> </tr>';
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