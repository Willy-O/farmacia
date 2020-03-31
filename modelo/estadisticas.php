<?php

require_once('conexion.php');


class Estadistica{
    
    public function fechaDespacho($db, $fechaA, $fechaB){
        $sql = 'SELECT fecha_despacho, COUNT(fecha_despacho) as cant
                FROM public.despacho
                WHERE fecha_despacho BETWEEN :fechaA AND :fechaB
                GROUP BY fecha_despacho;';
        $query = $db->prepare($sql);
        $query->bindValue(':fechaA', $fechaA, PDO::PARAM_STR);
        $query->bindValue(':fechaB', $fechaB, PDO::PARAM_STR);
        $query->execute();
        $result = $query->fetchall(PDO::FETCH_ASSOC);
        return $result;
    }
    public function aseguradosPorEntes($db){
        $sql = 'SELECT e.nombre as nom_ente, COUNT(cedula) AS cant
                FROM public."asegurado"
                INNER JOIN public."entes" as e
                ON rif_ente = rif
                GROUP BY e.nombre';
        $query = $db->prepare($sql);
        $query->execute();
        $result = $query->fetchall(PDO::FETCH_ASSOC);
        return $result;
    }
    public function prontosVencer($db, $fecha, $fecha2){
        $sql = 'SELECT a.fecha_vencimiento, m.nombre, a.cantidad_medicamento
                FROM public.anaquel as a
                INNER JOIN medicamento as m
                ON a.id_medicamento = m.id
                WHERE fecha_vencimiento BETWEEN :fecha AND :fecha2
                GROUP BY a.fecha_vencimiento, m.nombre, a.cantidad_medicamento;';
        $query = $db->prepare($sql);
        $query->bindValue(':fecha', $fecha, PDO::PARAM_STR);
        $query->bindValue(':fecha2', $fecha2, PDO::PARAM_STR);
        $query->execute();
        $result = $query->fetchall(PDO::FETCH_ASSOC);
        return $result;
    }
    public function aseguradosPorStatus($db){
        $sql = 'SELECT statu, COUNT(statu) AS cant
                FROM public."asegurado" 
                WHERE statu = false OR statu = true
                GROUP BY statu';
        $query = $db->prepare($sql);
        $query->execute();
        $result = $query->fetchall(PDO::FETCH_ASSOC);
        return $result; 
    }
    public function fechaVencimiento($db, $fechaMA, $fechaMB){
        $sql = 'SELECT i.cantidad, m.nombre, i.fecha_ven
                FROM public."inventario" as i
                INNER JOIN public."medicamento" as m
                ON id_med = id_med_inventario
                WHERE fecha_ven BETWEEN :fechaMA AND :fechaMB
                GROUP BY i.fecha_ven, m.nombre, i.cantidad';
        $query = $db->prepare($sql);
        $query->bindValue(':fechaMA', $fechaMA, PDO::PARAM_STR);
        $query->bindValue(':fechaMB', $fechaMB, PDO::PARAM_STR);
        $query->execute();
        $result = $query->fetchall(PDO::FETCH_ASSOC);
        return $result;
    }
    public function stock($db){
        $sql = 'SELECT i.cantidad, m.nombre
                FROM public.inventario as i
                INNER JOIN medicamento as m
                ON i.id_medicAMENTO = m.id
                WHERE cantidad < 200
                GROUP BY i.cantidad, m.nombre;';
        $query = $db->prepare($sql);
        $query->execute();
        $result = $query->fetchall(PDO::FETCH_ASSOC);
        return $result; 
    }
}