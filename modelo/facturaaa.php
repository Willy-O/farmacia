<?php 
 
require_once('conexion.php');

class Factura{

    public function registrarFactura($db, $fecha, $num_factur_fiscal, $razon_social){
        $sql = 'INSERT INTO public.factura (fecha, num_factur_fiscal, razon_social) VALUES (:fecha, :num_factur_fiscal, :razon_social)';
        $query = $db->prepare($sql);
        $query->bindValue(':fecha', $fecha, PDO::PARAM_STR);
        $query->bindValue(':num_factur_fiscal', $num_factur_fiscal, PDO::PARAM_STR);
        $query->bindValue(':razon_social', $razon_social, PDO::PARAM_STR);
        $query->execute();   
        if ($query) {
            echo "<script type=\"text/javascript\">
              history.go(-1);
             </script>";
             exit;
        } else{
            echo "algo salió mal";
        }
        return $query;
    }
    public function editarFactura($db, $fecha, $num_factur_fiscal, $razon_social){
        $sql = 'UPDATE public.factura
        SET fecha= :fecha, num_factur_fiscal= :num_factur_fiscal, razon_social= :razon_social
        WHERE "num_factur_fiscal" = :num_factur_fiscal;';
        $query = $db->prepare($sql);
        $query->bindValue(':fecha', $fecha, PDO::PARAM_STR);
        $query->bindValue(':num_factur_fiscal', $num_factur_fiscal, PDO::PARAM_STR);
        $query->bindValue(':razon_social', $razon_social, PDO::PARAM_STR);
        $query->execute();
        $result = $query->fetch(PDO::FETCH_ASSOC); 
        return $result;
    }
    public function borrarFactura($db, $num_factur_fiscal){
        $query = 'DELETE FROM public.factura WHERE  "num_factur_fiscal" = :num_factur_fiscal';
        $query = $db->prepare($query);
        $query->bindValue(':num_factur_fiscal', $num_factur_fiscal, PDO::PARAM_STR);
        $query->execute();
    }
    public function listarFactura($db){
        $query = "SELECT * FROM ente";
        $resultado = pg_query($conexion, $query) or die('ERROR AL INSERTAR DATOS: ' . pg_last_error());
        $resultado = $resultado->fetchAll();   
        return $resultado;
    }
    public function consultarFacturaFecha($db, $fecha) {
        $sql = 'SELECT *
                FROM public.factura 
                WHERE fecha = :fecha';
        $query = $db->prepare($sql);
        $query->bindValue(':fecha', $fecha, PDO::PARAM_STR);
        $query->execute();
        $result = $query->fetch(PDO::FETCH_ASSOC); 
        return $result;
        }
    public function consultarFacturaNum($db, $num_factur_fiscal) {
        $sql = 'SELECT *
                FROM public.factura 
                WHERE num_factur_fiscal = :num_factur_fiscal';
        $query = $db->prepare($sql);
        $query->bindValue(':num_factur_fiscal', $num_factur_fiscal, PDO::PARAM_STR);
        $query->execute();
        $result = $query->fetch(PDO::FETCH_ASSOC); 
        return $result;
        }
}