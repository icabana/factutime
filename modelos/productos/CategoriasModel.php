<?php

class CategoriasModel extends ModelBase {
  
    function getTodosCategorias() {
        
     $query = "select 	
		pro_categorias.ID_CATEGORIA, 
                pro_categorias.CODIGO_CATEGORIA,
                pro_categorias.DESCRIPCION_CATEGORIA
                
                from pro_categorias" ;
        
                $consulta = $this->consulta($query);
               return $consulta;       
               
    }  
  
    function getDatosCategoria($ID_CATEGORIA) {
       
     $query = "select 	
		pro_categorias.ID_CATEGORIA, 
                pro_categorias.CODIGO_CATEGORIA,
                pro_categorias.DESCRIPCION_CATEGORIA
                
                from pro_categorias
      
                where pro_categorias.ID_CATEGORIA='".$ID_CATEGORIA."'";
        
         $consulta = $this->consulta($query);
        return $consulta[0];    
        
    }
    
    function insertarCategoria($CODIGO_CATEGORIA, $DESCRIPCION_CATEGORIA) {
                
         $query = "INSERT INTO pro_categorias (CODIGO_CATEGORIA, DESCRIPCION_CATEGORIA)
		VALUES('".utf8_decode(mb_strtoupper($CODIGO_CATEGORIA))."', '". utf8_decode(mb_strtoupper($DESCRIPCION_CATEGORIA))."');";
       
        return $this->crear_ultimo_id($query);       
        
    }
    
    function editarCategoria($ID_CATEGORIA, $CODIGO_CATEGORIA, $DESCRIPCION_CATEGORIA) {
        
       $query = "UPDATE pro_categorias  SET CODIGO_CATEGORIA = '".utf8_decode(mb_strtoupper($CODIGO_CATEGORIA))."', DESCRIPCION_CATEGORIA = '".utf8_decode(mb_strtoupper($DESCRIPCION_CATEGORIA))."'
           
        WHERE ID_CATEGORIA = '" . $ID_CATEGORIA . "'";
       
       return $this->modificarRegistros($query);
       
    }
    

    function eliminarCategoria($ID_CATEGORIA) {
        
        $query = "DELETE FROM pro_categorias WHERE ID_CATEGORIA = '". $ID_CATEGORIA ."'";
        
        $this->modificarRegistros($query);

    }
    
}

?>

