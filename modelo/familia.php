<?php 
//error_reporting(E_ALL);
//ini_set('display_errors', '1');
require_once('conexion.php');


class Familia{

    public function registrarFamilia($db, $nombre, $apellido, $cedula, $parentesco, $direccion, $ced_ase_familia){
        $sql = 'INSERT INTO public.familia (nombre, apellido, cedula, parentesco, direccion, ced_ase_familia) VALUES (:nombre, :apellido, :cedula, :parentesco, :direccion, :ced_ase_familia)';
        $query = $db->prepare($sql);
        $query->bindValue(':nombre', $nombre, PDO::PARAM_STR);
        $query->bindValue(':apellido', $apellido, PDO::PARAM_STR);
        $query->bindValue(':cedula', $cedula, PDO::PARAM_INT);
        $query->bindValue(':parentesco', $parentesco, PDO::PARAM_STR);
        $query->bindValue(':direccion', $direccion, PDO::PARAM_STR);
        $query->bindValue(':ced_ase_familia', $ced_ase_familia, PDO::PARAM_STR);
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
    public function editarFamilia($db, $nombre, $apellido, $cedula $parentesco, $direccion){
        $sql = 'UPDATE public.familia
        SET nombre= :nombre, apellido= :apellido, cedula= :cedula, parentesco= :parentesco, direccion= :direccion, ced_ase_familia= :ced_ase_familia
        WHERE cedula = :cedula;';
        $query = $db->prepare($sql);
        $query->bindValue(':nombre', $nombre, PDO::PARAM_STR);
        $query->bindValue(':apellido', $apellido, PDO::PARAM_STR);
        $query->bindValue(':cedula', $cedula, PDO::PARAM_INT);
        $query->bindValue(':parentesco', $parentesco, PDO::PARAM_STR);
        $query->bindValue(':direccion', $direccion, PDO::PARAM_STR);
        $query->bindValue(':ced_ase_familia', $ced_ase_familia, PDO::PARAM_STR);
        $query->execute();
        $result = $query->fetch(PDO::FETCH_ASSOC); 
        return $result;
    }
    public function borrarFamilia($db, $cedula){
        $query = 'DELETE FROM public.familia WHERE  "cedula" = :cedula';
        $query = $db->prepare($query);
        $query->bindValue(':cedula', $cedula, PDO::PARAM_INT);
        $query->execute();
    }
    public function listarAllFamilia($db){
        $sql = "SELECT * FROM public.familia";
        $query = $db->prepare($sql);
        $query->execute();
        $result = $query->fetchall(PDO::FETCH_ASSOC);
        return $result;
    }
    public function consultarFamilia($db, $cedula) {
        $sql = 'SELECT *
                FROM public.familia
                WHERE cedula = :cedula';
        $query = $db->prepare($sql);
        $query->bindValue(':cedula', $cedula, PDO::PARAM_INT);
        $query->execute();
        $result = $query->fetch(PDO::FETCH_ASSOC); 
        return $result;
        }
}