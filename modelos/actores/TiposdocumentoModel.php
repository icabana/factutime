<?php

class TiposdocumentoModel extends ModelBase {

    function getTodos(){
        
        $query = "select    tiposdocumento.id_tipodocumento, 
                            tiposdocumento.codigo_tipodocumento,
                            tiposdocumento.nombre_tipodocumento
            	                 
                            from tiposdocumento
                        
                        ORDER BY tiposdocumento.nombre_tipodocumento";

        $consulta = $this->consulta($query);
        return $consulta;
        
    }
    
    function getDatos($id_tipodocumento){
        
        $query = "select    tiposdocumento.id_tipodocumento, 
                            tiposdocumento.codigo_tipodocumento,    
                            tiposdocumento.nombre_tipodocumento
            	                 
                        from tiposdocumento
                             
                        where tiposdocumento.id_tipodocumento = '".$id_tipodocumento."'
                        
                        ORDER BY tiposdocumento.nombre_tipodocumento";
        
        $consulta = $this->consulta($query);
        
        return $consulta[0];
        
    }    
    
  
}

?>