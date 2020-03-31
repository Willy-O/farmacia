<?php
session_start();
require_once '../../modelo/factura.php';
require_once '../../modelo/anaquel.php';
require_once '../../modelo/inventario.php';
require_once '../../modelo/conexion.php';

if (!isset($_POST["num_factura"]) || !isset($_POST['fecha_factura']) || !isset($_POST['proveedor']) || !isset($_POST['codigo_med']) || !isset($_POST['date']) || !isset($_POST['price']) || !isset($_POST['count'])) {
  echo '4';
}else{

        $factura = new Factura;
        $anaquel = new Anaquel;
        $inventario = new Inventario;
        $fecha_factura = $_POST['fecha_factura'];
        $num_factura = $_POST['num_factura'];
        $proveedor = $_POST['proveedor'];
        $comentario = $_POST['comentario']; 
        $codigo_med = $_POST['codigo_med'];
        $id_usuario = $_SESSION['id'];
        $id = $_POST['id'];
        $date = $_POST['date'];
        $price = $_POST['price'];
        $count = $_POST['count'];
        $array_fac = [];
        $array_med = [];
        $suma_factura = 0;

        for ($i=0; $i < count($codigo_med); $i++) { 
            array_push($array_med,array(
              'codigo_med'=>$codigo_med[$i],
              'date'=>$date[$codigo_med[$i]][0],
              'id'=>$id[$codigo_med[$i]][0],
              'price'=>$price[$codigo_med[$i]][0],
              'count'=>$count[$codigo_med[$i]][0]
            ));
            $suma_factura = $suma_factura + ($price[$codigo_med[$i]][0]*$count[$codigo_med[$i]][0]);
        }

        $factura->registrarFactura($db,$fecha_factura,$proveedor,$comentario,$suma_factura,$num_factura,$id_usuario);
        
        $last_id_factura = $db->lastInsertId();
        for ($i=0; $i < count($array_med); $i++) { 
          $anaquel->Registro($db,
            $array_med[$i]['id'],
            $last_id_factura,
            $array_med[$i]['date'],
            $array_med[$i]['price'],
            $array_med[$i]['count']);
        }
        for ($i=0; $i < count($array_med); $i++) { 
          $inventario->Registro($db,$array_med[$i]['count'],$array_med[$i]['price'],$array_med[$i]['id'],'sumar');
        }
        if($factura){
          if($anaquel){
            if($inventario){
              echo    'true';

            }else{
              echo'3';
            }

          }else{
              echo '2';
          }
        }else{
          echo '1';
        }
}
?>
