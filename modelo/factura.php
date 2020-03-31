
<?php 
 
require_once('conexion.php');


class Factura{

    public function registrarFactura($db,$fecha_factura,$proveedor,$comentario,$precio_total_factura,$num_factura,$id_usuario){
        $sql = 'INSERT INTO public.factura (fecha_factura, proveedor, comentario, precio_total_factura, num_factura, id_usuario) VALUES (:fecha_factura, :proveedor, :comentario, :precio_total_factura, :num_factura, :id_usuario)';
        $query = $db->prepare($sql);
        $query->bindValue(':fecha_factura', $fecha_factura, PDO::PARAM_STR);
        $query->bindValue(':num_factura', $num_factura, PDO::PARAM_STR);
        $query->bindValue(':proveedor', $proveedor, PDO::PARAM_STR);
        $query->bindValue(':comentario', $comentario, PDO::PARAM_STR);
        $query->bindValue(':precio_total_factura', $precio_total_factura, PDO::PARAM_INT);
        $query->bindValue(':id_usuario', $id_usuario, PDO::PARAM_INT);
        $query->execute();   
        return $query;
    }
    public function editarPedido($db, $id_factura, $fecha_factura, $num_factura, $proveedor, $comentario, $ced_usu_factura, $cantidad_med_factura, $precio_total_factura){
        $sql = 'UPDATE public.pedido
        SET id_factura= :id_factura, fecha_factura= :fecha_factura, num_factura= :num_factura, proveedor= :proveedor, comentario= :comentario, ced_usu_factura= :ced_usu_factura, cantidad_med_factura= :cantidad_med_factura, precio_total_factura= :precio_total_factura
        WHERE id_factura = :id_factura;';
        $query = $db->prepare($sql);
        $query->bindValue(':id_factura', $id_factura, PDO::PARAM_STR);
        $query->bindValue(':fecha_factura', $fecha_factura, PDO::PARAM_STR);
        $query->bindValue(':num_factura', $num_factura, PDO::PARAM_STR);
        $query->bindValue(':proveedor', $proveedor, PDO::PARAM_STR);
        $query->bindValue(':comentario', $comentario, PDO::PARAM_STR);
        $query->bindValue(':ced_usu_factura', $ced_usu_factura, PDO::PARAM_INT);
        $query->bindValue(':cantidad_med_factura', $cantidad_med_factura, PDO::PARAM_STR);
        $query->bindValue(':precio_total_factura', $precio_total_factura, PDO::PARAM_STR);
        $query->execute();
        $result = $query->fetch(PDO::FETCH_ASSOC); 
        return $result;
    }
    public function borrarFactura($db, $num_factura){
        $query = 'DELETE FROM public.factura WHERE  "num_factura" = :num_factura';
        $query = $db->prepare($query);
        $query->bindValue(':num_factura', $num_factura, PDO::PARAM_STR);
        $query->execute();
    }
    public function listarAllFactura($db){
        $sql = "SELECT * FROM public.factura";
        $query = $db->prepare($sql);
        $query->execute();
        $result = $query->fetchall(PDO::FETCH_ASSOC);
        return $result;
    }
    public function listarDateFactura($db, $num_factura){
        $sql = 'SELECT *
                FROM public.factura 
                WHERE num_factura = :num_factura';
        $query = $db->prepare($sql);
        $query->bindValue(':num_factura', $num_factura, PDO::PARAM_STR);
        $query->execute();
        $result = $query->fetchall(PDO::FETCH_ASSOC);
        return $result;
    }
    public function consultarFactura($db, $num_factura) {
        $sql = 'SELECT *
                FROM public.factura 
                WHERE num_factura = :num_factura';
        $query = $db->prepare($sql);
        $query->bindValue(':num_factura', $num_factura, PDO::PARAM_STR);
        $query->execute();
        $result = $query->fetch(PDO::FETCH_ASSOC); 
        return $result;
        }
    public function consultarAllFactura($db, $id){
        $sql = 'SELECT *
                FROM public."anaquel" as a
                INNER JOIN public.factura as f
                ON a.id_factura = :id
                INNER JOIN medicamento as m
                ON a.id_medicamento = m.id
                WHERE a.id_factura = f.id';
        $query = $db->prepare($sql);
        $query->bindValue(':id', $id, PDO::PARAM_INT);
        $query->execute();
        $result = $query->fetchall(PDO::FETCH_ASSOC);
        return $result;
    }
}