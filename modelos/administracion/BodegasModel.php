<?php

class BodegasModel extends ModelBase {
  
    function getTodosBodegas() {
        
     $query = "select 	
		pro_bodegas.ID_BODEGA, 
                pro_bodegas.CODIGO_BODEGA,
                pro_bodegas.DESCRIPCION_BODEGA
                
                from pro_bodegas" ;
        
                $consulta = $this->consulta($query);
               return $consulta;       
               
    }  
  
    function getDatosBodega($ID_BODEGA) {
       
     $query = "select 	
		pro_bodegas.ID_BODEGA, 
                pro_bodegas.CODIGO_BODEGA,
                pro_bodegas.DESCRIPCION_BODEGA
                
                from pro_bodegas
      
                where pro_bodegas.ID_BODEGA='".$ID_BODEGA."'";
        
         $consulta = $this->consulta($query);
        return $consulta[0];    
        
    }
    
    function insertarBodega($CODIGO_BODEGA, $DESCRIPCION_BODEGA) {
                
         $query = "INSERT INTO pro_bodegas (CODIGO_BODEGA, DESCRIPCION_BODEGA)
		VALUES('".utf8_decode(mb_strtoupper($CODIGO_BODEGA))."', '". utf8_decode(mb_strtoupper($DESCRIPCION_BODEGA))."');";
       
        return $this->crear_ultimo_id($query);       
        
    }
    
    function editarBodega($ID_BODEGA, $CODIGO_BODEGA, $DESCRIPCION_BODEGA) {
        
       $query = "UPDATE pro_bodegas  SET CODIGO_BODEGA = '".utf8_decode(mb_strtoupper($CODIGO_BODEGA))."', DESCRIPCION_BODEGA = '".utf8_decode(mb_strtoupper($DESCRIPCION_BODEGA))."'
           
        WHERE ID_BODEGA = '" . $ID_BODEGA . "'";
       
       return $this->modificarRegistros($query);
       
    }
    

    function eliminarBodega($ID_BODEGA) {
        
        $query = "DELETE FROM pro_bodegas WHERE ID_BODEGA = '". $ID_BODEGA ."'";
        
        $this->modificarRegistros($query);

    }
    
}

?>
