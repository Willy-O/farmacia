<?php 

require_once('conexion.php');

class Patologia{

    public function registrarPatologia($db, $id_patologia, $tipo_enfermedad, $nom_enfermedad, $id_med_patologia){
        $sql = 'INSERT INTO public.patologia (id_patologia, tipo_enfermedad, nom_enfermedad, id_med_patologia) VALUES (:id_patologia, :tipo_enfermedad, :nom_enfermedad, :id_med_patologia)';
        $query = $db->prepare($sql);
        $query->bindValue(':id_patologia', $id_patologia, PDO::PARAM_STR);
        $query->bindValue(':tipo_enfermedad', $tipo_enfermedad, PDO::PARAM_STR);
        $query->bindValue(':nom_enfermedad', $nom_enfermedad, PDO::PARAM_STR);
        $query->bindValue(':id_med_patologia', $id_med_patologia, PDO::PARAM_STR);
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
    public function editarPatologia($db, $id_patologia, $tipo_enfermedad, $nom_enfermedad, $id_med_patologia){
        $sql = 'UPDATE public.patologia
        SET id_patologia= :id_patologia, tipo_enfermedad= :tipo_enfermedad, tiempo= :tiempo, promedio_med= :promedio_med, nom_enfermedad= :nom_enfermedad, id_med_patologia= :id_med_patologia
        WHERE  id_patologia = :id_patologia;';
        $query = $db->prepare($sql);
        $query->bindValue(':id_patologia', $id_patologia, PDO::PARAM_STR);
        $query->bindValue(':tipo_enfermedad', $tipo_enfermedad, PDO::PARAM_STR);
        $query->bindValue(':nom_enfermedad', $nom_enfermedad, PDO::PARAM_STR);
        $query->bindValue(':id_med_patologia', $id_med_patologia, PDO::PARAM_STR);
        $query->execute();
        $result = $query->fetch(PDO::FETCH_ASSOC); 
        return $result;
    }
    public function borrarPatologia($db, $id_patologia){
        $query = 'DELETE FROM public.patologia WHERE  "id_patologia" = :id_patologia';
        $query = $db->prepare($query);
        $query->bindValue(':id_patologia', $id_patologia, PDO::PARAM_INT);
        $query->execute();
    }
    public function listarPatologia($db){
        $sql = "SELECT * FROM public.patologia";
        $query = $db->prepare($sql);
        $query->execute();
        $result = $query->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
    public function consultarPatologia($db, $id_patologia) {
        $sql = 'SELECT *
                FROM public.patologia 
                WHERE id_patologia = :id_patologia';
        $query = $db->prepare($sql);
        $query->bindValue(':id_patologia', $id_patologia, PDO::PARAM_STR);
        $query->execute();
        $result = $query->fetch(PDO::FETCH_ASSOC); 
        return $result;
        }
}