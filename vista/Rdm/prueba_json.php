<!-- <html> -->
<head>

<title>Ejemplo sencillo de AJAX</title>

<script type="text/javascript" src="../../recursos/js/jquery.min.js"></script>

<script>
function realizaProceso(valorCaja1, valorCaja2){
        var parametros = {
                "valorCaja1" : valorCaja1,
                "valorCaja2" : valorCaja2
        };
        $.ajax({
                data:  parametros,
                url:   'ejemplo_ajax_proceso.php',
                type:  'post',
                beforeSend: function () {
                        $("#resultado").html("Procesando, espere por favor...");
                },
                success:  function (response) {
                        $("#resultado").html(response);
                }
        });
}
function prueba(cedula) {
        var parametros = {
                "cedula" : cedula,
        };
            $.ajax({
                data:  parametros,
                url:   'prueba.php',
                type:  'post',
                beforeSend: function () {
                        $("#resultado").html("Procesando, espere por favor...");
                },
                success:  function (response) {
                        $("#resultado").html(response);
                }
        });
                // url: 'prueba.php?dato='+dato,
       //     }).done(function(c){
        //             if (c!='') {
        //                 c = JSON.parse(c);
        //                 if(typeof $('table').find('[data-med="'+c.id+'"]')[0]==='undefined'){
        //                     var fila=$('#pb').html();
        //                     $('#pb').html(fila+c.table);
        //             }
        //         } else{
        //                 alert('Cedula no registrada')
        //             }
        //     });
        }
</script>

</head>

<body>

Cedula

<input type="number" name="pb" id="cedula" value="0"/> 
<br>
<!-- <div class="pb" id="pb"> -->
<span id="resultado">0</span>
<!-- </div> -->
<br>
<button onclick="prueba($('#cedula').val());return false;" type="button">Consultar</button>
<br>
<br>
<br>
<br>


Introduce valor 1

<input type="text" name="caja_texto" id="valor1" value="0"/> 


Introduce valor 2

<input type="text" name="caja_texto" id="valor2" value="0"/>

Realiza suma

<input type="button" href="javascript:;" onclick="realizaProceso($('#valor1').val(), $('#valor2').val());return false;" value="Calcula"/>

<br/>

Resultado: <span id="resultado">0</span>

</body>

</html>