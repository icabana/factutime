<?php

class EstadosModel extends ModelBase {

    function getTodos(){
        
        $query = "select    estados.id_estado, 
                            estados.nombre_estado
            	                 
                        from estados
                        
                        ORDER BY estados.nombre_estado";

        $consulta = $this->consulta($query);
        return $consulta;
        
    }
    
    function getDatos($id_estado){
        
        $query = "select    estados.id_estado, 
                            estados.nombre_estado
            	                 
                        from estados
                             
                        where estados.id_estado = '".$id_estado."'
                        
                        ORDER BY estados.nombre_estado";
        
        $consulta = $this->consulta($query);
        
        return $consulta[0];
        
    }    
    
  
}

?>