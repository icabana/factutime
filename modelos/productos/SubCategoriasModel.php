<?php

class SubCategoriasModel extends ModelBase {
  
    function getTodosSubCategorias() {
        
     $query = "select 	
		pro_subcategorias.ID_SUBCATEGORIA, 
                pro_subcategorias.CODIGO_SUBCATEGORIA,
                pro_subcategorias.DESCRIPCION_SUBCATEGORIA
                
                from pro_subcategorias" ;
        
                $consulta = $this->consulta($query);
               return $consulta;       
               
    }  
  
    function getDatosSubCategoria($ID_SUBCATEGORIA) {
       
     $query = "select 	
		pro_subcategorias.ID_SUBCATEGORIA, 
                pro_subcategorias.CODIGO_SUBCATEGORIA,
                pro_subcategorias.DESCRIPCION_SUBCATEGORIA
                
                from pro_subcategorias
      
                where pro_subcategorias.ID_SUBCATEGORIA='".$ID_SUBCATEGORIA."'";
        
         $consulta = $this->consulta($query);
        return $consulta[0];    
        
    }
    
    function insertarSubCategoria($CODIGO_SUBCATEGORIA, $DESCRIPCION_SUBCATEGORIA) {
                
         $query = "INSERT INTO pro_subcategorias (CODIGO_SUBCATEGORIA, DESCRIPCION_SUBCATEGORIA)
		VALUES('".utf8_decode(mb_strtoupper($CODIGO_SUBCATEGORIA))."', '". utf8_decode(mb_strtoupper($DESCRIPCION_SUBCATEGORIA))."');";
       
        return $this->crear_ultimo_id($query);       
        
    }
    
    function editarSubCategoria($ID_SUBCATEGORIA, $CODIGO_SUBCATEGORIA, $DESCRIPCION_SUBCATEGORIA) {
        
       $query = "UPDATE pro_subcategorias  SET CODIGO_SUBCATEGORIA = '".utf8_decode(mb_strtoupper($CODIGO_SUBCATEGORIA))."', DESCRIPCION_SUBCATEGORIA = '".utf8_decode(mb_strtoupper($DESCRIPCION_SUBCATEGORIA))."'
           
        WHERE ID_SUBCATEGORIA = '" . $ID_SUBCATEGORIA . "'";
       
       return $this->modificarRegistros($query);
       
    }
    

    function eliminarSubCategoria($ID_SUBCATEGORIA) {
        
        $query = "DELETE FROM pro_subcategorias WHERE ID_SUBCATEGORIA = '". $ID_SUBCATEGORIA ."'";
        
        $this->modificarRegistros($query);

    }
    
}

?>
