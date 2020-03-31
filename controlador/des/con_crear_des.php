<?php
session_start();
require '../../modelo/despacho.php';
require '../../modelo/inventario.php';
require '../../modelo/asegurado.php';
require '../../modelo/conexion.php';

if (!isset($_POST["ced_ase_despacho"]) || !isset($_POST['fecha_despacho']) || !isset($_POST['codigo_med']) || !isset($_POST['count'])) {
    echo '3';
   }else{
        $despacho = new Despacho;
        $inventario = new Inventario;
        $asegurado = new Asegurado;
        $ced_ase_despacho = $_POST['ced_ase_despacho'];
        $fecha_despacho = $_POST['fecha_despacho'];
        $proveedor = $_POST['proveedor'];
        $comentario = $_POST['comentario']; 
        $codigo_med = $_POST['codigo_med'];
        $id = $_POST['id'];
        $contenido = $_POST['contenido'];
        $count = $_POST['count'];
        $poliza = $_POST["poliza"];
        $precio = $_POST["precio"];
        $unidosis = $_POST["unidosis"];

        $array_med = [];
       // $suma_factura = 0;
        for ($i=0; $i < count($codigo_med); $i++) { 
            array_push($array_med,array(
              'codigo_med'=>$codigo_med[$i],
              'date'=>$date[$codigo_med[$i]][0],
              'id'=>$id[$codigo_med[$i]][0],
              'price'=>$price[$codigo_med[$i]][0],
              'count'=>$count[$codigo_med[$i]][0]
              // 'contenido'=>$contenido[$codigo_med[$i]][0]
            ));

            $suma_medicamentos = $suma_medicamentos + $count[$codigo_med[$i]][0];
            // $monto_total = $price[$codigo_med[$i]][0] / $contenido[$codigo_med[$i]][0] * $count[$codigo_med[$i]][0];
            // if($monto_total){
            //   $monto_total = $monto_total + $monto_total;
            // }
            // echo $contenido[$i][0];
        }
          for ($i=0; $i < count($codigo_med); $i++) { 
            if($unidosis[$i] === 'Si'){
              $resta_poliza = $precio[$i] / $count[$codigo_med[$i]][0] * $contenido[$i];
              if($resta_poliza!=$resta_p){
                $resta_p = $resta_p + $resta_poliza;
              }
              print_r($resta_p);
            }else{
              $resta_poliza = $precio[$i] * $count[$codigo_med[$i]][0];
              if($resta_poliza!=$resta_p){
                $resta_p = $resta_p + $resta_poliza;
              }
              print_r($resta_p);
            }
          }




          // for ($i=0; $i < count($codigo_med); $i++) { 
          //   $resta_poliza = $precio[$i] / $count[$codigo_med[$i]][0] * $contenido[$i];
          //   if($resta_poliza!=$resta_p){
          //     $resta_p = $resta_p + $resta_poliza;
          //   }
          // }

          print_r($resta_p);
          exit();
          

// //         for ($i=0; $i < count($codigo_med); $i++) { 
//           $i++;
//           if ($unidosis === 'Si') {
//             for ($j=0; $j < $i; $j++) { 
//               $resta_poliza = $precio[$j] / $count[$codigo_med[$j]][0] * $contenido[$j];
//               if($resta_poliza!=$resta_p){
//                 $resta_p = $resta_p + $resta_poliza;
//               }
//             }
//             print_r($resta_p);
//           }else{
//             for ($j=0; $j < $i; $j++) { 
//               $resta_poliza = $precio[$j] * $count[$codigo_med[$j]][0];
//               if($resta_poliza!=$resta_p){
//                 $resta_p = $resta_p + $resta_poliza;
//               }
//             }
//           }
//           print_r($resta_p);
//         }
        // print_r($precio[0] / $count[$codigo_med[0]][0] * $contenido[0]);



        if($poliza < $resta_p){
          echo '4';
          // if($poliza > $suma_medicamentos){
            
          // }
        }else{
          for ($i=0; $i < count($array_med); $i++) { 
              $inventario->Registro($db,$array_med[$i]['count'],$array_med[$i]['price'],$array_med[$i]['id'],'restar');
            }
          for ($i=0; $i < count($array_med); $i++) {
              $aconsulta = $inventario->jsonInventario($db,$array_med[$i]['id']);
              $despacho->registrarDespacho($db, $fecha_despacho,$array_med[$i]['count'], $comentario, $aconsulta['id'], $ced_ase_despacho, $array_med[$i]['id']);     
          }

          if($despacho){
              if($inventario){
                  echo    'true';
              }else{
                  echo   '2';
              }
            }else{
              echo    '1';
            }
        }}
        
        //console.log(hijo.parentElement) **DEVUELVE EL ELEMENTO PADRE**
        ?>