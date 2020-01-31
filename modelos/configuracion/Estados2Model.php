<?php

class Estados2Model extends ModelBase {

    function getTodos(){
        
        $query = "select    estados2.id_estado, 
                            estados2.nombre_estado
            	                 
                        from estados2
                        
                        ORDER BY estados2.nombre_estado";

        $consulta = $this->consulta($query);
        return $consulta;
        
    }
    
    function getDatos($id_estado){
        
        $query = "select    estados2.id_estado, 
                            estados2.nombre_estado
            	                 
                        from estados2
                             
                        where estados2.id_estado = '".$id_estado."'
                        
                        ORDER BY estados2.nombre_estado";
        
        $consulta = $this->consulta($query);
        
        return $consulta[0];
        
    }    
    
  
}

?>