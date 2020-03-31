<?php 
 
class Anaquel{

   public function Registro($db,$id_medicamento, $id_factura, $fecha_vencimiento, $precio_facturado, $cantidad_medicamento)
   {
    $sql = 'INSERT INTO public.anaquel (id_medicamento, id_factura, fecha_vencimiento, precio_facturado,cantidad_medicamento) VALUES (:id_medicamento,:id_factura,:fecha_vencimiento,:precio_facturado,:cantidad_medicamento)';
        $query = $db->prepare($sql);
        $query->bindValue(':id_medicamento', $id_medicamento, PDO::PARAM_INT);
        $query->bindValue(':id_factura', $id_factura, PDO::PARAM_INT);
        $query->bindValue(':fecha_vencimiento', $fecha_vencimiento, PDO::PARAM_STR);
        $query->bindValue(':precio_facturado', $precio_facturado, PDO::PARAM_INT);
        $query->bindValue(':cantidad_medicamento', $cantidad_medicamento, PDO::PARAM_INT);
        $query->execute();  
        if ($query) { 

        } 
        return $query;
   }
   public function jsonAnaquel($db,$id_medicamento){
      $sql=  'SELECT precio_facturado
              FROM public.anaquel
              WHERE id_medicamento = :id_medicamento';  
      $query = $db->prepare($sql);
      $query->bindValue(':id_medicamento', $id_medicamento, PDO::PARAM_STR);
      $query->execute();
      $data = array();
      while($row=$query->fetch(PDO::FETCH_ASSOC)){
              $data[] = $row;
      return $data;
          }
  }

}