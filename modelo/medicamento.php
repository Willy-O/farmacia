<?php 

class Medicamento{


    public function registrarMedicamento($db, $codigo_med, $nombre, $concentracion, $informacion, $forma_farmaceutica, $unidosis, $dosis, $presentacion, $contenido){
        $sql = 'INSERT INTO public.medicamento (codigo_med, nombre, concentracion, informacion, forma_farmaceutica, unidosis, dosis, presentacion, contenido) VALUES (:codigo_med, :nombre, :concentracion, :informacion, :forma_farmaceutica, :unidosis, :dosis, :presentacion, :contenido)';
        $query = $db->prepare($sql);
        $query->bindValue(':codigo_med', $codigo_med, PDO::PARAM_STR);
        $query->bindValue(':nombre', $nombre, PDO::PARAM_STR);
        $query->bindValue(':concentracion', $concentracion, PDO::PARAM_INT);
        $query->bindValue(':informacion', $informacion, PDO::PARAM_STR);
        $query->bindValue(':forma_farmaceutica', $forma_farmaceutica, PDO::PARAM_INT);
        $query->bindValue(':unidosis', $unidosis, PDO::PARAM_STR);
        $query->bindValue(':dosis', $dosis, PDO::PARAM_INT);
        $query->bindValue(':presentacion', $presentacion, PDO::PARAM_STR);
        $query->bindValue(':contenido', $contenido, PDO::PARAM_INT);
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
    public function editarMedicamento($db, $id, $codigo_med, $nombre, $concentracion, $informacion, $forma_farmaceutica, $unidosis, $dosis, $presentacion){
        $sql = 'UPDATE public.medicamento
        SET codigo_med= :codigo_med, nombre= :nombre, concentracion= :concentracion, informacion= :informacion, forma_farmaceutica= :forma_farmaceutica,  unidosis= :unidosis, dosis= :dosis, presentacion= :presentacion
        WHERE id = :id;';
        $query = $db->prepare($sql);
        $query->bindValue(':codigo_med', $codigo_med, PDO::PARAM_STR);
        $query->bindValue(':nombre', $nombre, PDO::PARAM_STR);
        $query->bindValue(':concentracion', $concentracion, PDO::PARAM_INT);
        $query->bindValue(':informacion', $informacion, PDO::PARAM_STR);
        $query->bindValue(':forma_farmaceutica', $forma_farmaceutica, PDO::PARAM_INT);
        $query->bindValue(':unidosis', $unidosis, PDO::PARAM_STR);
        $query->bindValue(':dosis', $dosis, PDO::PARAM_INT);
        $query->bindValue(':id', $id, PDO::PARAM_INT);
        $query->bindValue(':presentacion', $presentacion, PDO::PARAM_STR);
        $query->execute();  
        if ($query) {
            // echo "<script type=\"text/javascript\">
            //   history.go(-1);
            //  </script>";
             // exit;
        } else{
            echo "algo salió mal";
        }
        return $query;
    }
    public function borrarMedicamento($db, $codigo_med){
        $query = 'DELETE FROM public.medicamento WHERE  "codigo_med" = :codigo_med';
        $query = $db->prepare($query);
        $query->bindValue(':codigo_med', $codigo_med, PDO::PARAM_STR);
        $query->execute();
    }
    public function listarAllMedicamento($db){
        $sql = "SELECT * FROM public.medicamento";
        $query = $db->prepare($sql);
        $query->execute();
        $result = $query->fetchall(PDO::FETCH_ASSOC);
        return $result;
    }
    public function listarConcentracion($db, $concentracion){
        $sql = "SELECT * 
                FROM public.medicamento
                WHERE concentracion = :concentracion;";
        $query = $db->prepare($sql);
        $query->bindValue(':concentracion', $concentracion, PDO::PARAM_STR);
        $query->execute();
        $result = $query->fetchall(PDO::FETCH_ASSOC); 
        return $result;
    }
    public function listarNombre($db, $nombre){
        $sql = "SELECT * 
                FROM public.medicamento
                WHERE nombre = :nombre;";
        $query = $db->prepare($sql);
        $query->bindValue(':nombre', $nombre, PDO::PARAM_STR);
        $query->execute();
        $result = $query->fetchall(PDO::FETCH_ASSOC); 
        return $result;
    }
    public function listarPresentacion($db, $presentacion){
        $sql = "SELECT * 
                FROM public.medicamento
                WHERE presentacion = :presentacion;";
        $query = $db->prepare($sql);
        $query->bindValue(':presentacion', $presentacion, PDO::PARAM_STR);
        $query->execute();
        $result = $query->fetchall(PDO::FETCH_ASSOC); 
        return $result;
    }
    public function listarUnidosis($db, $unidosis){
        $sql = "SELECT * 
                FROM public.medicamento
                WHERE unidosis = :unidosis;";
        $query = $db->prepare($sql);
        $query->bindValue(':unidosis', $unidosis, PDO::PARAM_STR);
        $query->execute();
        $result = $query->fetchall(PDO::FETCH_ASSOC); 
        return $result;
    }
    public function consultarMedicamento($db, $codigo_med) {
        $sql = 'SELECT *
                FROM public.medicamento 
                WHERE codigo_med = :codigo_med'; 
        $query = $db->prepare($sql);
        $query->bindValue(':codigo_med', $codigo_med, PDO::PARAM_STR);
        $query->execute();
        $result = $query->fetch(PDO::FETCH_ASSOC); 
        return $result;
    }
    public function jsonMedicamentos($db,$codigo_med){
        $sql=  'SELECT id,codigo_med, nombre, concentracion, forma_farmaceutica, unidosis, dosis, contenido, presentacion
                FROM public.medicamento
                WHERE codigo_med = :codigo_med';  
        $query = $db->prepare($sql);
        $query->bindValue(':codigo_med', $codigo_med, PDO::PARAM_STR);
        $query->execute();
        $data = array();
        while($row=$query->fetch(PDO::FETCH_ASSOC)){
                $data[] = $row;
        return $data;
            }
    }

    public function jsonMedicamentosSelect($db){
        $sql=  'SELECT codigo_med, nombre, concentracion, forma_farmaceutica, unidosis, dosis
                FROM public.medicamento';  
        $query = $db->prepare($sql);
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC); 
        return $result;
        
    }
    
}

// class MedicamentoDonado{
// //************************************** LISTO *******************************/
//     public function registrarMedicamentoDonado($db, $date, $medicamento, $nfacturaproveedor, $npedido, $time){
//         $sql = 'INSERT INTO public.medicamentos_mc (fecha, medicamentos_mc, nfacturaproveedor_mc, npedido_mc, hora) VALUES (:dat, :medicamento, :nfacturaproveedor, :npedido, :tim)';
//         $query = $db->prepare($sql);
//         $query->bindValue(':dat', $date, PDO::PARAM_STR);
//         $query->bindValue(':medicamento', $medicamento, PDO::PARAM_STR);
//         $query->bindValue(':nfacturaproveedor', $nfacturaproveedor, PDO::PARAM_INT);
//         $query->bindValue(':npedido', $npedido, PDO::PARAM_STR);
//         $query->bindValue(':tim', $time, PDO::PARAM_STR);
//         if ($query) {
//             echo "<script type=\"text/javascript\">
//               history.go(-1);
//              </script>";
//              exit;
//         } else{
//             echo "algo salió mal";
//         }
//         return $query;
//     }
// //********************************* ***********************************/
//     public function editarMedicamentoDonado($date, $motivo, $notas, $anexo, $hora){
//         $query = "UPDATE medicamento SET 'nCasoCircular' = $date, $motivo, $notas, $anexo, $hora";
//         $result = pg_query($conexion, $query) or die('ERROR AL INSERTAR DATOS: ' . pg_last_error());
//         return $result;
//     }
//     //********************************* ***********************************/
//     public function borrarMedicamentoDonado($nCasoCircular,$conexion){
//         $query = 'DELETE FROM public.usuario WHERE  "cedula" = :cedula';
//         $query = $db->prepare($query);
//         $query->bindValue(':cedula', $cedula, PDO::PARAM_INT);
//         $query->execute();
//     }
//     //********************************* ***********************************/
//     public function listarMedicamentoDonado($conexion){
//         $query = "SELECT * FROM medicamento";
//         $resultado = pg_query($conexion, $query) or die('ERROR AL INSERTAR DATOS: ' . pg_last_error());
//         $resultado = $resultado->fetchAll();   
//         return $resultado;
//     }
//     //********************************* ***********************************/
//     public function consultarMedicamentoDonado($id, $conexion) {
//         $sql = 'SELECT *
//                 FROM public.usuario 
//                 WHERE cedula = :cedula';
//         $query = $db->prepare($sql);
//         $query->bindValue(':cedula', $cedula, PDO::PARAM_INT);
//         $query->execute();
//         $result = $query->fetch(PDO::FETCH_ASSOC); 
//         return $result;
//         }
//         //********************************* ***********************************/
//     public function consultarMedicamentoDonadoPorFecha($date,$conexion){
//         $query = "SELECT * FROM medicamento WHERE 'date' = $date";
//         $result = pg_query($conexion, $query) or die('ERROR AL INSERTAR DATOS: ' . pg_last_error());
//         return $result;
//     }
// }

// ?>