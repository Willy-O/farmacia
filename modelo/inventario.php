<?php 

class Inventario{

    public function Registro($db,$cantidad,$precio_unitario,$id_medicamento,$condicion)
    {
        $sql = 'SELECT id_medicamento
                FROM public.inventario
                WHERE id_medicamento = :id_medicamento';
        $query = $db->prepare($sql);
        $query->bindValue(':id_medicamento', $id_medicamento, PDO::PARAM_INT);
        $query->execute();
        $result = $query->fetch(PDO::FETCH_ASSOC); 
        if ($result == null) {
            $sql = 'INSERT INTO public.inventario (cantidad, precio_unitario,id_medicamento) VALUES (:cantidad,:precio_unitario,:id_medicamento)
            	        ON CONFLICT (id_medicamento) 
                        DO UPDATE 
                        SET precio_unitario = excluded.precio_unitario';
            $query = $db->prepare($sql);
            $query->bindValue(':cantidad', $cantidad, PDO::PARAM_INT);
            $query->bindValue(':precio_unitario', $precio_unitario, PDO::PARAM_INT);
            $query->bindValue(':id_medicamento', $id_medicamento, PDO::PARAM_INT);
            $query->execute();  
        }else{
            if ($condicion == 'sumar')  {   
                $sql = 'UPDATE public.inventario SET cantidad=cantidad + :cantidad, precio_unitario = :precio_unitario where id_medicamento = :id_medicamento';
                $query = $db->prepare($sql);
                $query->bindValue(':cantidad', $cantidad, PDO::PARAM_INT);
                $query->bindValue(':precio_unitario', $precio_unitario, PDO::PARAM_INT);
                $query->bindValue(':id_medicamento', $id_medicamento, PDO::PARAM_INT);
                $query->execute();  
            }else{
                // $sql = 'SELECT cantidad
                //         FROM public.inventario
                //         WHERE id_medicamento = :id_medicamento';
                // $query = $db->prepare($sql);
                // $query->bindValue(':id_medicamento', $id_medicamento, PDO::PARAM_INT);
                // $query->execute();
                // $result = $query->fetch(PDO::FETCH_ASSOC);
                        // if ($result >= $cantidad) {
                $sql = 'UPDATE public.inventario SET cantidad=cantidad - :cantidad where id_medicamento = :id_medicamento';
                $query = $db->prepare($sql);
                $query->bindValue(':cantidad', $cantidad, PDO::PARAM_INT);
                $query->bindValue(':id_medicamento', $id_medicamento, PDO::PARAM_INT);
                $query->execute(); 
                        // }else{
                        //         echo 'error';
                        // }
            }
        }
        
        if ($query) { 

        } 
        return $query;
    }

    public function listarAllInventario($db) {
        $sql = 'SELECT m.codigo_med, m.nombre, i.cantidad, i.precio_unitario
                        FROM public.inventario as i
                        INNER JOIN public.medicamento as m
                        ON m.id = i.id_medicamento';
        $query = $db->prepare($sql);
        $query->execute();
        $result = $query->fetchall(PDO::FETCH_ASSOC); 
        return $result;
        }
        //(:cantidad, :fecha_ven, :id_med_inventario, :id_fac_inventario, :precio_unitario);
        public function crearInventario($db, $cantidad, $fecha_ven, $id_med_inventario, $id_fac_inventario, $precio_unitario){
        $sql = 'INSERT INTO public.inventario(
                cantidad, fecha_ven, id_med_inventario, id_fac_inventario, precio_unitario)
                VALUES ';
        $insertQuery = array();
        $insertData = array();
        $n = 0;
        foreach ($data as $row) {
                $insertQuery[] = '(:cantidad' . $n . ', :fecha_ven' . $n . ', :id_med_inventario' . $n . ', :id_fac_inventario' . $n . ', :precio_unitario' . $n . ')';
                $insertData['cantidad' . $n] = $cantidad;
                $insertData['fecha_ven' . $n] = $fecha_ven;
                $insertData['id_med_inventario' . $n] = $id_med_inventario;
                $insertData['id_fac_inventario' . $n] = $id_fac_inventario;
                $insertData['precio_unitario' . $n] = $precio_unitario;
                $n++;
        }
        if (!empty($insertQuery)) {
                $sql .= implode(', ', $insertQuery);
                $stmt = $db->prepare($sql);
                $stmt->execute($insertData);
                }
        //$query->bindValue(':cantidad', $cantidad, PDO::PARAM_INT;
        //$query->bindValue(':fecha_ven', $fecha_ven, PDO::PARAM_STR);
        //$query->bindValue(':id_med_inventario', $id_med_inventario, PDO::PARAM_INT);
        //$query->bindValue(':id_fac_inventario', $id_fac_inventario, PDO::PARAM_STR);
        //$query->bindValue(':precio_unitario', $precio_unitario, PDO::PARAM_INT);
        $query->execute();   
        return $query;
        }
        public function consultarInventario($db, $codigo_med){
                $sql = 'SELECT m.codigo_med, i.cantidad, i.precio_unitario
                        FROM public.inventario as i
                        INNER JOIN public.medicamento as m
                        ON id_med = id_med_inventario';
                $query = $db->prepare($sql);
                $query->execute();
                $result = $query->fetch(PDO::FETCH_ASSOC); 
                return $result;
        }
        public function precioMedicamento($db,$id_med){
                $sql=  'SELECT  precio_unitario
                        FROM public.inventario
                        WHERE id_med_inventario = :id_med_inventario';
                $query = $db->prepare($sql);
                $query->bindValue(':id_med_inventario', $id_med_inventario, PDO::PARAM_STR);
                $query->execute();
                $result = $query->fetch(PDO::FETCH_ASSOC);
                return $result; 
        }
        public function cantidadMedicamento($db,$id_med){
                $sql=  'SELECT cantidad
                        FROM public.inventario
                        WHERE id_med_inventario = :id_med_inventario';
                $query = $db->prepare($sql);
                $query->bindValue(':id_med_inventario', $id_med_inventario, PDO::PARAM_STR);
                $query->execute();
                $data = array();
                while($row=$query->fetch(PDO::FETCH_ASSOC)){
                        $data[] = $row;
                return $data;
                }
        }
        public function jsonInventario($db,$id_medicamento){
                $sql=  'SELECT precio_unitario,id
                        FROM public.inventario
                        WHERE id_medicamento = :id_medicamento';  
                $query = $db->prepare($sql);
                $query->bindValue(':id_medicamento', $id_medicamento, PDO::PARAM_INT);
                $query->execute();
                $result = $query->fetch(PDO::FETCH_ASSOC);
                return $result; 
        }
}

