<?php 

require_once('conexion.php');

class Traspaso{

    public function registrarTraspaso($db, $id_traspaso, $id_pedido, $id_sucursal, $id_inventario){
        $sql = 'INSERT INTO public.traspaso (id_traspaso, id_pedido, id_sucursal, id_inventario) VALUES (:id_traspaso, :id_pedido, :id_sucursal, :id_inventario)';
        $query = $db->prepare($sql);
        $query->bindValue(':id_traspaso', $id_traspaso, PDO::PARAM_STR);
        $query->bindValue(':id_pedido', $id_pedido, PDO::PARAM_STR);
        $query->bindValue(':id_sucursal', $id_sucursal, PDO::PARAM_STR);
        $query->bindValue(':id_inventario', $id_inventario, PDO::PARAM_STR);
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
    public function editarTraspaso($db, $id_traspaso, $id_pedido, $id_sucursal, $id_inventario){
        $sql = 'UPDATE public.traspaso
        SET id_traspaso= :id_traspaso, id_pedido= :id_pedido, id_sucursa= :id_sucursal, id_inventario= :id_inventario
        WHERE id_traspaso = :id_traspaso;';
        $query = $db->prepare($sql);
        $query->bindValue(':id_traspaso', $id_traspaso, PDO::PARAM_STR);
        $query->bindValue(':id_pedido', $id_pedido, PDO::PARAM_STR);
        $query->bindValue(':id_sucursal', $id_sucursal, PDO::PARAM_STR);
        $query->bindValue(':id_inventario', $id_inventario, PDO::PARAM_STR);
        $query->execute();
        $result = $query->fetch(PDO::FETCH_ASSOC); 
        return $result;
    }
    public function borrarTraspaso($db, $id_traspaso){
        $query = 'DELETE FROM public.traspaso WHERE  "id_traspaso" = :id_traspaso';
        $query = $db->prepare($query);
        $query->bindValue(':id_traspaso', $id_traspaso, PDO::PARAM_INT);
        $query->execute();
    }
    public function listarTraspaso($db){
        $sql = "SELECT * FROM public.traspaso";
        $query = $db->prepare($sql);
        $query->execute();
        $result = $query->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
    public function listarAllTraspaso($db){
        $sql = "SELECT * FROM public.traspaso";
        $query = $db->prepare($sql);
        $query->execute();
        $result = $query->fetchall(PDO::FETCH_ASSOC);
        return $result;
    }
    public function consultarTraspaso($db, $id_traspaso) {
        $sql = 'SELECT *
                FROM public.traspaso 
                WHERE id_traspaso= :id_traspaso';
        $query = $db->prepare($sql);
        $query->bindValue(':id_traspaso', $id_traspaso, PDO::PARAM_STR);
        $query->execute();
        $result = $query->fetch(PDO::FETCH_ASSOC); 
        return $result;
        }
}