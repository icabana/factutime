<?php

class UnidadesModel extends ModelBase {  


    function getTodosUnidades() {        

     $query = "select 	
                    unidades.id_unidad, 
                    unidades.codigo_unidad,
                    unidades.nombre_unidad                

                from unidades" ;        

                $consulta = $this->consulta($query);

               return $consulta;       

    }  
  

    function getDatosUnidad($id_unidad) {       

     $query = "select 	
		        unidades.id_unidad, 
                unidades.codigo_unidad,
                unidades.nombre_unidad                

                from unidades      

                where unidades.id_unidad='".$id_unidad."'";

         $consulta = $this->consulta($query);

        return $consulta[0];    

    }
    

    function insertarUnidad($codigo_unidad, $nombre_unidad) {                

         $query = "INSERT INTO unidades (codigo_unidad, nombre_unidad)
		VALUES('".utf8_decode(mb_strtoupper($codigo_unidad))."', '". utf8_decode(mb_strtoupper($nombre_unidad))."');";

        return $this->crear_ultimo_id($query);      

    }


    function editarUnidad($id_unidad, $codigo_unidad, $nombre_unidad) {
       
       $query = "UPDATE unidades  SET codigo_unidad = '".utf8_decode(mb_strtoupper($codigo_unidad))."', nombre_unidad = '".utf8_decode(mb_strtoupper($nombre_unidad))."'
          
        WHERE id_unidad = '" . $id_unidad . "'";

       return $this->modificarRegistros($query);

    }


    function eliminar($id_unidad) {

        $query = "DELETE FROM unidades WHERE id_unidad = '". $id_unidad ."'";

        $this->modificarRegistros($query);

    }

}

?>