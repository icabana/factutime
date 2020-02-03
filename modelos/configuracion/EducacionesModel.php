<?php

class EducacionesModel extends ModelBase {

    function getTodos(){
        
        $query = "select    educaciones.id_educacion, 
                            educaciones.nombre_educacion
            	                 
                        from educaciones
                        
                        ORDER BY educaciones.nombre_educacion";

        $consulta = $this->consulta($query);
        return $consulta;
        
    }
    
    function getDatos($id_educacion){
        
        $query = "select    educaciones.id_educacion, 
                            educaciones.nombre_educacion
            	                 
                        from educaciones
                             
                        where educaciones.id_educacion = '".$id_educacion."'
                        
                        ORDER BY educaciones.nombre_educacion";
        
        $consulta = $this->consulta($query);
        
        return $consulta[0];
        
    }    
    
  
}

?>