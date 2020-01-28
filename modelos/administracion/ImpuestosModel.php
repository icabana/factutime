<?php

class ImpuestosModel extends ModelBase {
  
    function getTodosImpuestos() {
        
     $query = "select 	
		pro_impuestos.ID_IMPUESTO, 
                pro_impuestos.CODIGO_IMPUESTO,
                pro_impuestos.DESCRIPCION_IMPUESTO
                
                from pro_impuestos" ;
        
                $consulta = $this->consulta($query);
               return $consulta;       
               
    }  
  
    function getDatosTermino($ID_IMPUESTO) {
       
     $query = "select 	
		pro_impuestos.ID_IMPUESTO, 
                pro_impuestos.CODIGO_IMPUESTO,
                pro_impuestos.DESCRIPCION_IMPUESTO
                
                from pro_impuestos
      
                where pro_impuestos.ID_IMPUESTO='".$ID_IMPUESTO."'";
        
         $consulta = $this->consulta($query);
        return $consulta[0];    
        
    }
    
    function insertarTermino($CODIGO_IMPUESTO, $DESCRIPCION_IMPUESTO) {
                
         $query = "INSERT INTO pro_impuestos (CODIGO_IMPUESTO, DESCRIPCION_IMPUESTO)
		VALUES('".utf8_decode(mb_strtoupper($CODIGO_IMPUESTO))."', '". utf8_decode(mb_strtoupper($DESCRIPCION_IMPUESTO))."');";
       
        return $this->crear_ultimo_id($query);       
        
    }
    
    function editarTermino($ID_IMPUESTO, $CODIGO_IMPUESTO, $DESCRIPCION_IMPUESTO) {
        
       $query = "UPDATE pro_impuestos  SET CODIGO_IMPUESTO = '".utf8_decode(mb_strtoupper($CODIGO_IMPUESTO))."', DESCRIPCION_IMPUESTO = '".utf8_decode(mb_strtoupper($DESCRIPCION_IMPUESTO))."'
           
        WHERE ID_IMPUESTO = '" . $ID_IMPUESTO . "'";
       
       return $this->modificarRegistros($query);
       
    }
    

    function eliminarTermino($ID_IMPUESTO) {
        
        $query = "DELETE FROM pro_impuestos WHERE ID_IMPUESTO = '". $ID_IMPUESTO ."'";
        
        $this->modificarRegistros($query);

    }
    
}

?>
