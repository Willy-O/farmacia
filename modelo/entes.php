<?php 
 
require_once('conexion.php');


class Ente{

    public function registrarEnte($db, $nombre, $rif){
        $sql = 'INSERT INTO public.entes (nombre, rif) VALUES (:nombre, :rif)';
        $query = $db->prepare($sql);
        $query->bindValue(':nombre', $nombre, PDO::PARAM_STR);
        $query->bindValue(':rif', $rif, PDO::PARAM_STR);
        $query->execute();   
        return $query;
    }
    public function editarEnte($db, $id, $nombre, $rif){
        $sql = 'UPDATE public.entes
                SET nombre= :nombre, rif= :rif
                WHERE id = :id;';
        $query = $db->prepare($sql);
        $query->bindValue(':id', $id, PDO::PARAM_INT);
        $query->bindValue(':nombre', $nombre, PDO::PARAM_STR);
        $query->bindValue(':rif', $rif, PDO::PARAM_STR);
        $query->execute();
        $result = $query->fetch(PDO::FETCH_ASSOC); 
        return $result;
    }
    public function borrarEnte($db, $id){
        $query = 'DELETE FROM public.entes WHERE "id" = :id';
        $query = $db->prepare($query);
        $query->bindValue(':id', $id, PDO::PARAM_STR);
        $query->execute();
    }
    public function listarAllEnte($db){
        $sql = "SELECT * FROM public.entes";
        $query = $db->prepare($sql);
        $query->execute();
        $result = $query->fetchall(PDO::FETCH_ASSOC);
        return $result;
    }
    public function consultarEnte($db, $rif) {
        $sql = 'SELECT *
                FROM public.entes 
                WHERE rif = :rif';
        $query = $db->prepare($sql);
        $query->bindValue(':rif', $rif, PDO::PARAM_STR);
        $query->execute();
        $result = $query->fetch(PDO::FETCH_ASSOC); 
        return $result;
        }
        public function consultarEnteId($db, $id) {
            $sql = 'SELECT *
                    FROM public.entes 
                    WHERE id = :id';
            $query = $db->prepare($sql);
            $query->bindValue(':id', $id, PDO::PARAM_INT);
            $query->execute();
            $result = $query->fetch(PDO::FETCH_ASSOC); 
            return $result;
            }
    public function consultarNombreEnte($db, $nombre) {
            $sql = 'SELECT *
                    FROM public.entes 
                    WHERE nombre = :nombre';
            $query = $db->prepare($sql);
            $query->bindValue(':nombre', $nombre, PDO::PARAM_INT);
            $query->execute();
            $result = $query->fetch(PDO::FETCH_ASSOC); 
            return $result;
            }
    public function consultarEnteAsegurado($db, $rif){
            $sql = 'SELECT cedula
            FROM public.asegurado
            INNER JOIN public.entes
            ON rif_ente = :rif';
            $query = $db->prepare($sql);
            $query->bindValue(':rif', $rif, PDO::PARAM_INT);
            $query->execute();
            $result = $query->fetch(PDO::FETCH_ASSOC); 
            return $result;
            }
    public function jsonEntesSelect($db){
        $sql=  'SELECT nombre, rif
                FROM public.entes';  
        $query = $db->prepare($sql);
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC); 
        return $result;
        
    }
}