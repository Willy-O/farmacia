<?php 
//error_reporting(E_ALL);
//ini_set('display_errors', '1');
require_once('conexion.php');


class Usuario{

    public function registrarUsuario($db, $nombre, $apellido, $cedula, $cargo, $nom_user, $contrasenna){
        $sql = 'INSERT INTO public.usuario (nombre, apellido, cedula, cargo, nom_user, contrasenna) VALUES (:nombre, :apellido, :cedula, :cargo, :nom_user, :contrasenna)';
        $query = $db->prepare($sql);
        $query->bindValue(':nombre', $nombre, PDO::PARAM_STR);
        $query->bindValue(':apellido', $apellido, PDO::PARAM_STR);
        $query->bindValue(':cedula', $cedula, PDO::PARAM_INT);
        $query->bindValue(':cargo', $cargo, PDO::PARAM_STR);
        $query->bindValue(':nom_user', $nom_user, PDO::PARAM_STR);
        $query->bindValue(':contrasenna', $contrasenna, PDO::PARAM_STR);
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
    public function editarUsuario($db, $nombre, $apellido, $cedula, $cargo, $nom_user, $contrasenna, $id){
        $sql = 'UPDATE public.usuario
        SET nombre= :nombre, apellido= :apellido, cedula= :cedula, cargo= :cargo, nom_user= :nom_user, contrasenna= :contrasenna
        WHERE id = :id;';
        $query = $db->prepare($sql);
        $query->bindValue(':nombre', $nombre, PDO::PARAM_STR);
        $query->bindValue(':apellido', $apellido, PDO::PARAM_STR);
        $query->bindValue(':cedula', $cedula, PDO::PARAM_INT);
        $query->bindValue(':cargo', $cargo, PDO::PARAM_STR);
        $query->bindValue(':nom_user', $nom_user, PDO::PARAM_STR);
        $query->bindValue(':contrasenna', $contrasenna, PDO::PARAM_STR);
        $query->bindValue(':id', $id, PDO::PARAM_INT);
        $query->execute();
        $result = $query->fetch(PDO::FETCH_ASSOC); 
        return $result;
    }
    public function borrarUsuario($db, $cedula){
        $query = 'DELETE FROM public.usuario WHERE  "cedula" = :cedula';
        $query = $db->prepare($query);
        $query->bindValue(':cedula', $cedula, PDO::PARAM_INT);
        $query->execute();
        return $query ;
    }
    public function listarAllUsuario($db){
        $sql = "SELECT * FROM public.usuario";
        $query = $db->prepare($sql);
        $query->execute();
        $result = $query->fetchall(PDO::FETCH_ASSOC);
        return $result;
    }
    public function consultarUsuario($db, $cedula) {
        $sql = 'SELECT *
                FROM public.usuario 
                WHERE cedula = :cedula';
        $query = $db->prepare($sql);
        $query->bindValue(':cedula', $cedula, PDO::PARAM_INT);
        $query->execute();
        $result = $query->fetch(PDO::FETCH_ASSOC); 
        return $result;
        }
    public function consultarUsuarioLogin($db, $nom_user) {
        $sql = 'SELECT *
                FROM public.usuario 
                WHERE nom_user = :nom_user';
        $query = $db->prepare($sql);
        $query->bindValue(':nom_user', $nom_user, PDO::PARAM_STR);
        $query->execute();
        $result = $query->fetch(PDO::FETCH_ASSOC); 
        return $result;
        }
}