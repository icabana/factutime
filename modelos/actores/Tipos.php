<?php

class TiposModel extends ModelBase {

    function getTodos(){
        
        $query = "select    acto_tipo.id_tipo, 
                            acto_tipo.nombre_tipo
            	                 
                            from acto_tipo
                        
                        ORDER BY acto_tipo.nombre_tipo";

        $consulta = $this->consulta($query);
        return $consulta;
        
    }
    
    function getDatos($id_tipo){
        
        $query = "select    acto_tipo.id_tipo,  
                            acto_tipo.nombre_tipo
            	                 
                        from acto_tipo
                             
                        where acto_tipo.id_tipo = '".$id_tipo."'
                        
                        ORDER BY acto_tipo.nombre_tipo";
        
        $consulta = $this->consulta($query);
        
        return $consulta[0];
        
    }    
    
  
}

?>