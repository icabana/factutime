<?php

class TerminosModel extends ModelBase {
  
    function getTodosTerminos() {
        
     $query = "select 	
		pro_terminos.ID_TERMINO, 
                pro_terminos.CODIGO_TERMINO,
                pro_terminos.DESCRIPCION_TERMINO
                
                from pro_terminos" ;
        
                $consulta = $this->consulta($query);
               return $consulta;       
               
    }  
  
    function getDatosTermino($ID_TERMINO) {
       
     $query = "select 	
		pro_terminos.ID_TERMINO, 
                pro_terminos.CODIGO_TERMINO,
                pro_terminos.DESCRIPCION_TERMINO
                
                from pro_terminos
      
                where pro_terminos.ID_TERMINO='".$ID_TERMINO."'";
        
         $consulta = $this->consulta($query);
        return $consulta[0];    
        
    }
    
    function insertarTermino($CODIGO_TERMINO, $DESCRIPCION_TERMINO) {
                
         $query = "INSERT INTO pro_terminos (CODIGO_TERMINO, DESCRIPCION_TERMINO)
		VALUES('".utf8_decode(mb_strtoupper($CODIGO_TERMINO))."', '". utf8_decode(mb_strtoupper($DESCRIPCION_TERMINO))."');";
       
        return $this->crear_ultimo_id($query);       
        
    }
    
    function editarTermino($ID_TERMINO, $CODIGO_TERMINO, $DESCRIPCION_TERMINO) {
        
       $query = "UPDATE pro_terminos  SET CODIGO_TERMINO = '".utf8_decode(mb_strtoupper($CODIGO_TERMINO))."', DESCRIPCION_TERMINO = '".utf8_decode(mb_strtoupper($DESCRIPCION_TERMINO))."'
           
        WHERE ID_TERMINO = '" . $ID_TERMINO . "'";
       
       return $this->modificarRegistros($query);
       
    }
    

    function eliminarTermino($ID_TERMINO) {
        
        $query = "DELETE FROM pro_terminos WHERE ID_TERMINO = '". $ID_TERMINO ."'";
        
        $this->modificarRegistros($query);

    }
    
}

?>
