<?php

class UnidadesModel extends ModelBase {
  
    function getTodosUnidades() {
        
     $query = "select 	
		pro_unidades.ID_UNIDAD, 
                pro_unidades.CODIGO_UNIDAD,
                pro_unidades.DESCRIPCION_UNIDAD
                
                from pro_unidades" ;
        
                $consulta = $this->consulta($query);
               return $consulta;       
               
    }  
  
    function getDatosUnidad($ID_UNIDAD) {
       
     $query = "select 	
		pro_unidades.ID_UNIDAD, 
                pro_unidades.CODIGO_UNIDAD,
                pro_unidades.DESCRIPCION_UNIDAD
                
                from pro_unidades
      
                where pro_unidades.ID_UNIDAD='".$ID_UNIDAD."'";
        
         $consulta = $this->consulta($query);
        return $consulta[0];    
        
    }
    
    function insertarUnidad($CODIGO_UNIDAD, $DESCRIPCION_UNIDAD) {
                
         $query = "INSERT INTO pro_unidades (CODIGO_UNIDAD, DESCRIPCION_UNIDAD)
		VALUES('".utf8_decode(mb_strtoupper($CODIGO_UNIDAD))."', '". utf8_decode(mb_strtoupper($DESCRIPCION_UNIDAD))."');";
       
        return $this->crear_ultimo_id($query);       
        
    }
    
    function editarUnidad($ID_UNIDAD, $CODIGO_UNIDAD, $DESCRIPCION_UNIDAD) {
        
       $query = "UPDATE pro_unidades  SET CODIGO_UNIDAD = '".utf8_decode(mb_strtoupper($CODIGO_UNIDAD))."', DESCRIPCION_UNIDAD = '".utf8_decode(mb_strtoupper($DESCRIPCION_UNIDAD))."'
           
        WHERE ID_UNIDAD = '" . $ID_UNIDAD . "'";
       
       return $this->modificarRegistros($query);
       
    }
    

    function eliminarUnidad($ID_UNIDAD) {
        
        $query = "DELETE FROM pro_unidades WHERE ID_UNIDAD = '". $ID_UNIDAD ."'";
        
        $this->modificarRegistros($query);

    }
    
}

?>
