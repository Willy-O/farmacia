<?php 
 
require_once('conexion.php');

class Asegurado{

    public function registrarAsegurado($db, $nombre, $apellido, $cedula, $numero_habitacion, $numero_celular, $direccion, $statu, $rif_ente, $poliza){
        $sql = 'INSERT INTO public.asegurado (nombre, apellido, cedula, numero_habitacion, numero_celular, direccion, statu, rif_ente, poliza) VALUES (:nombre, :apellido, :cedula, :numero_habitacion, :numero_celular, :direccion, :statu, :rif_ente, :poliza)';
        $query = $db->prepare($sql);
        $query->bindValue(':nombre', $nombre, PDO::PARAM_STR);
        $query->bindValue(':apellido', $apellido, PDO::PARAM_STR);
        $query->bindValue(':cedula', $cedula, PDO::PARAM_INT);
        $query->bindValue(':numero_habitacion', $numero_habitacion, PDO::PARAM_INT);
        $query->bindValue(':numero_celular', $numero_celular, PDO::PARAM_INT);
        $query->bindValue(':direccion', $direccion, PDO::PARAM_STR);
        $query->bindValue(':statu', $statu, PDO::PARAM_STR);
        $query->bindValue(':rif_ente', $rif_ente, PDO::PARAM_INT);
        $query->bindValue(':poliza', $poliza, PDO::PARAM_INT);
        $query->execute();   
        return $query;
    }
    public function editarAsegurado($db, $nombre, $apellido, $cedula, $numero_habitacion, $numero_celular, $direccion, $statu, $rif_ente, $poliza, $id){
        $sql = 'UPDATE public.asegurado
                SET nombre= :nombre, apellido= :apellido, cedula= :cedula, numero_habitacion= :numero_habitacion, numero_celular= :numero_celular, direccion= :direccion, statu= :statu, rif_ente= :rif_ente, poliza= :poliza
                WHERE id = :id;';
        $query = $db->prepare($sql);
        $query->bindValue(':nombre', $nombre, PDO::PARAM_STR);
        $query->bindValue(':apellido', $apellido, PDO::PARAM_STR);
        $query->bindValue(':cedula', $cedula, PDO::PARAM_INT);
        $query->bindValue(':numero_habitacion', $numero_habitacion, PDO::PARAM_INT);
        $query->bindValue(':numero_celular', $numero_celular, PDO::PARAM_INT);
        $query->bindValue(':direccion', $direccion, PDO::PARAM_STR);
        $query->bindValue(':statu', $statu, PDO::PARAM_STR);
        $query->bindValue(':rif_ente', $rif_ente, PDO::PARAM_INT);
        $query->bindValue(':id', $id, PDO::PARAM_INT);
        $query->bindValue(':poliza', $poliza, PDO::PARAM_INT);
        $query->execute();
        $result = $query->fetch(PDO::FETCH_ASSOC); 
        return $result;
    }
    public function borrarAsegurado($db, $cedula){
        $query = 'DELETE FROM public.asegurado WHERE  "cedula" = :cedula';
        $query = $db->prepare($query);
        $query->bindValue(':cedula', $cedula, PDO::PARAM_INT);
        $query->execute();
    }
    public function listarAllAsegurado($db){
        $sql = "SELECT e.nombre as nombre_ente, a.nombre, a.apellido, a.statu, a.cedula, a.poliza
                FROM public.asegurado as a
                INNER JOIN public.entes as e
                ON rif_ente = rif";
        $query = $db->prepare($sql);
        $query->execute();
        $result = $query->fetchall(PDO::FETCH_ASSOC);
        return $result;
    }
    public function consultarAsegurado($db, $cedula) {
        $sql = 'SELECT e.nombre as nombre_ente, a.nombre, a.apellido, a.direccion, a.statu, a.numero_celular, a.numero_habitacion, a.cedula, a.rif_ente, a.poliza, a.id as iden    
                FROM public.asegurado as a
                INNER JOIN public.entes as e
                ON rif_ente = rif
                WHERE cedula = :cedula';
        $query = $db->prepare($sql);
        $query->bindValue(':cedula', $cedula, PDO::PARAM_INT);
        $query->execute();
        $result = $query->fetch(PDO::FETCH_ASSOC); 
        return $result;
    }
}