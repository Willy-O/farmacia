<?php 
 
class Despacho{

    public function registrarDespacho($db, $fecha_despacho, $cantidad_despacho, $comentario, $id_medicamento_inv, $ced_ase_despacho, $id_med_despacho){
        $sql = 'INSERT INTO public.despacho (fecha_despacho, cantidad_despacho, comentario, id_medicamento_inv, ced_ase_despacho, id_med_despacho) VALUES (:fecha_despacho, :cantidad_despacho, :comentario, :id_medicamento_inv, :ced_ase_despacho, :id_med_despacho)';
        $query = $db->prepare($sql);
        $query->bindValue(':cantidad_despacho', $cantidad_despacho, PDO::PARAM_INT);
        $query->bindValue(':fecha_despacho', $fecha_despacho, PDO::PARAM_STR);
        $query->bindValue(':comentario', $comentario, PDO::PARAM_STR);
        $query->bindValue(':id_medicamento_inv', $id_medicamento_inv, PDO::PARAM_INT);
        $query->bindValue(':ced_ase_despacho', $ced_ase_despacho, PDO::PARAM_INT);
        $query->bindValue(':id_med_despacho', $id_med_despacho, PDO::PARAM_INT);
        $query->execute();   
        return $query;
    }
    public function editarDespacho($db, $id_despacho, $fecha_despacho, $cantidad_entregado, $id_pedido, $id_inv_despacho, $ced_ase_despacho){
        $sql = 'UPDATE public.despacho
        SET id_despacho= :id_despacho, fecha_despacho= :fecha_despacho, cantidad_entregado= :cantidad_entregado, id_pedido= :id_pedido, id_inv_despacho= :id_inv_despacho, ced_ase_despacho= :ced_ase_despacho
        WHERE id_despacho = :id_despacho;';
        $query = $db->prepare($sql);
        $query->bindValue(':id_despacho', $id_despacho, PDO::PARAM_STR);
        $query->bindValue(':cantidad_entregado', $cantidad_entregado, PDO::PARAM_STR);
        $query->bindValue(':fecha_despacho', $fecha_despacho, PDO::PARAM_STR);
        $query->bindValue(':id_pedido', $id_pedido, PDO::PARAM_INT);
        $query->bindValue(':id_inv_despacho', $id_inv_despacho, PDO::PARAM_STR);
        $query->bindValue(':ced_ase_despacho', $ced_ase_despacho, PDO::PARAM_INT);
        $query->execute();
        $result = $query->fetch(PDO::FETCH_ASSOC); 
        return $result;
    }
    public function borrarDespacho($db, $id){
        $query = 'DELETE FROM public.despacho WHERE  "id" = :id';
        $query = $db->prepare($query);
        $query->bindValue(':id', $id, PDO::PARAM_STR);
        $query->execute();
    }
    public function listarAllDespacho($db){
        $sql = 'SELECT d.ced_ase_despacho, d.cantidad_despacho, d.fecha_despacho, d.id, m.nombre
                FROM public.despacho as d
                INNER JOIN medicamento as m
                ON d.id_med_despacho = m.id';
          $query = $db->prepare($sql);
          $query->execute();
          $result = $query->fetchall(PDO::FETCH_ASSOC); 
          return $result;
    }
    public function listarAllDespachoDate($db, $fecha_despacho){
        $sql = 'SELECT d.ced_ase_despacho, d.cantidad_despacho, d.fecha_despacho, d.id, m.nombre
                FROM public.despacho as d
                INNER JOIN medicamento as m
                ON d.id_med_despacho = m.id
                WHERE fecha_despacho = :fecha_despacho';
          $query = $db->prepare($sql);
          $query->bindValue(':fecha_despacho', $fecha_despacho, PDO::PARAM_STR);
          $query->execute();
          $result = $query->fetch(PDO::FETCH_ASSOC); 
          return $result;
    }
    public function consultarDespacho($db, $fecha_despacho) {
        $sql = 'SELECT fecha_despacho
                FROM public.despacho
                WHERE fecha_despacho = :fecha_despacho';
        $query = $db->prepare($sql);
        $query->bindValue(':fecha_despacho', $fecha_despacho, PDO::PARAM_STR);
        $query->execute();
        $result = $query->fetch(PDO::FETCH_ASSOC); 
        return $result;
        }
}